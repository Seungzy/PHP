<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home_b.php");
    exit();
}

require('database.php');
$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $contact_num = $_POST['contact_num'];

    if ($password !== $confirm_password) {
        $error_message = "Password and confirm password are not the same";
    } else {
        $sql = "INSERT INTO users (first_name, middle_name, last_name, username, password, birthday, email, contact_number) VALUES ('$first_name', '$middle_name', '$last_name', '$username', '$password', '$birthday', '$email', '$contact_num')";

        if (mysqli_query($conn, $sql)) {
            $success_message = "Registration successful! You can now log in.";
        } else {
            $error_message = "Database error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Activity B</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container form-container">
        <h2>My Personal Information</h2>
        <?php if (!empty($success_message)) echo "<p class='success-msg'>$success_message</p>"; ?>
        <?php if (!empty($error_message)) echo "<p class='error-msg'>$error_message</p>"; ?>

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
        <a href="login_b.php" class="register-button">Back to Login</a>
    </main>
</body>

</html>
