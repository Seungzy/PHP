<?php require('header.php'); ?>
<?php
$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_for']) && $_POST['form_for'] === 'arby') {
    $visitor_name = htmlspecialchars(trim($_POST['visitor_name'] ?? ''));
    $visitor_message = htmlspecialchars(trim($_POST['visitor_message'] ?? ''));
    $submitted = true;
}
?>
<div class="profile-card">
    <img src="images/arby.jpg" alt="Arby" class="bio-img">
    <div class="profile-info">
        <h2>Arby</h2>
        <p class="subtitle">A beautiful friend with a heart of gold and better music tastes.</p>
    </div>
</div>
<div class="story-content">
    <h3>Story</h3>
    <p>Arby shares great music and knows the right song for every mood.</p>
    <p>Their friends trust their taste and appreciate how kind and caring they are in every conversation. They also give advices and comfort to those in need like to their friends.</p>
    </div>
<?php if ($submitted): ?>
<div class="story-form-panel">
    <p>Thank you, <?php echo $visitor_name; ?>. Your message was received:</p>
    <blockquote><?php echo nl2br($visitor_message); ?></blockquote>
</div>
<?php endif; ?>

<div class="story-form-panel">
    <h3>Leave a note for Arby</h3>
    <form method="post" action="">
        <input type="hidden" name="form_for" value="arby">
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
