<?php
session_start();

$cusername = $_POST['username']; // Assuming you're using a form with POST method
$cpassword = $_POST['password'];

if ($cusername == "henri" && $cpassword == "coding") {
    $_SESSION["admin-login"] = "true";
    header('Location: admin.php');
    exit();
} else {
    // If login is wrong, send back to login.php
    header('Location: sign_in.php');
    exit();
}
?>