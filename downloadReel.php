<?php include "includes/header.php"; ?>
<section id="hero">
        <div class="head" data-animate="rubberBand" data-duration="1.0s" data-delay="0.1s" data-iteration="3">
            <div class="heading">
                <h1>DOWNLOAD REELS</h1>
            </div>
            <div class="sub-heading">
                <h3>Download Instagram public reels by pasting the link of reels below and hit to download button.</h3>
            </div>
        </div>
        <div class="body">
            <div class="body-image" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <img src="assets/images/reelDownloadHero.jpg" alt="">
            </div>
            <div class="form" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <div class="link">
                    <input type="text" name="link" id="link" placeholder = "Enter your reel URL here">
                    <input type="hidden" id = "action"  name="action" value = "reel">
                </div>
                <div class="button">
                    <button id= "download-btn"><img src="assets/images/downloadBtn.svg" height = "20" width = "20" alt=""></button>
                </div>
            </div>
        </div>
</section>
<?php include "includes/features.php"; ?>
<?php include "includes/team.php"; ?>
<?php include "includes/contact.php"; ?>
<?php include "includes/footer.php"; ?>