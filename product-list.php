<?php
ob_start();
session_start();

require_once 'utils/dbhelper.php';
require_once 'functions.php';

// Số lượng sản phẩm trên mỗi trang
$productsPerPage = 6;

// Lấy số trang hiện tại
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Tính offset cho truy vấn SQL
$offset = ($page - 1) * $productsPerPage;

// Truy vấn SQL
$sqlBase = 'SELECT sp.*, hinh.hinhanh AS hinhanhchinh
            FROM sanpham sp
            LEFT JOIN hinhanhsanpham hinh ON sp.masp = hinh.masp';

// Check for sorting parameter
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'desc';
$sortOrder = ($sort == 'asc') ? 'ASC' : 'DESC';

// Construct the SQL query with sorting and pagination
$sqlBaseWithSorting = $sqlBase . " GROUP BY sp.masp ORDER BY MIN(sp.gia) $sortOrder";
$sql = $sqlBaseWithSorting . " LIMIT $offset, $productsPerPage";

$spList = executeResult($sql);

// Xử lý các yêu cầu tìm kiếm
if (isset($_GET['search'])) {
    $search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';  // Escape the search term to prevent SQL injection
    $sql = "SELECT sp.*, hinh.hinhanh AS hinhanhchinh
        FROM sanpham sp
        LEFT JOIN hinhanhsanpham hinh ON sp.masp = hinh.masp
        WHERE sp.tensp LIKE '%$search%' OR sp.thongtin LIKE '%$search%'
        GROUP BY sp.masp
        ORDER BY sp.masp DESC";

    // Thêm LIMIT và OFFSET để phân trang
    $sql .= " LIMIT $offset, $productsPerPage";

    $result = executeResult($sql);

    // Hiển thị kết quả tìm kiếm dưới dạng sản phẩm
    if (!empty($result)) {
        $spList = $result;
    } else {
        $spList = []; // Đặt một mảng trống nếu không tìm thấy kết quả
    }
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
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                <li class="breadcrumb-item"><a href="?sort=asc">Giá tăng dần</a></li>
                <li class="breadcrumb-item"><a href="?sort=desc">Giá giảm dần</a></li>
            </ul>
        </div>
    </div>


    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div id="productItems" class="col-md-12">
                            <div class="row">
                                <?php if (!empty($spList)) : ?>
                                    <?php foreach ($spList as $item) : ?>
                                        <div class="col-md-4">
                                            <div class="product-item">
                                                <div class="product-image">
                                                    <a href="product-detail.php?masp=<?= $item['masp'] ?>">
                                                        <img src="img/<?= $item['hinhanhchinh'] ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-price">
                                                    <h3><?= vnd($item['gia']) ?> <sup>đ</sup></h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <h5>Không tìm thấy sản phẩm.</h5>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php
                                    // Lấy tổng số sản phẩm
                                    $countSql = 'SELECT COUNT(*) AS total FROM sanpham';
                                    $totalProductsResult = executeSingleResult($countSql);

                                    // Kiểm tra xem truy vấn có thành công không và có kết quả
                                    if ($totalProductsResult && isset($totalProductsResult['total'])) {
                                        $totalProducts = $totalProductsResult['total'];
                                    } else {
                                        $totalProducts = 0; // Đặt giá trị mặc định
                                    }
                                    $totalPages = ceil($totalProducts / $productsPerPage);

                                    for ($i = 1; $i <= $totalPages; $i++) {
                                        echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">';
                                        echo '<a class="page-link" href="?page=' . $i . '&sort=' . $sort . '">' . $i . '</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
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