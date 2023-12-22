<?php
session_start();

require_once 'utils/dbhelper.php';
require_once 'functions.php';

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header('location: login.php');
    exit();
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $sql      = 'select * from users where username = "' . $user . '"';
    $user = executeSingleResult($sql);
    if ($user != null) {
        $ho = $user['ho'];
        $ten = $user['ten'];
        $sdt = $user['sdt'];
        $taikhoan = $user['username'];
        $email = $user['email'];
        $diachi = $user['diachi'];
    }
    $sqlOrders = 'SELECT * FROM dondathang WHERE makh = "' . $user['id'] . '"';
    $orders = executeResult($sqlOrders);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './layouts/headerpage.php'; ?>
</head>

<body>
    <?php include './layouts/menupage.php'; ?>
    <?php include './layouts/menubottompage.php'; ?>

    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản của tôi</li>
            </ul>
        </div>
    </div>

    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Chi tiết tài khoản</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Đơn hàng</a>
                        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Chi tiết tài khoản</h4>
                            <form action="update-account.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="taikhoan">Tài khoản</label>
                                        <input class="form-control" type="text" name="taikhoan" placeholder="Tài khoản" value="<?php echo $taikhoan; ?>" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="text" placeholder="Email" value="<?php echo $email; ?>" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sdt">Số điện thoại</label>
                                        <input class="form-control" type="text" placeholder="Số điện thoại" value="<?php echo $sdt; ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ten">Tên</label>
                                        <input class="form-control" type="text" name="ten" placeholder="Tên" value="<?php echo $ten; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ten">Họ</label>
                                        <input class="form-control" type="text" name="ho" placeholder="Họ" value="<?php echo $ho; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="diachi">Địa chỉ</label>
                                        <input class="form-control" type="text" name="diachi" placeholder="Địa chỉ" value="<?php echo $diachi; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Cập nhật thông tin</button>
                                        <br><br>
                                    </div>
                                </div>
                            </form>

                            <h4>Đổi mật khẩu</h4>
                            <?php
                            if (isset($_SESSION['change_password_success']) && !empty($_SESSION['change_password_success'])) {
                                echo '<div class="alert alert-success">';
                                foreach ($_SESSION['change_password_success'] as $message) {
                                    echo '<p>' . $message . '</p>';
                                }
                                echo '</div>';
                                unset($_SESSION['change_password_success']); // Clear the success messages after displaying them
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['change_password_errors']) && !empty($_SESSION['change_password_errors'])) {
                                echo '<div class="alert alert-danger">';
                                foreach ($_SESSION['change_password_errors'] as $error) {
                                    echo '<p>' . $error . '</p>';
                                }
                                echo '</div>';
                                unset($_SESSION['change_password_errors']); // Clear the errors after displaying them
                            }
                            ?>
                            <form action="change-password.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="old_password">Nhập mật khẩu cũ</label>
                                        <input class="form-control" type="password" name="old_password" placeholder="Nhập mật khẩu cũ" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="new_password">Nhập mật khẩu mới</label>
                                        <input class="form-control" type="password" name="new_password" placeholder="Nhập mật khẩu mới" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm_password">Nhập lại mật khẩu mới</label>
                                        <input class="form-control" type="password" name="confirm_password" placeholder="Nhập lại mật khẩu mới" required>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn" name="change_password">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Tổng tiền hàng</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($orders)) {
                                            foreach ($orders as $key => $order) {
                                        ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $order['maddh'] ?></td>
                                                    <td><?= vnd($order['tongtienhang']) ?><sup>đ</sup></td>
                                                    <td><?= $order['pttt'] ?></td>
                                                    <td><?= $order['ngaydh'] ?></td>
                                                    <td><?= $order['trangthai'] ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="7">Không có đơn hàng nào.</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './layouts/footerpage.php'; ?>
    <?php include './layouts/footerbottompage.php'; ?>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <?php include './layouts/scriptpage.php'; ?>
</body>

</html>