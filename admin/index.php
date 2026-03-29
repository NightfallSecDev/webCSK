<?php
session_start();
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Crooksec Technology</title>
    <style>
        body { background: #0a0b10; color: #fff; font-family: 'Inter', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .login-box { background: rgba(255,255,255,0.02); padding: 3rem; border-radius: 1.5rem; border: 1px solid rgba(255,255,255,0.05); text-align: center; width: 100%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .login-box h2 { margin-bottom: 2rem; color: #e2e8f0; }
        input { width: 100%; padding: 1rem; margin-bottom: 1.5rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; border-radius: 0.5rem; box-sizing: border-box; outline: none; transition: border-color 0.3s;}
        input:focus { border-color: #06b6d4; }
        button { width: 100%; padding: 1rem; background: linear-gradient(135deg, #4f46e5, #06b6d4); color: white; border: none; border-radius: 0.5rem; cursor: pointer; font-weight: bold; transition: opacity 0.3s; }
        button:hover { opacity: 0.9; }
        .error { color: #ef4444; margin-bottom: 1.5rem; background: rgba(239, 68, 68, 0.1); padding: 0.5rem; border-radius: 0.5rem;}
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Portal</h2>
        <?php if($error == 1): ?><div class="error">Invalid username or password.</div><?php endif; ?>
        <form action="auth.php" method="POST">
            <input type="text" name="username" placeholder="Username " required>
            <input type="password" name="password" placeholder="Password " required>
            <button type="submit">Secure Login</button>
        </form>
    </div>
</body>
</html>
