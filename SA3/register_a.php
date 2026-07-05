<?php
session_start();

$error = "";
$show_result = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // so in dis part, this is to check password and confirm password are the same before showing result
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $error = "Password and confirm password are not the same";
    } else {
        $_SESSION['activity_a_username'] = $_POST['username'];
        $_SESSION['activity_a_password'] = $_POST['password'];
        $show_result = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Activity A</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container form-container">
        <h2>My Personal Information</h2>
        <?php if (!empty($error)) echo "<p class='error-msg'>$error</p>"; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group"><label>First Name</label><input type="text" name="first_name" required></div>
            <div class="form-group"><label>Middle Name</label><input type="text" name="middle_name"></div>
            <div class="form-group"><label>Last Name</label><input type="text" name="last_name" required></div>
            <div class="form-group"><label>Username</label><input type="text" name="username" required></div>
            <div class="form-group"><label>Password</label><input type="password" name="password" required></div>
            <div class="form-group"><label>Confirm Password</label><input type="password" name="confirm_password" required></div>
            <div class="form-group"><label>Birthday</label><input type="text" name="birthday" placeholder="January 30 1993"></div>
            <div class="form-group"><label>Email</label><input type="email" name="email" required></div>
            <div class="form-group"><label>Contact Number</label><input type="text" name="contact_num" required></div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <a href="login_a.php" class="register-button">Back to Login</a>

        <?php if ($show_result): ?>
            <div class="result-box">
                <h3>Submitted Information</h3>
                <div class="result-grid">
                    <div class="result-item">
                        <span class="result-label">Full Name:</span>
                        <span class="result-value"><?php echo $_POST['first_name'] . ' ' . $_POST['middle_name'] . ' ' . $_POST['last_name']; ?></span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Username:</span>
                        <span class="result-value"><?php echo $_POST['username']; ?></span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Password:</span>
                        <span class="result-value"><?php echo $_POST['password']; ?></span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Birthday:</span>
                        <span class="result-value"><?php echo $_POST['birthday']; ?></span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Email:</span>
                        <span class="result-value"><?php echo $_POST['email']; ?></span>
                    </div>
                    <div class="result-item">
                        <span class="result-label">Contact Number</span>
                        <span class="result-value"><?php echo $_POST['contact_num']; ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>
