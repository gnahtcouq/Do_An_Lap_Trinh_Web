<?php
session_start();

require_once 'utils/dbhelper.php';
require_once 'functions.php';

if (isset($_GET['masp'])) {
    $masp = $_GET['masp'];
    $sql = 'select * from sanpham where masp = "' . $masp . '"';
    $sanpham = executeSingleResult($sql);
    if ($sanpham != null) {
        $masp = $sanpham['masp'];
        $tensp = $sanpham['tensp'];
        $gia = $sanpham['gia'];
        $soluong = $sanpham['soluong'];
        $size = $sanpham['size'];
        $tinhtrang = $sanpham['tinhtrang'];
        $thongtin = $sanpham['thongtin'];
    }
} else {
    header('Location: index.php');
    die();
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
                <li class="breadcrumb-item"><a href="product-list.php">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>

    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <?php
                                    $spList = executeResult("SELECT hinhanh FROM hinhanhsanpham WHERE masp = '$masp'");
                                    if ($spList != null) {
                                        foreach ($spList as $item) {
                                            echo <<<HTML
                                            <img src="img/{$item['hinhanh']}" alt='Product Image'>
                                            HTML;
                                        }
                                    } ?>
                                </div>
                                <div class="product-slider-single-nav normal-slider">
                                    <?php
                                    foreach ($spList as $item) {
                                        echo <<<HTML
                                        <div class="slider-nav-img"><img src="img/{$item['hinhanh']}" alt="Product Image"></div>
                                        HTML;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title-container">
                                        <div class="title">
                                            <h2>
                                                <?php echo $tensp ?>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <h4>Giá:</h4>
                                        <p><?php echo vnd($gia); ?> <sup>đ</sup></p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Số lượng:</h4>
                                        <?php
                                        if ($soluong > 0) {
                                            echo "<p>{$soluong} sản phẩm có sẵn</p>";
                                        } else {
                                            echo "<p style='color: red;'>Hết hàng</p>";
                                        }
                                        ?>
                                    </div>
                                    <div class="p-size">
                                        <h4>Size:</h4>
                                        <p><?php echo $size ?> cm</p>
                                    </div>
                                    <div class="status">
                                        <p><?php echo $tinhtrang ?></p>
                                    </div>
                                </div>
                                <div class="action">
                                    <?php
                                    if ($soluong > 0) {
                                        echo "<a class='btn' href='controller/themhangcontroller.php?masp={$masp}&action=add'><i class='fa fa-shopping-cart'></i> Mua ngay</a>";
                                    } else {
                                        echo "<button class='btn' disabled>Hết hàng</button>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row product-detail-bottom">
                        <div class="detail-container">
                            <div class="tab-title">
                                <h4>Mô tả</h4>
                            </div>
                            <div class="description" class="container tab-content">
                                <p>
                                    <?php echo nl2br($thongtin); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

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