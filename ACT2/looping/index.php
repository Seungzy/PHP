<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Two Digit Decimal Combinations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Two Digit Decimal Combinations</h2>
    <p class="numbers">
        <?php
        for ($i = 0; $i <= 99; $i++) {
            echo sprintf("%02d", $i);
            if ($i < 99) {
                echo ", ";
            }
        }
        ?>
    </p>
</div>

</body>
</html>