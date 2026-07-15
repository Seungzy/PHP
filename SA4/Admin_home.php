<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/bootstrap.php';
$user = require_login('administrator');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $targetId = (int) ($_POST['user_id'] ?? 0);
    if ($targetId === (int) $user['ID']) {
        set_flash('error', 'You cannot disable your own administrator account.');
    } else {
        $newStatus = ($_POST['status'] ?? '') === 'active' ? 'active' : 'disabled';
        $statement = db()->prepare('UPDATE users SET status = ? WHERE ID = ?');
        $statement->execute([$newStatus, $targetId]);
        set_flash('success', 'Account status updated.');
    }
    redirect('Admin_home.php');
}

$users = db()->query('SELECT * FROM users ORDER BY ID')->fetchAll();
render_header('Administrator dashboard');
render_profile($user);
?>
<nav class="action-bar">
    <a class="button" href="Admin_adduser.php">Add new user</a>
    <a href="Admin_image.php">Upload image</a>
    <a href="Admin_changepass.php">Reset my password</a>
    <a class="danger-link" href="logout.php">Log out</a>
</nav>
<section class="panel records-panel">
    <div class="section-heading"><div><p class="eyebrow">Administration</p><h2>User records</h2></div><span class="count"><?= count($users) ?> accounts</span></div>
    <div class="table-wrap"><table><thead><tr><th>ID</th><th>Name</th><th>Contact</th><th>Email</th><th>Birthday</th><th>Username</th><th>Level</th><th>Status</th></tr></thead><tbody>
    <?php foreach ($users as $record): ?>
        <tr>
            <td><?= (int) $record['ID'] ?></td>
            <td><strong><?= e($record['Firstname'] . ' ' . $record['Lastname']) ?></strong><small><?= e($record['Middlename']) ?></small></td>
            <td><?= e($record['Contactno']) ?></td><td><?= e($record['Email']) ?></td>
            <td><?= e(date('M j, Y', strtotime($record['Birthday']))) ?></td><td><?= e($record['username']) ?></td>
            <td><span class="badge role"><?= e($record['accesslevel']) ?></span></td>
            <td><form method="post" class="status-form"><input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>"><input type="hidden" name="user_id" value="<?= (int) $record['ID'] ?>"><input type="hidden" name="status" value="<?= $record['status'] === 'active' ? 'disabled' : 'active' ?>"><button class="status <?= e($record['status']) ?>" title="Click to <?= $record['status'] === 'active' ? 'disable' : 'activate' ?>" <?= (int) $record['ID'] === (int) $user['ID'] ? 'disabled' : '' ?>><?= e($record['status']) ?></button></form></td>
        </tr>
    <?php endforeach; ?>
    </tbody></table></div>
</section>
<?php render_footer(); ?>
