<?php
declare(strict_types=1);

session_start();

const DB_HOST = '127.0.0.1';
const DB_NAME = 'sa4_user_management';
const DB_USER = 'root';
const DB_PASS = '';

function db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
    } catch (PDOException $exception) {
        http_response_code(500);
        exit('Database unavailable. Import database.sql in phpMyAdmin, then refresh this page.');
    }

    return $pdo;
}

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function redirect(string $path): never
{
    header('Location: ' . $path);
    exit;
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function flash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf(): void
{
    if (!hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        exit('Invalid request token. Please go back and try again.');
    }
}

function require_login(?string $role = null): array
{
    if (empty($_SESSION['user_id'])) {
        set_flash('error', 'Please log in to continue.');
        redirect('login.php');
    }

    $statement = db()->prepare('SELECT * FROM users WHERE ID = ? LIMIT 1');
    $statement->execute([(int) $_SESSION['user_id']]);
    $user = $statement->fetch();

    if (!$user || $user['status'] !== 'active') {
        session_unset();
        session_destroy();
        session_start();
        set_flash('error', 'This account is disabled. Please contact the administrator.');
        redirect('login.php');
    }

    if ($role !== null && $user['accesslevel'] !== $role) {
        redirect($user['accesslevel'] === 'administrator' ? 'Admin_home.php' : 'User_home.php');
    }

    return $user;
}

function profile_image(array $user): string
{
    $image = $user['image'] ?? '';
    if ($image !== '' && is_file(__DIR__ . '/../uploads/' . basename($image))) {
        return 'uploads/' . rawurlencode(basename($image));
    }
    return 'assets/avatar.svg';
}

function handle_image_upload(int $userId): void
{
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Please select an image to upload.');
    }

    if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
        throw new RuntimeException('The image must be 2 MB or smaller.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES['image']['tmp_name']);
    $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp'];
    if (!isset($allowed[$mime])) {
        throw new RuntimeException('Only JPG, PNG, GIF, and WEBP images are allowed.');
    }

    $directory = __DIR__ . '/../uploads';
    if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
        throw new RuntimeException('The upload directory could not be created.');
    }

    $filename = 'user_' . $userId . '_' . bin2hex(random_bytes(8)) . '.' . $allowed[$mime];
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $directory . '/' . $filename)) {
        throw new RuntimeException('The image could not be saved.');
    }

    $statement = db()->prepare('SELECT image FROM users WHERE ID = ?');
    $statement->execute([$userId]);
    $oldImage = $statement->fetchColumn();

    $statement = db()->prepare('UPDATE users SET image = ? WHERE ID = ?');
    $statement->execute([$filename, $userId]);

    if ($oldImage && is_file($directory . '/' . basename((string) $oldImage))) {
        unlink($directory . '/' . basename((string) $oldImage));
    }
}

function handle_password_change(array $user): void
{
    $current = $_POST['current_password'] ?? '';
    $new = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (!password_verify($current, $user['password'])) {
        throw new RuntimeException('The current password is incorrect.');
    }
    if (strlen($new) < 8) {
        throw new RuntimeException('The new password must contain at least 8 characters.');
    }
    if ($new !== $confirm) {
        throw new RuntimeException('The new passwords do not match.');
    }

    $statement = db()->prepare('UPDATE users SET password = ? WHERE ID = ?');
    $statement->execute([password_hash($new, PASSWORD_DEFAULT), $user['ID']]);
}

function render_header(string $title): void
{
    $notice = flash();
    echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">';
    echo '<title>' . e($title) . ' | SA4 UserHub</title><link rel="stylesheet" href="assets/style.css"></head><body>';
    echo '<div class="page-shell"><header class="site-header"><a class="brand" href="index.php">SA4</a></header><main>';
    if ($notice) {
        echo '<div class="alert ' . e($notice['type']) . '">' . e($notice['message']) . '</div>';
    }
}

function render_footer(): void
{
    echo '</main><footer>&copy; ' . date('Y') . ' Zy &middot; SA4 Laboratory Activity</footer></div></body></html>';
}

function render_profile(array $user, string $back = ''): void
{
    echo '<section class="profile-card"><div class="profile-copy">';
    echo '<p class="eyebrow">My information</p><h1>Welcome, ' . e($user['Firstname'] . ' ' . $user['Middlename'] . ' ' . $user['Lastname']) . '</h1>';
    echo '<div class="details"><div><span>User level</span><strong>' . e(ucfirst($user['accesslevel'])) . '</strong></div>';
    echo '<div><span>Birthday</span><strong>' . e(date('F j, Y', strtotime($user['Birthday']))) . '</strong></div>';
    echo '<div><span>Contact</span><strong>' . e($user['Contactno']) . '</strong></div>';
    echo '<div><span>Email</span><strong>' . e($user['Email']) . '</strong></div></div></div>';
    echo '<div class="profile-photo"><img src="' . e(profile_image($user)) . '" alt="Profile picture">';
    if ($back !== '') echo '<a href="' . e($back) . '">Back to home</a>';
    echo '</div></section>';
}
