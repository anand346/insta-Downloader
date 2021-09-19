<?php include "includes/header.php"; ?>
<section id="hero">
        <div class="head" data-animate="rubberBand" data-duration="1.0s" data-delay="0.1s" data-iteration="3">
            <div class="heading">
                <h1>EXTRACT TAGS</h1>
            </div>
            <div class="sub-heading">
                <h3>Extracts tags of any Instagram public post just by pasting the link of post below.</h3>
            </div>
        </div>
        <div class="body">
            <div class="body-image" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <img src="assets/images/extractTags.svg" alt="">
            </div>
            <div class="form" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <div class="link">
                    <input type="text" name="link" id="link" placeholder = "Enter your post URL here">
                    <input type="hidden" id = "action"  name="action" value = "tags">
                    <input type="hidden" name="csrf_token" id = "csrf_token"  value = "<?php echo $_SESSION['csrf_token'];?>">
                </div>
                <div class="button">
                    <button id= "download-btn"><img src="assets/images/downloadBtn.svg" height = "20" width = "20" alt=""></button>
                </div>
            </div>
        </div>
</section>
<span id = "loader" style = "display:none;"><img src="assets/images/loading.gif"  height = "200" alt=""></span>
<section id = "downloadable" style = "display:none;">
<div class = "all_contents">
    <textarea name="tags" id="tags" cols="30" rows="10"></textarea>
</div>
</section>
<?php include "includes/features.php"; ?>
<?php include "includes/team.php"; ?>
<?php include "includes/contact.php"; ?>
<?php include "includes/footer.php"; ?>