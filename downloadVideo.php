<?php include "includes/header.php"; ?>
<section id="hero">
        <div class="head" data-animate="rubberBand" data-duration="1.0s" data-delay="0.1s" data-iteration="3">
            <div class="heading">
                <h1>DOWNLOAD VIDEOS</h1>
            </div>
            <div class="sub-heading">
                <h3>Download Instagram public videos by pasting the link of videos below and hit to download button.</h3>
            </div>
        </div>
        <div class="body">
            <div class="body-image" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <img src="assets/images/downloadVideo.png" alt="">
            </div>
            <div class="form" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <div class="link">
                    <input type="text" name="link" id="link" placeholder = "Enter your video URL here">
                    <input type="hidden" id = "action"  name="action" value = "video">
                    <input type="hidden" name="csrf_token" id = "csrf_token"  value = "<?php echo $_SESSION['csrf_token'];?>">
                </div>
                <div class="button">
                    <button id= "download-btn"><img src="assets/images/downloadBtn.svg" height = "20" width = "20" alt=""></button>
                </div>
            </div>
        </div>
</section>
<section id = "downloadable" style = "display:none">
<div class = "all_contents"></div>
</section>
<?php include "includes/features.php"; ?>
<?php include "includes/team.php"; ?>
<?php include "includes/contact.php"; ?>
<?php include "includes/footer.php"; ?>