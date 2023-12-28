<?php
session_start();
require_once 'utils/dbhelper.php';

if (isset($_SESSION['user']))
    $loggedInUser = $_SESSION['user'];
else
    $loggedInUser = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './layouts/headerpage.php'; ?>
</head>

<body>
    <?php require './layouts/menupage.php'; ?>
    <?php require './layouts/menubottompage.php'; ?>
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-home"></i>Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i>Sản phẩm bán chạy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-female"></i>Thời trang & Làm đẹp</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Tiện ích & Phụ kiện</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item">
                            <img src="img/slider-1.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Tiệm Nhà Túi</p>
                                <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Mua sắm
                                    ngay</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="img/slider-2.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Tiệm Nhà Túi</p>
                                <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Mua sắm
                                    ngay</a>
                            </div>
                        </div>
                        <div class="header-slider-item">
                            <img src="img/slider-3.jpg" alt="Slider Image" />
                            <div class="header-slider-caption">
                                <p>Tiệm Nhà Túi</p>
                                <a class="btn" href="product-list.php"><i class="fa fa-shopping-cart"></i>Mua sắm
                                    ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="img/category-1.jpg" />
                            <a class="img-text" href="product-list.php">
                                <p>Ăn một quả khế, trả một cục vàng</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="img/category-2.jpg" />
                            <a class="img-text" href="product-list.php">
                                <p>Mua túi nhà tui mang theo mà đựng</p>
                            </a>
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

    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>Thanh toán an toàn</h2>
                        <p>
                            Đa dạng hình thức thanh toán
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Giao hàng toàn quốc</h2>
                        <p>
                            Miễn phí vận chuyển trong bán kính 10km
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>Đổi trả dễ dàng</h2>
                        <p>
                            Trong vòng 90 ngày
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>Hỗ trợ 24/7</h2>
                        <p>
                            Đội ngũ hỗ trợ chuyên nghiệp
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/category-3.jpg" />
                        <a class="category-name" href="product-list.php">
                            <p>@TiemNhaTui</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-250">
                        <img src="img/category-4.jpg" />
                        <a class="category-name" href="product-list.php">
                            <p>@TiemNhaTui</p>
                        </a>
                    </div>
                    <div class="category-item ch-150">
                        <img src="img/category-5.jpg" />
                        <a class="category-name" href="product-list.php">
                            <p>@TiemNhaTui</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-150">
                        <img src="img/category-6.jpg" />
                        <a class="category-name" href="product-list.php">
                            <p>@TiemNhaTui</p>
                        </a>
                    </div>
                    <div class="category-item ch-250">
                        <img src="img/category-7.jpg" />
                        <a class="category-name" href="product-list.php">
                            <p>@TiemNhaTui</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/category-8.jpg" />
                        <a class="category-name" href="product-list.php">
                            <p>@TiemNhaTui</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="review">
        <div class="container-fluid">
            <div class="row align-items-center review-slider normal-slider">
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="img/review-1.jpg" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Văn Toàn</h2>
                            <h3>Co-Founder Tiệm Nhà Túi</h3>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Túi rất là đẹp nha
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="img/review-2.jpg" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Tâm Đan</h2>
                            <h3>Founder & CEO Tiệm Nhà Túi</h3>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Túi nhà tui thì tất nhiên là phải đẹp và xịn rồi
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="review-slider-item">
                        <div class="review-img">
                            <img src="img/review-3.jpg" alt="Image">
                        </div>
                        <div class="review-text">
                            <h2>Quốc Thắng</h2>
                            <h3>Nhân viên Tiệm Nhà Túi</h3>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>
                                Ăn một quả khế trả một cục vàng, mua túi nhà tui mang theo mà đựng
                            </p>
                        </div>
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