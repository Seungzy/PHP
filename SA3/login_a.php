<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home_a.php");
    exit();
}

$static_user = "UserA";
$static_pass = "pass123";
$error = "";
$remembered_username = "";
$remembered_password = "";
$registered_username = $_SESSION['activity_a_username'] ?? "";
$registered_password = $_SESSION['activity_a_password'] ?? "";

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $remembered_username = $_COOKIE['username'];
    $remembered_password = $_COOKIE['password'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $valid_static_login = ($username === $static_user && $password === $static_pass);
    $valid_registered_login = ($username === $registered_username && $password === $registered_password);

    if ($valid_static_login || $valid_registered_login) {
        $_SESSION['username'] = $username;
        $_SESSION['login_success'] = "You have successfully logged in.";
        
        // if remember me is checked, cookies will be set
        if (isset($_POST['remember_me'])) {
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        }
        
        header("Location: home_a.php");
        exit();
    } else {
        $error = "Invalid username or password, or enter UserA / pass123.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Activity A</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container login-box">
        <h2>Login - Activity A</h2>
        <?php if (!empty($error)): ?>
            <p class="error-msg"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($remembered_username); ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($remembered_password); ?>" required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember_me"> Remember Me
                </label>
            </div>
            <div class="inline-row">
                <button type="submit" class="btn-sub">Submit</button>
            </div>
        </form>
        <a href="register_a.php" class="register-button">Register Now</a>
    </main>
</body>

</html>
