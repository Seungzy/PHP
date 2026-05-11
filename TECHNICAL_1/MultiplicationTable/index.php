<!DOCTYPE html>
<html>
<head>
    <title>Multiplication Table</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Multiplication Table</h1>

<table>
<?php
for ($row = 0; $row <= 10; $row++) {
    echo "<tr>";

    for ($col = 0; $col <= 10; $col++) {

        $value = $row * $col;

        // Alternate color
        if (($row + $col) % 2 == 0) {
            $class = "yellow";
        } else {
            $class = "red";
        }

        echo "<td class='$class'>$value</td>";
    }

    echo "</tr>";
}
?>
</table>

</body>
</html>
