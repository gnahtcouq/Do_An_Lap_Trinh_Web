<?php
ob_start();
session_start();
require_once('../utils/dbhelper.php');

if (!empty($_POST)) {
	// Retrieve user input
	$ho = $_POST['txt_ho'];
	$ten = $_POST['txt_ten'];
	$username = $_POST['txt_user'];
	$sdt = $_POST['txt_sdt'];
	$password = $_POST['txt_pass'];
	$repassword = $_POST['txt_repass'];
	$diachi = $_POST['txt_diachi'];

	// Check if any required field is empty
	if (empty($ho) || empty($ten) || empty($username) || empty($sdt) || empty($password) || empty($repassword) || empty($diachi)) {
		// Redirect to register page with an error for incomplete information
		header('location:../register.php?error=4');
		exit();
	}

	// Check if the username already exists
	$sqlCheckUsername = 'SELECT * FROM users WHERE username = "' . $username . '"';
	$result = executeSingleResult($sqlCheckUsername);

	if ($result) {
		// Username already exists, redirect to register page with an error
		header('location:../register.php?error=1');
		exit();
	}

	// Check if passwords match
	if ($password !== $repassword) {
		// Passwords don't match, redirect to register page with an error
		header('location:../register.php?error=2');
		exit();
	}

	// Additional checks for constraints
	if (strlen($username) < 6 || strlen($password) < 6) {
		// Username or password is too short, redirect to register page with an error
		header('location:../register.php?error=3');
		exit();
	}

	// Check if the phone number is valid
	// Assuming a valid phone number has 10 digits and starts with a 0
	if (!preg_match('/^0\d{9}$/', $sdt)) {
		// Invalid phone number format, redirect to register page with an error
		header('location:../register.php?error=5');
		exit();
	}

	// You can add more checks for other constraints such as valid email, etc.

	// Encrypt the password
	$password = md5($password . 'dbthuchanhweb');

	// Insert user data into the database
	$sqlInsertUser = 'INSERT INTO users (ho, ten, username, sdt, password) VALUES ("' . $ho . '", "' . $ten . '", "' . $username . '", "' . $sdt . '", "' . $password . '", "' . $diachi . '"))';
	execute($sqlInsertUser);

	// Redirect to a success page or login page with a success message
	header('location:../login.php?success=1');
	exit();
} else {
	// Redirect to register page with an error for empty form submission
	header('location:../register.php?error=4');
	exit();
}
