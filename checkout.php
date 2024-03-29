<?php
ob_start();
session_start();

require_once 'utils/dbhelper.php';
require_once 'functions.php';

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header('location: login.php');
    exit();
}

if (!isset($_SESSION['cart']) && !is_array($_SESSION['cart'])) {
    header('location: product-list.php');
    exit();
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $sql = 'select * from users where username = "' . $user . '"';
    $user = executeSingleResult($sql);
    if ($user != null) {
        $ho = $user['ho'];
        $ten = $user['ten'];
        $sdt = $user['sdt'];
        $diachi = $user['diachi'];
    }
}

// Kiểm tra nếu giỏ hàng tồn tại
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    // Tính tổng số sản phẩm trong giỏ hàng
    $totalProducts = count($cart);

    // Tính tổng giá tiền của giỏ hàng (không tính phí vận chuyển)
    $totalPrice = totalPrice($cart);

    // Tính phí vận chuyển
    $shippingCost = phiship($cart);
} else {
    // Giỏ hàng trống, gán giá trị mặc định
    $totalProducts = 0;
    $totalPrice = 0;
    $shippingCost = 0;
}

// Xử lý khi người dùng nhấn nút Đặt hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_DatHang'])) {
    // Thực hiện xác nhận thông tin và đặt hàng tại đây
    $isValidOrder = validateAndPlaceOrder();

    if ($isValidOrder) {
        // Nếu đặt hàng thành công, xóa giỏ hàng và chuyển hướng đến trang thông báo thành công
        unset($_SESSION['cart']);
        header('location:order-success.php');
        exit();
    } else {
        // Nếu có lỗi, có thể hiển thị thông báo hoặc thực hiện các xử lý khác
        $errorMessage = "Đã có lỗi xảy ra. Vui lòng thử lại sau.";
    }
}

// Hàm xác nhận và đặt hàng
function validateAndPlaceOrder() {
    global $con;

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $sql1 = 'SELECT * FROM users WHERE username = "' . $user . '"';
        $user = executeSingleResult($sql1);
        if ($user != null) {
            $id = $user['id'];
        }
    }

    $ngaydh = date('Y-m-d H:i:s');
    $pttt = ($_POST['payment'] == 'on') ? 'Thanh toán khi nhận hàng' : $_POST['payment'];
    $id_order = 'ddh' . time();
    $tongtien = $_POST['tongtien'];
    $trangthai = 'Chưa xử lý';

    $insertDonDatHang = 'INSERT INTO dondathang(maddh, makh, tongtienhang, pttt, ngaydh, trangthai) VALUES("' . $id_order . '","' . $id . '","' . $tongtien . '","' . $pttt . '","' . $ngaydh . '","' . $trangthai . '")';
    mysqli_set_charset($con, 'UTF8');
    $dhh = mysqli_query($con, $insertDonDatHang);

    if ($dhh) {
        unset($_SESSION['cart']);
        return true; // Trả về true nếu đặt hàng thành công
    }

    return false; // Trả về false nếu có lỗi
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './layouts/headerpage.php'; ?>
</head>

<body>
    <?php require './layouts/menupage.php'; ?>
    <?php require './layouts/menubottompage.php'; ?>

    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="cart.php">Giỏ hàng</a></li>
                <li class="breadcrumb-item active">Thanh toán</li>
            </ul>
        </div>
    </div>

    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-inner">
                        <form id="checkout-form" method="post" action="checkout.php" onsubmit="return validateForm();">
                            <div class="billing-address">
                                <h2>Địa chỉ thanh toán</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tên</label><sup style="color: red;">*</sup>
                                        <input class="form-control" type="text" name="ten" placeholder="Nhập tên của bạn" value="<?php echo isset($ten) ? $ten : ''; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Họ</label><sup style="color: red;">*</sup>
                                        <input class="form-control" type="text" name="ho" placeholder="Nhập họ của bạn" value="<?php echo isset($ho) ? $ho : ''; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Số điện thoại</label><sup style="color: red;">*</sup>
                                        <input class="form-control" type="text" name="sdt" placeholder="Nhập SDT" value="<?php echo isset($sdt) ? $sdt : ''; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Địa chỉ</label><sup style="color: red;">*</sup>
                                        <input class="form-control" type="text" name="diachi" placeholder="Địa chỉ" value="<?php echo isset($diachi) ? $diachi : ''; ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Phương thức thanh toán</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment" disabled>
                                            <label class="custom-control-label" for="payment-1">Thanh toán qua ngân
                                                hàng (Bảo trì)</label>
                                        </div>
                                    </div>

                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment" disabled>
                                            <label class="custom-control-label" for="payment-2">Thanh toán qua Momo (Bảo
                                                trì)</label>
                                        </div>
                                    </div>

                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Thanh toán khi nhận
                                                hàng</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="tongtien" value="<?php echo $totalPrice + $shippingCost ?>">

                                <div class="checkout-btn">
                                    <button type="submit" name="btn_DatHang">Đặt hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>Tổng sản phẩm</h1>
                            <p>Số sản phẩm: <span><?php echo $totalProducts; ?></span></p>
                            <p class="sub-total">Tổng phụ: <span><?php echo vnd($totalPrice); ?></span></p>
                            <p class="ship-cost">Phí vận chuyển: <span><?php echo vnd($shippingCost); ?></span></p>
                            <h2>Thành tiền: <span><?php echo vnd($totalPrice + $shippingCost); ?></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require './layouts/footerpage.php'; ?>
        <?php require './layouts/footerbottompage.php'; ?>
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <?php require './layouts/scriptpage.php'; ?>
</body>

</html>