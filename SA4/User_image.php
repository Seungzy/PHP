<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
$user = require_login('user'); $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    try { handle_image_upload((int) $user['ID']); set_flash('success', 'Profile image updated.'); redirect('User_image.php'); }
    catch (RuntimeException $exception) { $error = $exception->getMessage(); }
}
render_header('Upload profile image'); $user = require_login('user'); render_profile($user, 'User_home.php');
?>
<section class="panel compact-panel"><p class="eyebrow">Personalize</p><h2>Upload image</h2><p>Choose a JPG, PNG, GIF, or WEBP image up to 2 MB.</p><?php if ($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?><form method="post" enctype="multipart/form-data" class="upload-form"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp" required><button>Upload image</button></form></section>
<?php render_footer(); ?>
