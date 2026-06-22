<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dog Records</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
<h2>Dog Records</h2>
<?php
include("includes/db_connect.php");

$sql = "SELECT * FROM Dogs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr>
            <th>ID</th><th>Name</th><th>Breed</th><th>Age</th>
            <th>Address</th><th>Color</th><th>Height</th><th>Weight</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["d_name"]."</td>
                <td>".$row["d_breed"]."</td>
                <td>".$row["d_age"]."</td>
                <td>".$row["d_add"]."</td>
                <td>".$row["d_color"]."</td>
                <td>".$row["d_height"]."</td>
                <td>".$row["d_weight"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found</p>";
}

$conn->close();
?>
</body>
</html>
