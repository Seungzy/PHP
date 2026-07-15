<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
$user = require_login('user');
render_header('My account'); render_profile($user);
?>
<nav class="action-bar user-actions"><a class="button" href="User_image.php">Upload image</a><a href="User_changepass.php">Reset my password</a><a class="danger-link" href="logout.php">Log out</a></nav>
<section class="welcome-panel"><p class="eyebrow">Your account</p><h2>Everything is in one place.</h2><p>Keep your profile photo current and protect your account by changing your password regularly.</p></section>
<?php render_footer(); ?>
