<?php
$name = "Zyland Azriel Dacillo";
$phoneNum = "+63 1234567890";
$email = "zbdacillo@fit.edu.ph";
$location = "Quezon City, Philippines";
$skills = ["HTML", "CSS", "JavaScript", "Python", "C++", "Vue"];
$about = "Passionate web developer with experience building responsive sites.";
$education = "BS Information Technology, FEU Institute of Technology";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 20px;
}
 
.container {
    max-width: 900px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
}
 
.header {
    text-align: center;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}
 
.header h1 {
    margin: 0;
    color: #2c3e50;
}
 
.content {
    display: flex;
    margin-top: 20px;
}
 
.left, .right {
    width: 50%;
    padding: 15px;
}
 
.left {
    border-right: 1px solid #ddd;
}
 
h2 {
    color: #3498db;
}
 
ul {
    padding-left: 20px;
}
    </style>
</head>
<body>
<div class = "container">
    <div class="header">
        <h1><?= $name; ?></h1>
        <p><?= $email; ?> | <?= $phoneNum; ?> | <?= $location; ?></p>
    </div>
 
    <div class="content">
   
        <div class="left">
          <h2>About Me</h2>
          <p><?= $about; ?></p>
          <h2>Skills</h2>
         <ul>
            <?php foreach($skills as $skill): ?>
                <li><?= $skill; ?></li>
            <?php endforeach; ?>
         </ul>
    </div>
 
        <div class="right">
         <h2>Education</h2>
         <p><?= $education; ?></p>
 
         <h2>Experience</h2>
         <p><strong>Web Developer</strong></p>
         <p>Developed and maintained HTML, CSS, JS-based websites</p>
        </div>
    </div>    
</div>
 
 
   
</body>
</html>