<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
$user = require_login('user'); $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    try { handle_password_change($user); set_flash('success', 'Password changed successfully.'); redirect('User_home.php'); }
    catch (RuntimeException $exception) { $error = $exception->getMessage(); }
}
render_header('Change password'); render_profile($user, 'User_home.php');
?>
<section class="panel compact-panel"><p class="eyebrow">Account security</p><h2>Change password</h2><?php if ($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?><form method="post"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><label>Current password<input type="password" name="current_password" required></label><label>New password<input type="password" name="new_password" minlength="8" required></label><label>Confirm new password<input type="password" name="confirm_password" minlength="8" required></label><button>Update password</button></form></section>
<?php render_footer(); ?>
