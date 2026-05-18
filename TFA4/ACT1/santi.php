<?php require('header.php'); ?>
<?php
$submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form_for']) && $_POST['form_for'] === 'santi') {
    $visitor_name = htmlspecialchars(trim($_POST['visitor_name'] ?? ''));
    $visitor_message = htmlspecialchars(trim($_POST['visitor_message'] ?? ''));
    $submitted = true;
}
?>
<div class="profile-card">
    <img src="images/santi.jpg" alt="Santi" class="bio-img">
    <div class="profile-info">
        <h2>Santi</h2>
        <p class="subtitle">A man with a saint's name who excels at playing Valorant.</p>
    </div>
</div>
<div class="story-content">
    <h3>Story</h3>
    <p>Santi stays calm in Valorant matches and makes smart choices that help his team win.</p>
    <p>He enjoys competing with friends and believes practice and teamwork can turn a good game into a great one.</p>
</div>
<?php if ($submitted): ?>
<div class="story-form-panel">
    <p>Thank you, <?php echo $visitor_name; ?>. Your message was received:</p>
    <blockquote><?php echo nl2br($visitor_message); ?></blockquote>
</div>
<?php endif; ?>

<div class="story-form-panel">
    <h3>Leave a note for Santi</h3>
    <form method="post" action="">
        <input type="hidden" name="form_for" value="santi">
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
