<?php
session_start();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Hardcoded for demonstration as approved
if ($username === 'admin' && $password === 'password123') {
    $_SESSION['admin_logged_in'] = true;
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: index.php?error=1");
    exit;
}
?>
