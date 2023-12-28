<?php
session_start();
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
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active">Đăng nhập</li>
            </ul>
        </div>
    </div>

    <div class="login">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="login-form">
                        <?php
                        if (isset($_GET['success']) && $_GET['success'] == 1) {
                            echo '<p style="color: green;">Đăng ký thành công! Hãy đăng nhập</p>';
                        } ?>
                        <form action="controller/logincontroller.php" method="POST">
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Đăng nhập</button>
                        </form>

                        <?php
                        // Check for error parameter in the URL
                        if (isset($_GET['error']) && $_GET['error'] == 1) {
                            echo '<p style="color: red; margin-top: 10px">Sai tên đăng nhập hoặc mật khẩu. Vui lòng thử lại!</p>';
                        }
                        ?>
                        <p style="margin-top: 30px; text-align: center">Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
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