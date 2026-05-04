<?php
$value = "";
$from = "";
$to = "";
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST["value"];
    $from = $_POST["from"];
    $to   = $_POST["to"];

    switch ($from) {
        case "cm": $meters = $value / 100; break;
        case "m": $meters = $value; break;
        case "km": $meters = $value * 1000; break;
        case "in": $meters = $value * 0.0254; break;
        case "ft": $meters = $value * 0.3048; break;
        case "yd": $meters = $value * 0.9144; break;
        case "mi": $meters = $value * 1609.344; break;
        default: $meters = 0;
    }

    switch ($to) {
        case "cm": $result = $meters * 100; break;
        case "m": $result = $meters; break;
        case "km": $result = $meters / 1000; break;
        case "in": $result = $meters / 0.0254; break;
        case "ft": $result = $meters / 0.3048; break;
        case "yd": $result = $meters / 0.9144; break;
        case "mi": $result = $meters / 1609.344; break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Length Conversion Chart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>MEASURE CONVERSION CHART | LENGTHS</h1>

<div class="converter">
    <form method="post">
        <input type="number" step="any" name="value" required value="<?php echo $value; ?>">

        <select name="from">
            <option value="cm">Centimeter</option>
            <option value="m">Meter</option>
            <option value="km">Kilometer</option>
            <option value="in">Inch</option>
            <option value="ft">Foot</option>
            <option value="yd">Yard</option>
            <option value="mi">Mile</option>
        </select>

        to

        <select name="to">
            <option value="cm">Centimeter</option>
            <option value="m">Meter</option>
            <option value="km">Kilometer</option>
            <option value="in">Inch</option>
            <option value="ft">Foot</option>
            <option value="yd">Yard</option>
            <option value="mi">Mile</option>
        </select>

        <button type="submit">Convert</button>
    </form>

    <?php if ($result !== ""): ?>
        <div class="result">
            Result: <strong><?php echo $result; ?></strong>
        </div>
    <?php endif; ?>
</div>

<table>
    <tr class="header"><th colspan="4">METRIC CONVERSIONS</th></tr>
    <tr><td>1 centimetre</td><td>= 10 millimetres</td><td>1 cm</td><td>= 10 mm</td></tr>
    <tr><td>1 decimetre</td><td>= 10 centimetres</td><td>1 dm</td><td>= 10 cm</td></tr>
    <tr><td>1 metre</td><td>= 100 centimetres</td><td>1 m</td><td>= 100 cm</td></tr>
    <tr><td>1 kilometre</td><td>= 1000 metres</td><td>1 km</td><td>= 1000 m</td></tr>

    <tr class="header"><th colspan="4">IMPERIAL CONVERSIONS</th></tr>
    <tr><td>1 foot</td><td>= 12 inches</td><td>1 ft</td><td>= 12 in</td></tr>
    <tr><td>1 yard</td><td>= 3 feet</td><td>1 yd</td><td>= 3 ft</td></tr>
    <tr><td>1 chain</td><td>= 22 yards</td><td>1 ch</td><td>= 22 yd</td></tr>
    <tr><td>1 furlong</td><td>= 220 yards (or 10 chains)</td><td>1 fur</td><td>= 220 yd (or 10 ch)</td></tr>
    <tr><td>1 mile</td><td>= 1760 yards (or 8 furlongs)</td><td>1 mi</td><td>= 1760 yd (or 8 fur)</td></tr>

    <tr class="header"><th colspan="4">METRIC -&gt; IMPERIAL CONVERSIONS</th></tr>
    <tr><td>1 millimetre</td><td>= 0.03937 inches</td><td>1 mm</td><td>= 0.03937 in</td></tr>
    <tr><td>1 centimetre</td><td>= 0.39370 inches</td><td>1 cm</td><td>= 0.39370 in</td></tr>
    <tr><td>1 metre</td><td>= 39.37008 inches</td><td>1 m</td><td>= 39.37008 in</td></tr>
    <tr><td>1 metre</td><td>= 3.28084 feet</td><td>1 m</td><td>= 3.28084 ft</td></tr>
    <tr><td>1 metre</td><td>= 1.09361 yards</td><td>1 m</td><td>= 1.09361 yd</td></tr>
    <tr><td>1 kilometre</td><td>= 1093.6133 yards</td><td>1 km</td><td>= 1093.6133 yd</td></tr>
    <tr><td>1 kilometre</td><td>= 0.62137 miles</td><td>1 km</td><td>= 0.62137 mi</td></tr>

    <tr class="header"><th colspan="4">IMPERIAL -&gt; METRIC CONVERSIONS</th></tr>
    <tr><td>1 inch</td><td>= 2.54 centimetres</td><td>1 in</td><td>= 2.54 cm</td></tr>
    <tr><td>1 foot</td><td>= 30.48 centimetres</td><td>1 ft</td><td>= 30.48 cm</td></tr>
    <tr><td>1 yard</td><td>= 91.44 centimetres</td><td>1 yd</td><td>= 91.44 cm</td></tr>
    <tr><td>1 yard</td><td>= 0.9144 metres</td><td>1 yd</td><td>= 0.9144 m</td></tr>
    <tr><td>1 mile</td><td>= 1609.344 metres</td><td>1 mi</td><td>= 1609.344 m</td></tr>
    <tr><td>1 mile</td><td>= 1.609344 kilometres</td><td>1 mi</td><td>= 1.609344 km</td></tr>
</table>

</body>
</html>
