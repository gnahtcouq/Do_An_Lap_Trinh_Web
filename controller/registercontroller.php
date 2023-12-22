<?php
ob_start();
session_start();
require_once('../utils/dbhelper.php');

if (!empty($_POST)) {
	// Lấy dữ liệu từ người dùng
	$ho = $_POST['txt_ho'];
	$ten = $_POST['txt_ten'];
	$username = $_POST['txt_user'];
	$sdt = $_POST['txt_sdt'];
	$password = $_POST['txt_pass'];
	$repassword = $_POST['txt_repass'];
	$diachi = $_POST['txt_diachi'];

	// Kiểm tra xem có trường bắt buộc nào trống không
	if (empty($ho) || empty($ten) || empty($username) || empty($sdt) || empty($password) || empty($repassword) || empty($diachi)) {
		// Chuyển hướng đến trang đăng ký bị lỗi do thông tin không đầy đủ
		header('location:../register.php?error=4');
		exit();
	}

	// Kiểm tra xem tên người dùng đã tồn tại chưa
	$sqlCheckUsername = 'SELECT * FROM users WHERE username = "' . $username . '"';
	$result = executeSingleResult($sqlCheckUsername);

	if ($result) {
		// Tên người dùng đã tồn tại, chuyển hướng đến trang đăng ký bị lỗi
		header('location:../register.php?error=1');
		exit();
	}

	// Kiểm tra xem mật khẩu có khớp không
	if ($password !== $repassword) {
		// Mật khẩu không khớp, chuyển hướng đến trang đăng ký bị lỗi
		header('location:../register.php?error=2');
		exit();
	}

	// Kiểm tra bổ sung các ràng buộc
	if (strlen($username) < 6 || strlen($password) < 6) {
		// Tên người dùng hoặc mật khẩu quá ngắn, chuyển hướng đến trang đăng ký bị lỗi
		header('location:../register.php?error=3');
		exit();
	}

	// Kiểm tra xem số điện thoại có hợp lệ không
	// Giả sử số điện thoại hợp lệ có 10 chữ số và bắt đầu bằng số 0
	if (!preg_match('/^0\d{9}$/', $sdt)) {
		// Định dạng số điện thoại không hợp lệ, chuyển hướng đến trang đăng ký bị lỗi
		header('location:../register.php?error=5');
		exit();
	}

	// Mã hoá mật khẩu bằng Bscrypt
	$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

	// Chèn dữ liệu người dùng vào cơ sở dữ liệu
	$sqlInsertUser = 'INSERT INTO users (ho, ten, username, sdt, password, diachi) VALUES ("' . $ho . '", "' . $ten . '", "' . $username . '", "' . $sdt . '", "' . $hashedPassword . '", "' . $diachi . '")';
	execute($sqlInsertUser);

	// Chuyển hướng đến trang đăng nhập với thông báo thành công
	header('location:../login.php?success=1');
	exit();
} else {
	// Chuyển hướng đến trang đăng ký có lỗi gửi biểu mẫu trống
	header('location:../register.php?error=4');
	exit();
}
