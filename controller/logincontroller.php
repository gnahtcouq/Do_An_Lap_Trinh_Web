<?php
ob_start();
session_start();
require_once('../utils/dbhelper.php');

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = 'SELECT * FROM users WHERE username = "' . $username . '"';
    $row = executeSingleResult($sql);

    if ($row != null && password_verify($password, $row['password'])) {
        // Mật khẩu đúng
        $_SESSION['user'] = $username;
        $_SESSION['pass'] = $row['password']; // Lưu mật khẩu đã hash vào session không khuyến khích
        if (isset($_SESSION['cart'])) {
            header('location:../checkout.php');
        } else {
            header('location:../index.php');
        }
    } else {
        // Login failed
        header('location:../login.php?error=1');
        exit(); // Dừng thực thi tiếp để đảm bảo chuyển hướng đúng
    }
}
