<?php
session_start();
if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	header('location:../userpage/index.php');
} else {
	header('location:../userpage/index.php');
}
