<!DOCTYPE html>
<html>
<head>
    <title>Personal Information - GET</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Personal Information (GET)</h2>
    <form method="GET" action="">
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
    if (isset($_GET["firstname"])) {
        echo "<div class='output'>";
        echo "<p><b>First Name:</b> " . $_GET["firstname"] . "</p>";
        echo "<p><b>Middle Name:</b> " . $_GET["middlename"] . "</p>";
        echo "<p><b>Last Name:</b> " . $_GET["lastname"] . "</p>";
        echo "<p><b>Date of Birth:</b> " . $_GET["dob"] . "</p>";
        echo "<p><b>Address:</b> " . $_GET["address"] . "</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
