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

    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">Quý khách đã đặt hàng thành công!</span>
        </h2>
        <div class="row px-xl-5">
            <div class="col-lg-12 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <ul>
                        <li>Hóa đơn mua hàng đã được gửi đến email của Quý khách.</li>
                        <li>Sản phẩm của Quý khách sẽ được giao sau thời gian 2 đến 3 ngày, tính từ thời
                            điểm này</li>
                        <li>Nhân viên giao hàng sẽ liên hệ với Quý khách qua số điện thoại trước khi giao
                            hàng 24 tiếng</li>
                        <li style="list-style-type: none; font-weight: bold;">Cảm ơn Quý khách đã sử dụng sản
                            phẩm của Tiệm Nhà Túi!</li>
                    </ul>
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