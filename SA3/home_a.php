<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_a.php");
    exit();
}

$account_name = $_SESSION['username'];
$login_success = "";

if (isset($_SESSION['login_success'])) {
    $login_success = $_SESSION['login_success'];
    unset($_SESSION['login_success']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Activity A</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container dashboard-box">
        <h2>Login - Activity A</h2>
        <?php if (!empty($login_success)): ?>
            <p class="success-msg"><?php echo htmlspecialchars($login_success); ?></p>
        <?php endif; ?>
        <p class="account-label">Account Name</p>
        <p class="account-name"><?php echo htmlspecialchars($account_name); ?></p>
        <a href="logout_a.php" class="logout-button">Logout</a>
    </main>
</body>

</html>
