<?php
session_start();

// Unset all of the session variables
//$_SESSION = array();

$cardList =  $_SESSION['cart'];
session_unset();
$_SESSION['cart'] = $cardList;

// Redirect to the index page
header('location:index.php');
