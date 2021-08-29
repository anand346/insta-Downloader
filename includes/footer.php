<footer>
        <div class="copyright">
            <p>copyright © anand346.host20.uk 2020-2021</p>
        </div>
        <!-- <div class="upper-arrow">
            <div class="box">
                <i class="fa fa-arrow-up" ></i>
            </div>
        </div> -->
    </footer>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Scroll-triggered-Reveal-Animations-With-jQuery-Animate-css-Scrolla/dist/scrolla.jquery.min.js"></script>
<script src="https://koffiisen.github.io/Animate.js/dist/animate.min.js"></script>
<script>
    $('#hero .body .body-image').scrolla();
    $('#hero .body .form').scrolla();
    $('#hero .body .body-desc').scrolla();
    $('#features .body .left-features').scrolla();
    $('#features .body  .center-image').scrolla();
    $('#features .body  .right-features').scrolla();
    $('#team .body .single-image').scrolla();
    $('#team .body .all-members').scrolla();
    $('#getInTouch .body .form').scrolla();
    $('#getInTouch .body .image').scrolla();
    $("#hero .head").scrolla();
    $("#features .head").scrolla();
    $("#team .head").scrolla();
    $("#getInTouch .head").scrolla();

    $(document).ready(function(){
        $(".logo").bounceIn();
        $("footer .upper-arrow .box").on("click",function(){
            window.scrollTo(0, 0);
        });
    })
    var offset = 220;
    var duration = 500;
    $(document).ready(function(){
        $(".logo").bounceIn(); //bounce logo on load
        $("footer .upper-arrow .box").on("click",function(){
            window.scrollTo(0, 0); // footer arrow to scroll top of the page
        });
        $('.back-to-top').click(function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    })
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('.back-to-top').show(duration);
        } else {
            $('.back-to-top').hide(duration);
        }
    });
</script>
</body>
</html>