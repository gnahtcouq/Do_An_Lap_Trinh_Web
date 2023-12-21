<?php
function vnd($number) {
    return number_format($number, 0, ',', '.');
}

function totalPrice($cart) {
    $totalPrice = 0;
    foreach ($cart as $key => $value) {
        $totalPrice += $value['gia'] * $value['quantity'];
    }
    return $totalPrice;
}

function phiship($cart) {
    if ($_SESSION['cart'] == null) {
        return 0;
    } else {
        return 20000;
    }
}
