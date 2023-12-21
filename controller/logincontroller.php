<?php
ob_start();
session_start();
require_once('../utils/dbhelper.php');

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password . 'dbthuchanhweb');
    $sql = 'SELECT * FROM users WHERE username = "' . $username . '" AND password = "' . $password . '"';
    $row = executeSingleResult($sql);

    if ($row != null) {
        $_SESSION['user'] = $username;
        $_SESSION['pass'] = $password;
        if (isset($_SESSION['cart'])) {
            header('location:../checkout.php');
        } else {
            header('location:../index.php');
        }
    } else {
        // Login failed
        header('location:../login.php?error=1');
        exit(); // Stop further execution to ensure the correct redirect
    }
}
