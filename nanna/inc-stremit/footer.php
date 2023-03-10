
<footer id="contact" class="footer-one iq-bg-dark relative">
    <div id="footer-menu"  class="flex flex-row justify-evenly  items-center justify-center w-full footer-fixed">
        <a href="#" class="btn btn-hover   w-full py-3"  >
            <span class="genres-btn">Home</span>
        </a>
        <a href="#" class="btn btn-hover   w-full py-3" >
            <span class="genres-btn">Library</span>
        </a>
        <a href="#" class="btn btn-hover   w-full py-3 " >
            <span class="genres-btn">Comm</span>
        </a>
    </div>
</footer>

</div>
<!--<div class="rtl-box">-->
<!--    <button type="button" id="flip" class="btn btn-light rtl-btn">-->
<!--        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 20 20" fill="white">-->
<!--            <path fill-rule="evenodd"-->
<!--                  d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"-->
<!--                  clip-rule="evenodd" />-->
<!--        </svg>-->
<!--    </button>-->
<!--    <div class="rtl-panel" id="panel">-->
<!--        <ul class="modes">-->
<!--            <li class="dir-btn" data-mode="rtl" data-active="false" data-value="ltr"><a href="#">LTR</a></li>-->
<!--            <li class="dir-btn" data-mode="rtl" data-active="true" data-value="rtl"><a href="#">RTL</a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<!-- MainContent End-->
<!-- back-to-top -->
<div id="back-to-top">
    <a class="top" href="#top" id="top" style="bottom:3.875em;"> <i class="fa fa-angle-up"></i> </a>
</div>





<!-- back-to-top End -->
<!-- jQuery, Popper JS -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- owl carousel Js -->
<script src="js/owl.carousel.min.js"></script>
<!-- select2 Js -->
<script src="js/select2.min.js"></script>
<!-- Magnific Popup-->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Custom JS-->
<script src="js/custom.js"></script>
<script src="js/rtl.js"></script>
<!-- gsap JS -->
<script src="plugin/gsap/gsap.min.js"></script>
<script src="js/gsap-scripts.js"></script>
<!-- Swiper JS -->
<script src="js/swiper.min.js"></script>
<script src="js/swiper.js"></script>

<script>

    var wis = window.innerHeight;
    // var dh = $(document).height();
    var bodyH = $('body').height();

    var footerFixedH = $('#footer-menu').height(); //not used
    $( window ).scroll(function() {
        wisT = wis + window.scrollY;
        // if($('#library-main-page').height() > 0){
        //    dh = $('#library-main-page').height() + $('nav').height();
        // }
        if($('.page').height() > 0){
            dh = $('.page').height();
        }
        if (wisT < dh) {
            $('#footer-menu').addClass('footer-fixed');
        }else{
            $('#footer-menu').removeClass('footer-fixed');

        }
    });


    /* Archived Grid btn */
    $('#library-grid').on('touchstart click', function(){
        $('ul.library-panel-section').removeClass('flex flex-row flex-wrap justify-center');
        $('ul.library-panel-section').addClass('grid grid-rows-2 grid-flow-col');
    })

    /* Archived Grid List */
    $('#library-list').on('touchstart click', function(){
        $('ul.library-panel-section').removeClass('grid grid-rows-2 grid-flow-col');
        $('ul.library-panel-section').addClass('flex flex-row flex-wrap justify-center');
    })
</script>
</body>
</html>