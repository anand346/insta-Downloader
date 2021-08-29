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
        var members = [
            {
                id : 1,
                name : "Anand Raj",
                profession : "Full Stack Developer",
                desc : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ea autem totam est laudantium iste nihil praesentium hic saepe repellendus, eveniet tempore quasi laborum aperiam placeat. Debitis laboriosam, sed veniam perferendis quaerat dolorem ex ducimus molestias, fuga, eaque repellat sint.",
                photo : "girl-1.jpg"
            },
            {
                id : 2,
                name : "Muskan Patel",
                profession : "Web Designer",
                desc : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ea autem totam est laudantium iste nihil praesentium hic saepe repellendus, eveniet tempore quasi laborum aperiam placeat. Debitis laboriosam, sed veniam perferendis quaerat dolorem ex ducimus molestias, fuga, eaque repellat sint.",
                photo : "girl-2.jpg"
            },
            {
                id : 3,
                name : "Faiyaz Ahmed",
                profession : "Security Analyst",
                desc : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ea autem totam est laudantium iste nihil praesentium hic saepe repellendus, eveniet tempore quasi laborum aperiam placeat. Debitis laboriosam, sed veniam perferendis quaerat dolorem ex ducimus molestias, fuga, eaque repellat sint.",
                photo : "memberThree.jpeg"
            }
        ];
        $("section#team .body .all-members .photos .single-member").on("click",function(event){
            if(event.currentTarget.classList[1] == "memberOne"){
                members.map((member) => {
                   if(member.id == 1){
                        $("section#team .body .all-members .name-and-designation h5").text(member.name);
                        $("section#team .body .all-members .name-and-designation p").text(member.profession);
                        $("section#team .body .all-members .desc p").text(member.desc);
                        $("section#team .body .single-image .image-a img").attr("src",`assets/images/${member.photo}`);
                    }
                })
            }else if(event.currentTarget.classList[1] == "memberTwo"){
                members.map((member) => {
                   if(member.id == 2){
                        $("section#team .body .all-members .name-and-designation h5").text(member.name);
                        $("section#team .body .all-members .name-and-designation p").text(member.profession);
                        $("section#team .body .all-members .desc p").text(member.desc);
                        $("section#team .body .single-image .image-a img").attr("src",`assets/images/${member.photo}`);
                    }
                })
            }else if(event.currentTarget.classList[1] == "memberThree"){
                members.map((member) => {
                   if(member.id == 3){
                        $("section#team .body .all-members .name-and-designation h5").text(member.name);
                        $("section#team .body .all-members .name-and-designation p").text(member.profession);
                        $("section#team .body .all-members .desc p").text(member.desc);
                        $("section#team .body .single-image .image-a img").attr("src",`assets/images/team/${member.photo}`);
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