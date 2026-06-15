<!DOCTYPE html>
<html>
<head>
    <title>Personal Information - POST</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Personal Information (POST)</h2>
    <form method="POST" action="">
        <label>First Name:</label>
        <input type="text" name="firstname"><br>

        <label>Middle Name:</label>
        <input type="text" name="middlename"><br>

        <label>Last Name:</label>
        <input type="text" name="lastname"><br>

        <label>Date of Birth:</label>
        <input type="text" name="dob"><br>

        <label>Address:</label>
        <input type="text" name="address"><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='output'>";
        echo "<p><b>First Name:</b> " . $_POST["firstname"] . "</p>";
        echo "<p><b>Middle Name:</b> " . $_POST["middlename"] . "</p>";
        echo "<p><b>Last Name:</b> " . $_POST["lastname"] . "</p>";
        echo "<p><b>Date of Birth:</b> " . $_POST["dob"] . "</p>";
        echo "<p><b>Address:</b> " . $_POST["address"] . "</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
