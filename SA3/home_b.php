<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login_b.php");
    exit();
}

require 'database.php';
$user = $_SESSION['username'];
$message = "";
$messageType = "";
$userData = null;

// thiss handles password reset
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $reenter_password = $_POST['reenter_password'];
    
    // Fetch current password from database
    $sql = "SELECT password FROM users WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);
    $userData_pw = mysqli_fetch_assoc($result);
    
    // Validate current password
    if ($userData_pw['password'] !== $current_password) {
        $message = "Current password is not the same with the old password";
        $messageType = "error";
    } 
    // Validate new passwords match
    elseif ($new_password !== $reenter_password) {
        $message = "New password and Re-Enter new password should be the same.";
        $messageType = "error";
    } 
    // update pass
    else {
        $update_sql = "UPDATE users SET password = '$new_password' WHERE username = '$user'";
        if (mysqli_query($conn, $update_sql)) {
            $message = "Password reset successfully!";
            $messageType = "success";
        } else {
            $message = "Error updating password.";
            $messageType = "error";
        }
    }
}

// Fetch user information
$sql = "SELECT first_name, middle_name, last_name, birthday, email, contact_number FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container box">
        <a href="logout_b.php" class="logout">Log-out</a>
        <h2>User Information Form</h2>

        <?php if (!empty($message)): ?>
            <p class="<?php echo ($messageType === 'error') ? 'alert' : 'success-msg'; ?>">
                <?php echo $message; ?>
            </p>
        <?php endif; ?>

        <?php if ($userData): ?>
            <p><strong>Welcome</strong> <?php echo $userData['first_name'] . ' ' . $userData['middle_name'] . ' ' . $userData['last_name']; ?></p>
            <p><strong>Birthday:</strong> <?php echo $userData['birthday']; ?></p>
            <p><strong>Contact Details</strong></p>
            <p style="margin-left: 20px;"><strong>Email:</strong> <?php echo $userData['email']; ?></p>
            <p style="margin-left: 20px;"><strong>Contact:</strong> <?php echo $userData['contact_number']; ?></p>
            
            <!-- Reset Password Section -->
            <hr style="margin: 30px 0; border: 1px solid #ccc;">
            <h3>RESET PASSWORD</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="password-reset-form">
                <div class="form-group">
                    <label>Enter Current Password:</label>
                    <input type="password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label>Enter New Password:</label>
                    <input type="password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label>Re-Enter New Password:</label>
                    <input type="password" name="reenter_password" required>
                </div>
                <button type="submit" name="reset_password" class="submit-btn">Reset Password</button>
            </form>
        <?php endif; ?>
    </main>
</body>

</html>
