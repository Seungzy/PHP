<?php require('header.php'); ?>
<?php
$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_for']) && $_POST['form_for'] === 'jp') {
    $visitor_name = htmlspecialchars(trim($_POST['visitor_name'] ?? ''));
    $visitor_message = htmlspecialchars(trim($_POST['visitor_message'] ?? ''));
    $submitted = true;
}
?>
<div class="profile-card">
    <img src="images/jp.jpg" alt="JP" class="bio-img">
    <div class="profile-info">
        <h2>JP</h2>
        <p class="subtitle">Athlete with energy to spare and a heart for teamwork and challenge. Does not care about failure.</p>
    </div>
</div>
<div class="story-content">
    <h3>Story</h3>
    <p>JP pushes himself in sports and sees each challenge as a chance to grow.</p>
    <p>He keeps trying even when things are hard, and his friends feel stronger with him around.</p>
    </div>
<?php if ($submitted): ?>
<div class="story-form-panel">
    <p>Thank you, <?php echo $visitor_name; ?>. Your message was received:</p>
    <blockquote><?php echo nl2br($visitor_message); ?></blockquote>
</div>
<?php endif; ?>

<div class="story-form-panel">
    <h3>Leave a note for JP</h3>
    <form method="post" action="">
        <input type="hidden" name="form_for" value="jp">
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
