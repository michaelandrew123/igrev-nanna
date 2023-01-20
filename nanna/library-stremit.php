<!doctype html>
<html lang="en-US">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Streamit</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Typography CSS -->
    <link rel="stylesheet" href="css/typography.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- swiper -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/swiper.css">
    <!-- star -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    <style>
        .img-png-to-white{
            filter: invert(100%) sepia(13%) saturate(20%) hue-rotate(130deg) brightness(90%) contrast(80%);
        }

        .footer-fixed{
            position: fixed;
            bottom: 0;
            left: 0;
        }

    </style>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>
<!-- loader END -->
<!-- Header -->
<div class="page" style="max-width: 360px;">
    <header id="main-header">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <div class="navbar-right flex-grow-1 ">


                                <div class="flex flex-row gap-2 items-center">
                                    <div class="input-group position-relative">
                                        <input type="text" class=" pl-5" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <a href="#" class="p-0 " style="position: absolute; top:50%; left:5%; transform: translate(0px, -50%)"><i class="ri-search-line "></i></a>
                                    </div>


                                    <div class="">

                                        <a href="#" class="search-toggle" data-toggle="search-toggle">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22"
                                                 class="noti-svg">
                                                <path fill="none" d="M0 0h24v24H0z" />
                                                <path
                                                        d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                            </svg>
                                            <span class="bg-danger dots"></span>
                                        </a>
                                        <div class="iq-sub-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="images/notify/thumb-1.jpg" class="img-fluid mr-3" loading="lazy"
                                                                 alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">Boot Bitty</h6>
                                                                <small class="font-size-12"> just now</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="images/notify/thumb-2.jpg" class="img-fluid mr-3" loading="lazy"
                                                                 alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">The Last Breath</h6>
                                                                <small class="font-size-12">15 minutes ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="images/notify/thumb-3.jpg" class="img-fluid mr-3" loading="lazy"
                                                                 alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">The Hero Camp</h6>
                                                                <small class="font-size-12">1 hour ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>

                                        <a href="#" class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                           data-toggle="search-toggle">
                                            <img src="images/user/user.jpg" class="img-fluid avatar-40 rounded-circle" alt="user" loading="lazy">
                                        </a>
                                        <div class="iq-sub-dropdown iq-user-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body p-0 pl-3 pr-3">
                                                    <a href="manage-profile.html" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-file-user-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Manage Profile</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="setting.html" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Settings</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="pricing-plan-1.html" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-settings-4-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Pricing Plan</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="login.html" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="ri-logout-circle-line text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Logout</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Slider End -->
    <!-- MainContent -->


    <main id="main" class="genres-main">
        <section class="iq-genres-section">
            <div class="container-fluid">
                <div class="iq-main-header d-flex align-items-center justify-content-between mt-5 mt-lg-0 ">
                    <a href="#" class="btn btn-hover   w-full " style="padding-left: 0.25rem;padding-right: 0.25rem;" >
                        <span class="genres-btn">Archived</span>
                    </a>
                    <a href="#" class="btn btn-hover w-full "  style="padding-left: 0.25rem;padding-right: 0.25rem;" >
                        <span class="genres-btn">Add Archived</span>
                    </a>
                </div>

                <div class="iq-main-header d-flex align-items-center justify-content-between">
                    <a href="#" class="btn btn-hover w-full "  style="padding-top: 0.25rem;padding-bottom: 0.25rem;padding-left: 0.25rem;padding-right: 0.25rem;"  >
                        <span class="genres-btn">Yet View</span>
                    </a>

                    <a href="#" class=" btn btn-hover w-full" style="padding-top: 0.25rem;padding-bottom: 0.25rem;padding-left: 0.25rem;padding-right: 0.25rem;">
                        <span class="genres-btn">Viewing</span>
                    </a>
                    <a href="#" class="btn btn-hover w-full "  style="padding-top: 0.25rem;padding-bottom: 0.25rem;padding-left: 0.25rem;padding-right: 0.25rem;">
                        <span class="genres-btn">Done</span>
                    </a>
                </div>



                <div class="mt-6 mb-6 flex flex-row justify-between">
                    <div class="flex flex-row items-center gap-2">

                        <a href="#" class="dropdown-toggle" id="sort-dropdown" data-bs-toggle="dropdown" aria-expanded="false" >
                            <img src="./img/filter.png" class="w-6 h-5 img-png-to-white" />

                            <ul id="sort-items" class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="sort-dropdown" >
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                                        Sort: Recent
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                                        Sort: View
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                                        Sort: Title
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#">
                                        Sort: Reply
                                    </a>
                                </li>
                            </ul>
                        </a>


                        <p class="sort-text" >Recent</p>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <a href="#" id="library-grid">
                            <img src="./img/visualization.png" class="w-6 h-5 img-png-to-white" />
                        </a>

                        <a href="#" id="library-list">
                            <img src="./img/list.png" class="w-6 h-5 img-png-to-white" />
                        </a>
                    </div>
                </div>



    <!---->
    <!--            <div>-->
    <!--                <p id="library-archived" class="flex flex-row items-center">-->
    <!--                    <button class="w-full inline-flex items-center px-2 py-2.5 text-sm font-medium text-center border border-slate-500   hover:bg-white focus:ring-4 focus:outline-none focus:ring-white dark:bg-white dark:hover:bg-white dark:focus:ring-white justify-center bg-sky-500" type="button" rel="archived" >Archived</button>-->
    <!--                    <button class="w-full inline-flex items-center px-2 py-2.5 text-sm font-medium text-center border border-slate-500 hover:bg-white focus:ring-4 focus:outline-none focus:ring-white dark:bg-white dark:hover:bg-white dark:focus:ring-white justify-center" type="button"  rel="add-archived" >Add Archived</button>-->
    <!--                </p>-->
    <!--            </div>-->
    <!---->
    <!--            -->


                <ul class="library-panel-section grid grid-rows-2 grid-flow-col gap-2 overflow-x-auto min-[639px]:overflow-x-auto  ">
                    <li>
                        <img class="w-full h-[7rem]  rounded-lg" src="https://cdn.vox-cdn.com/thumbor/HXwq0C1ADjVAGMG2XMJo5dMbEF4=/0x0:5316x3460/1200x0/filters:focal(0x0:5316x3460):no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/16234951/jw3_d42_13875_r.jpg" alt="Mountain">
                        <div class="px-0 py-2 ">
                            <div class=" mb-0">John Wick 3</div>
                            <p class="text-gray-700 text-base">
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star text-[#ffc45f]" ></span>
                            <span class="fa fa-star"></span>    Rating
                            </p>
                        </div>
                    </li>

                    <li>
                        <img class="w-full h-[7rem]  rounded-lg" src="https://cdn.vox-cdn.com/thumbor/ab7GeC585ehvC-Y4zEkqUcwOa9c=/0x0:2067x1377/1200x800/filters:focal(869x524:1199x854)/cdn.vox-cdn.com/uploads/chorus_image/image/54120135/your_name_oped.0.jpg" alt="Mountain">
                        <div class="px-0 py-2">
                            <div class=" mb-0">Your Name</div>
                            <p class="text-gray-700 text-base">
                             <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star " ></span>
                            <span class="fa fa-star"></span>
                                Rating
                            </p>
                        </div>
                    </li>

                    <li>
                        <img class="w-full h-[7rem] rounded-lg" src="https://6.vikiplatform.com/image/bf7da81a765c41fa944630749205f3ec.jpg?x=b&a=0x0" 
                        alt="Mountain">
                        <div class="px-0 py-2">
                            
                             <div class=" mb-0">Train to Busan</div>
                           <p class="text-gray-700 text-base">
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star text-[#ffc45f]" ></span>
                            <span class="fa fa-star"></span>   Rating
                            </p>
                        </div>
                    </li>

                    <li>
                        <img class="w-full h-[7rem] rounded-lg" src="https://material.asset.catchplay.com/NBC-IN-001-A1187/artworks/posters/NBC-IN-001-A1187-P1200.jpg?hash=1656562667" alt="Mountain">
                        <div class="px-0 py-2">
                            <div class="text-[14.7px] mb-0">How to train your dragon</div>
                            <p class="text-gray-700 text-base">
                               <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star checked text-[#ffc45f]"></span>
                            <span class="fa fa-star text-[#ffc45f]" ></span>
                            <span class="fa fa-star"></span> Rating
                            </p>
                        </div>
                    </li>
                </ul>



            </div>
        </section>
    </main>

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