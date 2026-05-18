<!DOCTYPE html>
<html>
<head>
<title>Activity 1</title>
<link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>

<h2>Students Information</h2>

<?php

$students = array(

array(
   "name"=>"Leanne",
   "image"=>"images/leanne.jpg",
   "age"=>19,
   "birthday"=>"January 5, 2007",
   "contact"=>"09123456781"
),

array(
   "name"=>"Zyland",
   "image"=>"images/zyland.jpg",
   "age"=>20,
   "birthday"=>"February 10, 2006",
   "contact"=>"09123456782"
),

array(
   "name"=>"Santi",
   "image"=>"images/santi.jpg",
   "age"=>18,
   "birthday"=>"March 15, 2008",
   "contact"=>"09123456783"
),

array(
   "name"=>"JP",
   "image"=>"images/jp.jpg",
   "age"=>21,
   "birthday"=>"April 8, 2005",
   "contact"=>"09123456784"
),

array(
   "name"=>"Arby",
   "image"=>"images/arby.jpg",
   "age"=>19,
   "birthday"=>"May 21, 2007",
   "contact"=>"09123456785"
),

array(
   "name"=>"Vhea",
   "image"=>"images/vhea.jpg",
   "age"=>20,
   "birthday"=>"June 30, 2006",
   "contact"=>"09123456786"
),

array(
   "name"=>"Nadine",
   "image"=>"images/nadine.jpg",
   "age"=>18,
   "birthday"=>"July 9, 2008",
   "contact"=>"09123456787"
),

array(
   "name"=>"Faith",
   "image"=>"images/faith.jpg",
   "age"=>22,
   "birthday"=>"January 25, 2004",
   "contact"=>"09123456788"
),

array(
   "name"=>"Jeiven",
   "image"=>"images/jeiven.jpg",
   "age"=>19,
   "birthday"=>"September 17, 2007",
   "contact"=>"09123456789"
),

array(
   "name"=>"Edzel",
   "image"=>"images/edzel.jpg",
   "age"=>20,
   "birthday"=>"October 25, 2006",
   "contact"=>"09123456780"
),

array(
   "name"=>"Yana",
   "image"=>"images/yana.jpg",
   "age"=>19,
   "birthday"=>"November 12, 2007",
   "contact"=>"09123456791"
),

array(
   "name"=>"Gil",
   "image"=>"images/gil.jpg",
   "age"=>20,
   "birthday"=>"December 1, 2006",
   "contact"=>"09123456792"
)

);

usort($students, function($a, $b){
   return strcmp($a['name'], $b['name']);
});

echo "<table>";

echo "<tr>";
echo "<th>No.</th>";
echo "<th>Name</th>";
echo "<th>Image</th>";
echo "<th>Age</th>";
echo "<th>Birthday</th>";
echo "<th>Contact Number</th>";
echo "</tr>";

$no = 1;

foreach($students as $student){

   echo "<tr>";

   echo "<td>".$no."</td>";
   echo "<td>".$student['name']."</td>";
   echo "<td><img src='".$student['image']."'></td>";
   echo "<td>".$student['age']."</td>";
   echo "<td>".$student['birthday']."</td>";
   echo "<td>".$student['contact']."</td>";

   echo "</tr>";

   $no++;
}

echo "</table>";

?>

</body>
</html>