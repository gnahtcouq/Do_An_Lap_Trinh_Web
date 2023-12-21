<?php
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
function total_item($cart) {
    $total = 0;
    foreach ($cart as $key => $value) {
        $total += $value['quantity'];
    }
    return $total;
}
?>

<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="search">
                    <form action="product-list.php" method="GET">
                        <input type="text" name="search" placeholder="Tìm kiếm">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="user">
                    <a href="cart.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php echo total_item($cart) ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>