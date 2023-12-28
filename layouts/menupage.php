<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">

                    <?php
                    // Get current page name
                    $currentPageName = basename($_SERVER['PHP_SELF']);

                    // Check active page for Trang chủ
                    if ($currentPageName === 'index.php') {
                        $activeClass = 'active';
                    } else {
                        $activeClass = '';
                    }
                    ?>
                    <a href="index.php" class="nav-item nav-link <?php echo $activeClass; ?>">Trang chủ</a>
                    <?php if ($currentPageName === 'product-list.php') {
                        $activeClass = 'active';
                    } else {
                        $activeClass = '';
                    }
                    ?>
                    <a href="product-list.php" class="nav-item nav-link <?php echo $activeClass; ?>">Danh sách sản
                        phẩm</a>
                    <!-- <?php
                            if ($currentPageName === 'product-detail.php') {
                                $activeClass = 'active';
                            } else {
                                $activeClass = '';
                            }
                            ?>
                    <a href="product-detail.php" class="nav-item nav-link <?php echo $activeClass; ?>">Chi tiết sản
                        phẩm</a> -->
                    <!-- <?php
                            if ($currentPageName === 'cart.php') {
                                $activeClass = 'active';
                            } else {
                                $activeClass = '';
                            }
                            ?>
                    <a href="cart.php" class="nav-item nav-link <?php echo $activeClass; ?>">Giỏ hàng</a> -->

                    <!-- <?php
                            if ($currentPageName === 'checkout.php') {
                                $activeClass = 'active';
                            } else {
                                $activeClass = '';
                            }
                            ?>
                    <a href="checkout.php" class="nav-item nav-link <?php echo $activeClass; ?>">Thanh toán</a> -->

                    <!-- <?php
                            if ($currentPageName === 'my-account.php') {
                                $activeClass = 'active';
                            } else {
                                $activeClass = '';
                            }
                            ?>
                    <a href="my-account.php" class="nav-item nav-link <?php echo $activeClass; ?>">Tài khoản</a> -->
                </div>

                <div class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Xin chào,
                                <?php echo $_SESSION['user'] ?></a>
                            <div class="dropdown-menu">
                                <a href="my-account.php" class="dropdown-item">Tài khoản</a>
                                <a href="logout.php" class="dropdown-item">Đăng xuất</a>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a href="login.php" class="nav-item nav-link">Đăng nhập</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>