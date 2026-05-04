<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Ranking Program</title>
    <link rel="stylesheet" href="graderanking_styles.css">
</head>
<body>

<div class="container">

    <form method="post" class="form">
        <input type="text" name="name" placeholder="First Name MI. Lastname" required>
        <input type="number" name="grade" placeholder="Enter Grade" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $grade = $_POST["grade"];
        $rank = "";

        if ($grade >= 93 && $grade <= 100) {
            $rank = "A";
        } elseif ($grade >= 90) {
            $rank = "A-";
        } elseif ($grade >= 87) {
            $rank = "B+";
        } elseif ($grade >= 83) {
            $rank = "B";
        } elseif ($grade >= 80) {
            $rank = "B-";
        } elseif ($grade >= 77) {
            $rank = "C+";
        } elseif ($grade >= 73) {
            $rank = "C";
        } elseif ($grade >= 70) {
            $rank = "C-";
        } elseif ($grade >= 67) {
            $rank = "D+";
        } elseif ($grade >= 63) {
            $rank = "D";
        } elseif ($grade >= 60) {
            $rank = "D-";
        } else {
            $rank = "F";
        }
    ?>
    
    <div class="name-box">
        Name: <?php echo $name; ?>
    </div>

    <div class="output">
        <div class="box">
            Rank:<br>
            <strong><?php echo $rank; ?></strong>
        </div>

        <div class="box">
            Grade:<br>
            <strong><?php echo $grade; ?></strong>
        </div>

        <div class="picture">
            <img src="picture.jpg" alt="Student Picture" style="max-width: 200px; height: auto;">
        </div>
    </div>

    <?php } ?>

</div>

</body>
</html>
