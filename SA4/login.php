<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';

if (!empty($_SESSION['user_id'])) {
    redirect($_SESSION['accesslevel'] === 'administrator' ? 'Admin_home.php' : 'User_home.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $statement = db()->prepare('SELECT * FROM users WHERE username = ? LIMIT 1');
    $statement->execute([trim($_POST['username'] ?? '')]);
    $user = $statement->fetch();

    if (!$user || !password_verify($_POST['password'] ?? '', $user['password'])) {
        $error = 'Invalid username or password.';
    } elseif ($user['status'] !== 'active') {
        $error = 'This account is disabled. Please contact the administrator.';
    } else {
        session_regenerate_id(true);
        $_SESSION['user_id'] = (int) $user['ID'];
        $_SESSION['accesslevel'] = $user['accesslevel'];
        redirect($user['accesslevel'] === 'administrator' ? 'Admin_home.php' : 'User_home.php');
    }
}

render_header('Log in');
?>
<section class="auth-layout">
    <div class="auth-intro">
        <p class="eyebrow">Welcome back</p>
        <h1>Manage your account with confidence.</h1>
        <p>Sign in to access your profile, update your password, and manage your image. Administrators can also manage every registered user.</p>
        <div class="demo-note"><strong>Demo password</strong><code>Password123!</code><span>Try username: admin</span></div>
    </div>
    <form class="panel login-form" method="post">
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <p class="eyebrow">Secure access</p><h2>Log in</h2>
        <?php if ($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?>
        <label>Username<input name="username" autocomplete="username" required autofocus></label>
        <label>Password<input type="password" name="password" autocomplete="current-password" required></label>
        <button type="submit">Log in</button>
    </form>
</section>
<?php render_footer(); ?>
