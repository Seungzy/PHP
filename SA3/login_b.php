<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home_b.php");
    exit();
}

require 'database.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: home_b.php");
        exit();
    } else {
        $error = "Invalid username or password credentials.";
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container login-card">
        <h2>Log-In Form</h2>
        <?php if (!empty($error)) echo "<p class='error-msg'>$error</p>"; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <a href="register_b.php" class="register-button">Register Now</a>
    </main>
</body>

</html>
