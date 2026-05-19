<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Volume of Shapes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
function volumeCube($s) {
    return pow($s, 3);
}
function volumeRectangularPrism($l, $w, $h) {
    return $l * $w * $h;
}
function volumeCylinder($r, $h) {
    return pi() * pow($r, 2) * $h;
}
function volumeCone($r, $h) {
    return (pi() * pow($r, 2) * $h) / 3;
}
function volumeSphere($r) {
    return (4/3) * pi() * pow($r, 3);
}

$s = 5;
$l = 4; $w = 3; $h = 6;
$r_cyl = 3; $h_cyl = 7;
$r_cone = 3; $h_cone = 7;
$r_sphere = 4;
?>

<table>
    <caption>Volume of Shapes</caption>
    <tr>
        <th>Shape</th>
        <th>Formula</th>
        <th>Values</th>
        <th>Answer</th>
    </tr>
    <tr>
        <td>Cube</td>
        <td>V = s³</td>
        <td>s = <?php echo $s; ?></td>
        <td><?php echo volumeCube($s); ?></td>
    </tr>
    <tr>
        <td>Right Rectangular Prism</td>
        <td>V = l x w x h</td>
        <td>l = <?php echo $l; ?>, w = <?php echo $w; ?>, h = <?php echo $h; ?></td>
        <td><?php echo volumeRectangularPrism($l, $w, $h); ?></td>
    </tr>
    <tr>
        <td>Cylinder</td>
        <td>V = πr²h</td>
        <td>r = <?php echo $r_cyl; ?>, h = <?php echo $h_cyl; ?></td>
        <td><?php echo round(volumeCylinder($r_cyl, $h_cyl), 2); ?></td>
    </tr>
    <tr>
        <td>Cone</td>
        <td>V = (1/3)πr²h</td>
        <td>r = <?php echo $r_cone; ?>, h = <?php echo $h_cone; ?></td>
        <td><?php echo round(volumeCone($r_cone, $h_cone), 2); ?></td>
    </tr>
    <tr>
        <td>Sphere</td>
        <td>V = (4/3)πr³</td>
        <td>r = <?php echo $r_sphere; ?></td>
        <td><?php echo round(volumeSphere($r_sphere), 2); ?></td>
    </tr>
</table>

</body>
</html>
