<?php
ob_start();
session_start();
require_once('utils/dbhelper.php');
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
                <li class="breadcrumb-item active">Đăng ký</li>
            </ul>
        </div>
    </div>

    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="register-form">
                        <form action="controller/registercontroller.php" method="POST" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tên</label><sup style="color: red;">*</sup>
                                    <input class="form-control" type="text" name="txt_ten" placeholder="Nhập tên">
                                </div>
                                <div class="col-md-6">
                                    <label>Họ</label><sup style="color: red;">*</sup>
                                    <input class="form-control" type="text" name="txt_ho" placeholder="Nhập họ">
                                </div>

                                <div class="col-md-6">
                                    <label>Tên đăng nhập</label><sup style="color: red;">*</sup>
                                    <input class="form-control" type="text" name="txt_user" placeholder="Nhập tên đăng nhập">
                                </div>
                                <div class="col-md-6">
                                    <label>Số điện thoại</label><sup style="color: red;">*</sup>
                                    <input class="form-control" type="text" name="txt_sdt" placeholder="Nhập số điện thoại">
                                </div>
                                <div class="col-md-6">
                                    <label>Mật khẩu</label><sup style="color: red;">*</sup>
                                    <input class="form-control" type="password" name="txt_pass" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="col-md-6">
                                    <label>Nhập lại mật khẩu</label><sup style="color: red;">*</sup>
                                    <input class="form-control" type="password" name="txt_repass" placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="col-md-12">
                                    <label>Địa chỉ giao hàng</label><sup style="color: red;">*</sup>
                                    <input class="form-control" type="text" name="txt_diachi" placeholder="Nhập địa chỉ giao hàng">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-block btn-primary font-weight-bold" type="submit">Đăng
                                        ký</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_GET['success']) && $_GET['success'] == 1) {
                            echo '<p style="color: green;">Đăng ký thành công! Hãy <a href="login.php">đăng nhập</a>.</p>';
                        } elseif (isset($_GET['error'])) {
                            $errorMessage = '';

                            if ($_GET['error'] == 1) {
                                $errorMessage = 'Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác!';
                            } elseif ($_GET['error'] == 2) {
                                $errorMessage = 'Mật khẩu không khớp. Vui lòng nhập lại!';
                            } elseif ($_GET['error'] == 3) {
                                $errorMessage = 'Tài khoản hoặc mật khẩu phải lớn hơn 6 kí tự. Vui lòng thử lại!';
                            } elseif ($_GET['error'] == 4) {
                                $errorMessage = 'Vui lòng nhập đầy đủ thông tin!';
                            } elseif ($_GET['error'] == 5) {
                                $errorMessage = 'Số điện thoại không hợp lệ. Vui lòng thử lại!';
                            }

                            if (!empty($errorMessage)) {
                                echo '<p style="color: red; margin-top: 30px">' . $errorMessage . '</p>';
                            }
                        }
                        ?>

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