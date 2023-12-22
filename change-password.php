<?php
session_start();

require_once 'utils/dbhelper.php';
require_once 'functions.php';

$errors = array(); // To store validation errors

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $user = $_SESSION['user'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the old password
    $sql = 'SELECT password FROM users WHERE username = "' . $user . '"';
    $result = executeSingleResult($sql);

    if ($result) {
        $hashed_password = $result['password'];

        if (password_verify($old_password, $hashed_password)) {
            // Old password is correct, proceed with updating the password
            if ($new_password === $confirm_password) {
                // Hash the new password before updating it in the database
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the password in the database
                $update_sql = 'UPDATE users SET password = "' . $hashed_new_password . '" WHERE username = "' . $user . '"';
                execute($update_sql);

                $success[] = "Đổi mật khẩu thành công!";
            } else {
                $errors[] = "Mật khẩu mới không khớp!";
            }
        } else {
            $errors[] = "Mật khẩu cũ không đúng!";
        }
    }
}

// Redirect back to the change password form with errors if any
if (!empty($errors)) {
    $_SESSION['change_password_errors'] = $errors;
}

if (!empty($success)) {
    $_SESSION['change_password_success'] = $success;
}

header('location: my-account.php');
exit();
