<?php
require '../utils/config.php';

session_start();

if (isset($_GET['masp'])) {
	$id = $_GET['masp'];
}

$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
var_dump($action);
$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
$sql = 'select * from sanpham where masp="' . $id . '"';
$query = mysqli_query($con, $sql);

if ($query) {
	$product = mysqli_fetch_assoc($query);
}

$item = [
	'masp' => $product['masp'],
	'tensp' => $product['tensp'],
	'gia' => $product['gia'],
	'soluong' => $product['soluong'],
	'quantity' => $quantity
];

if ($action == 'add') {
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity'] += $quantity;
		if ($_SESSION['cart'][$id]['quantity'] > $product['soluong']) {
			$_SESSION['cart'][$id]['quantity'] = $product['soluong'];
		}
	} else {
		$_SESSION['cart'][$id] = $item;
	}
}

if ($action == 'delete') {
	unset($_SESSION['cart'][$id]);
}

if ($action == 'max') {
	$_SESSION['cart'][$id]['quantity'] += $quantity;
	if ($_SESSION['cart'][$id]['quantity'] > $product['soluong']) {
		$_SESSION['cart'][$id]['quantity'] = $product['soluong'];
	}
}

if ($action == 'min') {
	$_SESSION['cart'][$id]['quantity'] -= $quantity;
	if ($_SESSION['cart'][$id]['quantity'] < 1) {
		$_SESSION['cart'][$id]['quantity'] = 1;
	}
}

header('location: ../cart.php');
