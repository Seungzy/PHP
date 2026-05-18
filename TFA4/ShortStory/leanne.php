<?php require('header.php'); ?>
<?php
$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_for']) && $_POST['form_for'] === 'leanne') {
    $visitor_name = htmlspecialchars(trim($_POST['visitor_name'] ?? ''));
    $visitor_message = htmlspecialchars(trim($_POST['visitor_message'] ?? ''));
    $submitted = true;
}
?>
<div class="profile-card">
    <img src="images/leanne.jpg" alt="Leanne" class="bio-img">
    <div class="profile-info">
        <h2>Leanne</h2>
        <p class="subtitle">Warm and caring friend who gets along with everyone and is a social butterfly.</p>
    </div>
</div>
<div class="story-content">
    <h3>Story</h3>
    <p>Leanne makes people feel welcome and helps the group stay connected.</p>
    <p>Her kindness and friendly nature make every gathering more fun.</p>
    </div>
<?php if ($submitted): ?>
<div class="story-form-panel">
    <p>Thank you, <?php echo $visitor_name; ?>. Your message was received:</p>
    <blockquote><?php echo nl2br($visitor_message); ?></blockquote>
</div>
<?php endif; ?>

<div class="story-form-panel">
    <h3>Leave a note for Leanne</h3>
    <form method="post" action="">
        <input type="hidden" name="form_for" value="leanne">
        <label>Your name
            <input type="text" name="visitor_name" placeholder="Your name">
        </label>
        <label>Message
            <textarea name="visitor_message" placeholder="Write a quick note"></textarea>
        </label>
        <button type="submit">Send note</button>
    </form>
</div>

<?php require('footer.php'); ?>
