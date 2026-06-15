<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Favorite Colors</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Enter Your Favorite Colors</h2>
    <form action="resultcolors.php" method="post">
        <label>Favorite Color 1:</label>
        <input type="text" name="color1"><br>

        <label>Favorite Color 2:</label>
        <input type="text" name="color2"><br>

        <label>Favorite Color 3:</label>
        <input type="text" name="color3"><br>

        <label>Favorite Color 4:</label>
        <input type="text" name="color4"><br>

        <label>Favorite Color 5:</label>
        <input type="text" name="color5"><br>

        <button type="submit">Send Colors</button>
    </form>
</div>
</body>
</html>
