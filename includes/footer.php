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
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $('#hero .body .body-image').scrolla();
    $('#hero .body .form').scrolla();
    $('#hero .body .body-desc').scrolla();

    //adding AOS attribute on section tags so that's why below code is commented;

    // $('#features .body .left-features').scrolla();
    // $('#features .body  .center-image').scrolla();
    // $('#features .body  .right-features').scrolla();
    // $('#team .body .single-image').scrolla();
    // $('#team .body .all-members').scrolla();
    // $('#getInTouch .body .form').scrolla();
    // $('#getInTouch .body .image').scrolla();
    // $("#hero .head").scrolla();
    // $("#features .head").scrolla();
    // $("#team .head").scrolla();
    // $("#getInTouch .head").scrolla();

    //adding AOS --start

    AOS.init({
        easing: 'ease-in-out-back',
        duration: 1000,
        once: false,
        mirror: true,
    });

    //AOS attribute set done


    //adding AOS --end


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
        var members = [
            {
                id : 1,
                name : "Anand Raj",
                profession : "Full Stack Developer",
                desc : "Full Stack Developer with 1.5+ years of hands-on experience designing, developing and implementing applications and solutions using a range of technologies and programming languages. Seeking to leverage broad development experience and hands-on technical expertise in a challenging role as a Full-stack Developer.",
                photo : "memberOne.jpeg",
                insta : "https://www.instagram.com/anand__346",
                linkedin : "https://www.linkedin.com/in/anand-raj-7ba6431a8",
                twitter : "https://twitter.com/anand__346?s=08"
            },
            {
                id : 2,
                name : "Muskan Patel",
                profession : "Web Designer",
                desc : "Highly seasoned and reliable Entry Level Web Designer with a strong work ethic and customer service and satisfaction record. Adept multitasker capable of bringing simultaneous web page creation and repair projects to completion with full accuracy and efficiency. Able to function well independently with little to no supervision or in coordination with a professional electronic media team.",
                photo : "memberTwo.jpeg",
                insta : "https://www.instagram.com/muskanpatel7747",
                linkedin : "https://www.linkedin.com/in/muskan-patel-091437210",
                twitter : "#"
            },
            {
                id : 3,
                name : "Faiyaz Ahmed",
                profession : "Security Analyst",
                desc : "Penetration tester with more than 2 years of experience in various domains such as web application security testing, penetration testing and generating reports using tools. Proficient in Linux operating system configuration utilities and programming.",
                photo : "memberThree.jpeg",
                insta : "http://www.instagram.com/faiyaz92_72",
                linkedin : "https://www.linkedin.com/in/faiyaz-ahmad-64457520b",
                twitter : "https://twitter.com/FaIyaZz007?s=08"
            }
        ];
        $("section#team .body .all-members .photos .single-member").on("click",function(event){
            if(event.currentTarget.classList[1] == "memberOne"){
                members.map((member) => {
                   if(member.id == 1){
                        $("section#team .body .all-members .name-and-designation h5").text(member.name);
                        $("section#team .body .all-members .name-and-designation p").text(member.profession);
                        $("section#team .body .all-members .desc p").text(member.desc);
                        $("section#team .body .single-image .image-a img").attr("src",`assets/images/team/${member.photo}`);
                        $("section#team .body .all-members .links .twitter a").attr("href",`${member.twitter}`);
                        $("section#team .body .all-members .links .insta a").attr("href",`${member.insta}`);
                        $("section#team .body .all-members .links .linkedin a").attr("href",`${member.linkedin}`);
                    }
                })
            }else if(event.currentTarget.classList[1] == "memberTwo"){
                members.map((member) => {
                   if(member.id == 2){
                        $("section#team .body .all-members .name-and-designation h5").text(member.name);
                        $("section#team .body .all-members .name-and-designation p").text(member.profession);
                        $("section#team .body .all-members .desc p").text(member.desc);
                        $("section#team .body .single-image .image-a img").attr("src",`assets/images/team/${member.photo}`);
                        $("section#team .body .all-members .links .twitter a").attr("href",`${member.twitter}`);
                        $("section#team .body .all-members .links .insta a").attr("href",`${member.insta}`);
                        $("section#team .body .all-members .links .linkedin a").attr("href",`${member.linkedin}`);
                    }
                })
            }else if(event.currentTarget.classList[1] == "memberThree"){
                members.map((member) => {
                   if(member.id == 3){
                        $("section#team .body .all-members .name-and-designation h5").text(member.name);
                        $("section#team .body .all-members .name-and-designation p").text(member.profession);
                        $("section#team .body .all-members .desc p").text(member.desc);
                        $("section#team .body .single-image .image-a img").attr("src",`assets/images/team/${member.photo}`);
                        $("section#team .body .all-members .links .twitter a").attr("href",`${member.twitter}`);
                        $("section#team .body .all-members .links .insta a").attr("href",`${member.insta}`);
                        $("section#team .body .all-members .links .linkedin a").attr("href",`${member.linkedin}`);
                    }
                })
            }else{
                
            }
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