<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
require_login('administrator');
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $fields = ['Firstname', 'Lastname', 'Middlename', 'Contactno', 'Email', 'Birthday', 'username', 'password', 'confirm_password', 'accesslevel', 'status'];
    foreach ($fields as $field) $_POST[$field] = trim($_POST[$field] ?? '');
    try {
        if ($_POST['Firstname'] === '' || $_POST['Lastname'] === '' || $_POST['Email'] === '' || $_POST['Birthday'] === '' || $_POST['username'] === '') throw new RuntimeException('Please complete all required fields.');
        if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) throw new RuntimeException('Please enter a valid email address.');
        if (strlen($_POST['password']) < 8) throw new RuntimeException('Password must contain at least 8 characters.');
        if ($_POST['password'] !== $_POST['confirm_password']) throw new RuntimeException('Passwords do not match.');
        if (!in_array($_POST['accesslevel'], ['user', 'administrator'], true)) throw new RuntimeException('Invalid access level.');
        if (!in_array($_POST['status'], ['active', 'disabled'], true)) throw new RuntimeException('Invalid account status.');

        $statement = db()->prepare('INSERT INTO users (Firstname, Lastname, Middlename, Contactno, Email, Birthday, username, password, accesslevel, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $statement->execute([$_POST['Firstname'], $_POST['Lastname'], $_POST['Middlename'], $_POST['Contactno'], $_POST['Email'], $_POST['Birthday'], $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['accesslevel'], $_POST['status']]);
        set_flash('success', 'New user added successfully.');
        redirect('Admin_home.php');
    } catch (PDOException $exception) {
        $error = $exception->getCode() === '23000' ? 'That username or email address is already registered.' : 'The user could not be saved.';
    } catch (RuntimeException $exception) {
        $error = $exception->getMessage();
    }
}

render_header('Add user');
?>
<section class="form-page panel">
    <div class="section-heading"><div><p class="eyebrow">Administrator tools</p><h1>Add user</h1><p>Create a new account and assign its permissions.</p></div><a href="Admin_home.php">Back to dashboard</a></div>
    <?php if ($error): ?><div class="alert error"><?= e($error) ?></div><?php endif; ?>
    <form method="post" class="form-grid">
        <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
        <label>First name *<input name="Firstname" value="<?= e($_POST['Firstname'] ?? '') ?>" required></label>
        <label>Middle name<input name="Middlename" value="<?= e($_POST['Middlename'] ?? '') ?>"></label>
        <label>Last name *<input name="Lastname" value="<?= e($_POST['Lastname'] ?? '') ?>" required></label>
        <label>Contact number<input name="Contactno" value="<?= e($_POST['Contactno'] ?? '') ?>"></label>
        <label>Email *<input type="email" name="Email" value="<?= e($_POST['Email'] ?? '') ?>" required></label>
        <label>Birthday *<input type="date" name="Birthday" value="<?= e($_POST['Birthday'] ?? '') ?>" required></label>
        <label>Username *<input name="username" value="<?= e($_POST['username'] ?? '') ?>" required></label>
        <label>Access level<select name="accesslevel"><option value="user">User</option><option value="administrator" <?= ($_POST['accesslevel'] ?? '') === 'administrator' ? 'selected' : '' ?>>Administrator</option></select></label>
        <label>Password *<input type="password" name="password" required minlength="8"></label>
        <label>Confirm password *<input type="password" name="confirm_password" required minlength="8"></label>
        <label>Status<select name="status"><option value="active">Active</option><option value="disabled" <?= ($_POST['status'] ?? '') === 'disabled' ? 'selected' : '' ?>>Disabled</option></select></label>
        <div class="form-submit"><button type="submit">Create account</button></div>
    </form>
</section>
<?php render_footer(); ?>
