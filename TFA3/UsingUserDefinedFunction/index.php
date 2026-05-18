<?php
function my_operations($param1, $param2, $param3) {
   $results = [];

   $results['Addition'] = $param1 + $param2 + $param3;
   $results['Subtraction'] = $param1 - $param2 - $param3;
   $results['Multiplication'] = $param1 * $param2 * $param3;
   $results['Division'] = $param1 / $param2 / $param3;

   return $results;
}

$param1 = 25;
$param2 = 13;
$param3 = 6;

$results = my_operations($param1, $param2, $param3);
?>

<!DOCTYPE html>
<html>
<head>
<title>Arithmetic Operations</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<table>
<tr>
<th colspan="2">My Parameter values: <?php echo "$param1, $param2, $param3"; ?></th>
</tr>
<?php foreach ($results as $operation => $value): ?>
<tr>
<td><?php echo $operation; ?></td>
<td><?php echo $value; ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>