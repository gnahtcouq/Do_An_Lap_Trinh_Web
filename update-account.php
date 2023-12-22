<?php
session_start();

require_once 'utils/dbhelper.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $ten = $_POST['ten'];
    $ho = $_POST['ho'];
    $diachi = $_POST['diachi'];

    // Update the user in the database
    $sql = "UPDATE users SET ten = '$ten', ho = '$ho', diachi = '$diachi' WHERE username = '" . $_SESSION['user'] . "'";
    execute($sql);

    // Redirect back to the account page after update
    header('location: my-account.php');
    exit();
} else {
    // Redirect to the login page if not a POST request
    header('location: login.php');
    exit();
}
