<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

if (!empty($_SESSION['user_id'])) {
    redirect($_SESSION['accesslevel'] === 'administrator' ? 'Admin_home.php' : 'User_home.php');
}

redirect('login.php');
