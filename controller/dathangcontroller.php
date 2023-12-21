<?php
ob_start();
session_start();
include '../utils/dbhelper.php';
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

if (isset($_POST['btn_Xuly'])) {
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
		$sql1 = 'select * from users where username = "' . $user . '"';
		$user = executeSingleResult($sql1);
		if ($user != null) {
			$id = $user['id'];
		}
	}

	$sql2 = 'select * from khachhang where makh = "' . $id . '"';
	$user = executeSingleResult($sql2);

	if ($user == null) {
		$makh = $id;
		$ho = mysqli_real_escape_string($con, $_POST['ho']);
		$ten = mysqli_real_escape_string($con, $_POST['ten']);
		$sdt = mysqli_real_escape_string($con, $_POST['sdt']);
		$diachi = mysqli_real_escape_string($con, $_POST['diachi']);

		$sql3 = 'insert into khachhang(makh,tenkh,diachi,sdt) values("' . $makh . '","' . $ho . ' ' . $ten . '","' . $diachi . '","' . $sdt . '")';
		execute($sql3);
	}

	$ngaydh = date('Y-m-d H:i:s');
	$pttt = $_POST['payment'];
	$id_order = ('ddh');
	$tongtien = $_POST['tongtien'];

	$sql4 = 'insert into dondathang(maddh, makh, tongtienhang, pttt, ngaydh) values("' . $id_order . '","' . $id . '","' . $tongtien . ' VND","' . $pttt . '","' . $ngaydh . '")';
	mysqli_set_charset($con, 'UTF8');
	$dhh = mysqli_query($con, $sql4);

	if (isset($dhh)) {
		$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
		foreach ($cart as $key => $value) {
			mysqli_query($con, 'insert into chitietdondathang (maddh, masp, tensp, soluong, dongia, thanhtien) values("' . $id_order . '","' . $value['masp'] . '","' . $value['tensp'] . '","' . $value['quantity'] . '","' . $value['gia'] . '","' . $value['gia'] * $value['quantity'] . '")');
		}
		unset($_SESSION['cart']);
		header('location:../userpage/order-success.php');
	}
}
