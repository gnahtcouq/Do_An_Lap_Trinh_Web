<?php
require '../utils/config.php';
require '../utils/dbhelper.php'; // Assuming this file contains database helper functions

session_start();

if (isset($_GET['masp'])) {
	$id = $_GET['masp'];
}

$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;

$con = dbConnect();

// Retrieve product information
$product = getProductById($id, $con);

$item = [
	'masp' => $product['masp'],
	'tensp' => $product['tensp'],
	'gia' => $product['gia'],
	'soluong' => $product['soluong'],
	'quantity' => $quantity
];

if ($action == 'add') {
	addToCart($item);
} elseif ($action == 'delete') {
	removeFromCart($id);
} elseif ($action == 'max') {
	increaseQuantity($id, $quantity, $product['soluong']);
} elseif ($action == 'min') {
	decreaseQuantity($id, $quantity);
}

header('location: ../cart.php');

// Functions for Database Interaction

function dbConnect() {
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if (!$con) {
		die('Connection failed: ' . mysqli_connect_error());
	}
	return $con;
}

function getProductById($id, $con) {
	$id = mysqli_real_escape_string($con, $id);
	$sql = "SELECT * FROM sanpham WHERE masp = ?";

	if ($stmt = mysqli_prepare($con, $sql)) {
		mysqli_stmt_bind_param($stmt, "s", $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($result && mysqli_num_rows($result) > 0) {
			return mysqli_fetch_assoc($result);
		}

		mysqli_stmt_close($stmt);
	}

	return null;
}

function addToCart($item) {
	if (isset($_SESSION['cart'][$item['masp']])) {
		$newQuantity = $_SESSION['cart'][$item['masp']]['quantity'] + $item['quantity'];
		$_SESSION['cart'][$item['masp']]['quantity'] = min($newQuantity, $item['soluong']);
	} else {
		$_SESSION['cart'][$item['masp']] = $item;
	}
}

function removeFromCart($id) {
	if (isset($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
	}
}

function increaseQuantity($id, $quantity, $maxStock) {
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity'] += $quantity;
		$_SESSION['cart'][$id]['quantity'] = min($_SESSION['cart'][$id]['quantity'], $maxStock);
	}
}

function decreaseQuantity($id, $quantity) {
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity'] -= $quantity;
		$_SESSION['cart'][$id]['quantity'] = max($_SESSION['cart'][$id]['quantity'], 1);
	}
}
