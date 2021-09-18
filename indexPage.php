<?php include "includes/header.php"; ?>
<section id="hero">
        <div class="head" data-animate="rubberBand" data-duration="1.0s" data-delay="0.1s" data-iteration="3">
            <div class="heading">
                <h1>INSTAGRAM DOWNLOADER</h1>
            </div>
            <div class="sub-heading">
                <h3>Simple and easy instagram downloader.Just pasting the link below and hit to download button.</h3>
            </div>
        </div>
        <div class="body">
            <div class="body-image" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <img src="assets/images/insta.png" alt="">
            </div>
            <div class="form" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <div class="link">
                    <input type="text" name="link" id="link" placeholder = "Enter your video URL here">
                    <input type="hidden" id = "action"  name="action" value = "video">
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
<!-- <section id="hero">
        <div class="head" data-animate="rubberBand" data-duration="1.0s" data-delay="0.1s" data-iteration="3">
            <div class="heading">
                <h1>INSTA DOWNLOADER</h1>
            </div>
            <div class="sub-heading">
                <h3>Download Instagram stuff with just one click</h3>
            </div>
        </div>
        <div class="body">
            <div class="body-image" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <img src="assets/images/insta.png" alt="">
            </div>
            <div class="body-desc" data-animate="bounceIn" data-offset="50" data-duration="1.0s" data-delay="0.1s">
                <h2>HOW IT WORKS ?</h2>
                <div class="circles">
                    <div class="circle-1 circle">1</div>
                    <div class="joiner"></div>
                    <div class="circle-2 circle">2</div>
                    <div class="joiner"></div>
                    <div class="circle-3 circle">3</div>
                </div>
                <div class="steps">
                    <div class="step-1 step">
                        <h4>Step #1</h4>
                        <p>Hi , to use instagram downloader you have to just copy url of post , videos , IGTV , profile , reels etc.</p>
                    </div>
                    <div class="step-2 step">
                        <h4>Step #2</h4>
                        <p>Scroll down to feature section and select which feature you have to use and click on that feature.</p>
                    </div>
                    <div class="step-3 step">
                        <h4>Step #3</h4>
                        <p>You will redirect to that feature page where he/she has to just paste url of post and hit download button.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<?php include "includes/features.php"; ?>
<?php include "includes/team.php"; ?>
<?php include "includes/contact.php"; ?>
<?php include "includes/footer.php"; ?>