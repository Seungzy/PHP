<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFA4</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="index.php">TFA4</a>
        <nav>
            <ul>
                <li><a href="santi.php" class="<?php echo $currentPage === 'santi.php' ? 'active' : ''; ?>">Santi</a></li>
                <li><a href="yana.php" class="<?php echo $currentPage === 'yana.php' ? 'active' : ''; ?>">Yana</a></li>
                <li><a href="arby.php" class="<?php echo $currentPage === 'arby.php' ? 'active' : ''; ?>">Arby</a></li>
                <li><a href="jp.php" class="<?php echo $currentPage === 'jp.php' ? 'active' : ''; ?>">JP</a></li>
                <li><a href="leanne.php" class="<?php echo $currentPage === 'leanne.php' ? 'active' : ''; ?>">Leanne</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="container">
