<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog Information</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
<h2>Dog Information</h2>
<form method="post" action="">
    <label>Name:</label><input type="text" name="d_name" required><br><br>
    <label>Breed:</label><input type="text" name="d_breed" required><br><br>
    <label>Age:</label><input type="text" name="d_age" required><br><br>
    <label>Address:</label><input type="text" name="d_add" required><br><br>
    <label>Color:</label><input type="text" name="d_color" required><br><br>
    <label>Height:</label><input type="text" name="d_height" required><br><br>
    <label>Weight:</label><input type="text" name="d_weight" required><br><br>
    <input type="submit" value="Save">
</form>

<?php
include("includes/db_connect.php");

// this is for form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['d_name'];
    $breed = $_POST['d_breed'];
    $age = $_POST['d_age'];
    $address = $_POST['d_add'];
    $color = $_POST['d_color'];
    $height = $_POST['d_height'];
    $weight = $_POST['d_weight'];

    $sql = "INSERT INTO Dogs (d_name, d_breed, d_age, d_add, d_color, d_height, d_weight)
            VALUES ('$name', '$breed', '$age', '$address', '$color', '$height', '$weight')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Dog record saved successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// to show the submitted dog info
$sql = "SELECT * FROM Dogs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1;
    while($row = $result->fetch_assoc()) {
        echo "<div class='dog-card'>
                <h3>Dog ".$counter."</h3>
                <p><strong>Name:</strong> ".$row["d_name"]."</p>
                <p><strong>Breed:</strong> ".$row["d_breed"]."</p>
                <p><strong>Age:</strong> ".$row["d_age"]."</p>
                <p><strong>Address:</strong> ".$row["d_add"]."</p>
                <p><strong>Color:</strong> ".$row["d_color"]."</p>
                <p><strong>Height:</strong> ".$row["d_height"]."</p>
                <p><strong>Weight:</strong> ".$row["d_weight"]."</p>
              </div>";
        $counter++;
    }
} else {
    echo "<p>No dog records found.</p>";
}

$conn->close();
?>
</body>
</html>
