<?php
$names = [
    "naruto uzumaki",
    "monkey d. luffy",
    "son goku",
    "levi ackerman",
    "gojo satoru",
    "tanjiro kamado",
    "killua zoldyck",
    "light yagami",
    "l lawliet",
    "eren yeager",
    "mikasa ackerman",
    "roronoa zoro",
    "sanji",
    "itachi uchiha",
    "sasuke uchiha",
    "edward elric",
    "ken kaneki",
    "anya forger",
    "ash ketchum",
    "vegeta"
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Names</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<h2>List of Names</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Number of Characters</th>
        <th>Uppercase First Character</th>
        <th>Replace Vowels with @</th>
        <th>Position of 'a'</th>
        <th>Reverse Name</th>
    </tr>

    <?php
    foreach ($names as $name) {
        $numChars = strlen($name);
        $upperFirst = ucfirst($name);
        $replaceVowels = preg_replace('/[aeiou]/i', '@', $name);
        $posA = strpos(strtolower($name), 'a');
        $posA = ($posA !== false) ? $posA + 1 : "Not found";
        $reverseName = strrev($name);

        echo "<tr>
                <td>$name</td>
                <td>$numChars</td>
                <td>$upperFirst</td>
                <td>$replaceVowels</td>
                <td>$posA</td>
                <td>$reverseName</td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
