<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["color1"] = $_POST["color1"];
    $_SESSION["color2"] = $_POST["color2"];
    $_SESSION["color3"] = $_POST["color3"];
    $_SESSION["color4"] = $_POST["color4"];
    $_SESSION["color5"] = $_POST["color5"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Favorite Colors</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>My Favorite Colors</h2>
    <div class="output">
        <p><b>Color 1:</b> <?php echo $_SESSION["color1"]; ?></p>
        <p><b>Color 2:</b> <?php echo $_SESSION["color2"]; ?></p>
        <p><b>Color 3:</b> <?php echo $_SESSION["color3"]; ?></p>
        <p><b>Color 4:</b> <?php echo $_SESSION["color4"]; ?></p>
        <p><b>Color 5:</b> <?php echo $_SESSION["color5"]; ?></p>
    </div>
</div>
</body>
</html>
