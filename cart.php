<?php
session_start();

require_once 'utils/dbhelper.php';
require_once 'functions.php';


$sql9 = 'SELECT sp.*, hinh.hinhanh AS hinhanhchinh
         FROM sanpham sp
         LEFT JOIN hinhanhsanpham hinh ON sp.masp = hinh.masp
         GROUP BY sp.masp
         ORDER BY sp.masp DESC';

$spList = executeResult($sql9);
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
                <li class="breadcrumb-item"><a href="product-list.php">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Giỏ hàng</li>
            </ul>
        </div>
    </div>

    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                    <div class="col-lg-8 ">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng cộng</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <?php
                                        $spList = executeResult($sql9);

                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            foreach ($spList as $item) {
                                                if ($value['masp'] == $item['masp']) {
                                                    $value['hinhanhchinh'] = $item['hinhanhchinh'];
                                                    break;
                                                }
                                            }
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="img">
                                                        <img src="img/<?php echo $value['hinhanhchinh'] ?>">
                                                    </div>
                                                </td>
                                                <td><?php echo $item['tensp'] ?></td>
                                                <td><?php echo vnd($value['gia']) ?><sup>đ</sup></td>
                                                <td>
                                                    <div class="qty">
                                                        <button class="btn-minus" <?php echo ($value['quantity'] <= 1) ? 'disabled' : ''; ?>>
                                                            <a href="controller/themhangcontroller.php?masp=<?php echo $value['masp'] ?>&action=min">
                                                                <i class="fa fa-minus"></i>
                                                            </a>
                                                        </button>
                                                        <input type="text" value="<?php echo $value['quantity'] ?>" readonly="readonly">
                                                        <button class="btn-plus" <?php echo ($value['quantity'] >= $item['soluong']) ? 'disabled' : ''; ?>>
                                                            <a href="controller/themhangcontroller.php?masp=<?php echo $value['masp'] ?>&action=max">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td><?php echo vnd($value['gia'] * $value['quantity']) ?><sup>đ</sup></td>
                                                <td><a href="controller/themhangcontroller.php?masp=<?php echo $value['masp'] ?>&action=delete" class="btn fa fa-trash"></a></td>
                                            </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 cart-page">
                        <div class="cart-page-inner">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>TÓM TẮT ĐƠN HÀNG</h1>
                                    <p>Tổng tiền
                                        <span>
                                            <?php echo vnd(totalPrice($_SESSION['cart'])) ?>
                                            <sup>đ</sup>
                                        </span>
                                    </p>
                                    <p>Phí vận chuyển
                                        <span>
                                            <?php echo vnd(phiship($_SESSION['cart'])) ?> <sup>đ</sup>
                                        </span>
                                    </p>
                                    <h2>Tổng cộng
                                        <span>
                                            <?php echo vnd(totalPrice($_SESSION['cart']) + phiship($_SESSION['cart'])) ?>
                                            <sup>đ</sup>
                                        </span>
                                    </h2>
                                </div>
                            </div>
                            <div class="cart-summary">
                                <a href="checkout.php">
                                    <button class="cart-btn btn btn-block btn-primary font-weight-bold my-2 py-2">Thanh
                                        toán</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-12">
                        <div class="cart-page-inner">
                            <p>Bạn chưa có sản phẩm nào trong giỏ hàng.</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
            </div>
        </div>
    </div>

    <?php require './layouts/footerpage.php'; ?>
    <?php require './layouts/footerbottompage.php'; ?>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <?php require './layouts/scriptpage.php'; ?>
</body>

</html>