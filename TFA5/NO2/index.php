<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];

    setcookie("firstname", $firstname, time() + 10);
    setcookie("middlename", $middlename, time() + 20);
    setcookie("lastname", $lastname, time() + 30);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Personal Information with Cookies</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h2>Enter Personal Information</h2>
    <form method="POST" action="">
        <label>First Name:</label>
        <input type="text" name="firstname"><br>

        <label>Middle Name:</label>
        <input type="text" name="middlename"><br>

        <label>Last Name:</label>
        <input type="text" name="lastname"><br>

        <button type="submit">Submit</button>
    </form>

    <h2>Personal Information</h2>
    <div id="cookieDisplay"></div>

    <script>
        function getCookie(name) {
            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            if (match) return match[2];
            return null;
        }

        // to display every secs
        setInterval(() => {
            let output = "";
            let firstname = getCookie("firstname");
            let middlename = getCookie("middlename");
            let lastname = getCookie("lastname");

            output += firstname ? "<p><b>First Name:</b> " + firstname + "</p>" 
                                : "<p>First Name cookie not yet available or expired.</p>";

            output += middlename ? "<p><b>Middle Name:</b> " + middlename + "</p>" 
                                 : "<p>Middle Name cookie not yet available or expired.</p>";

            output += lastname ? "<p><b>Last Name:</b> " + lastname + "</p>" 
                               : "<p>Last Name cookie not yet available or expired.</p>";

            document.getElementById("cookieDisplay").innerHTML = output;
        }, 1000);

        function getCookie(name) {
            let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            if (match) return decodeURIComponent(match[2]); 
            return null;
}

    </script>
</div>
</body>
</html>
