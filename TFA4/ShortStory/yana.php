<?php require('header.php'); ?>
<?php
$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_for']) && $_POST['form_for'] === 'yana') {
    $visitor_name = htmlspecialchars(trim($_POST['visitor_name'] ?? ''));
    $visitor_message = htmlspecialchars(trim($_POST['visitor_message'] ?? ''));
    $submitted = true;
}
?>
<div class="profile-card">
    <img src="images/yana.jpg" alt="Yana" class="bio-img">
    <div class="profile-info">
        <h2>Yana</h2>
        <p class="subtitle">Creative soul who brings color, poetry, and sometimes can be naughty.</p>
    </div>
</div>
<div class="story-content">
    <h3>Story</h3>
    <p>A soon-to-be radiant ranked girl and a top #1 Jett user in Valorant. Yana loves art and words, and she often surprises her friends with playful creativity.</p>
    <p>She adds sparkle to normal days and helps the group feel more lively and fun.</p>
    </div>
<?php if ($submitted): ?>
<div class="story-form-panel">
    <p>Thank you, <?php echo $visitor_name; ?>. Your message was received:</p>
    <blockquote><?php echo nl2br($visitor_message); ?></blockquote>
</div>
<?php endif; ?>

<div class="story-form-panel">
    <h3>Leave a note for Yana</h3>
    <form method="post" action="">
        <input type="hidden" name="form_for" value="yana">
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
