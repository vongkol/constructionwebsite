<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Building</title>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('front/css/web-fonts-with-css/css/fontawesome-all.css')}}" rel="stylesheet">
        <script type="text/javascript" src="{{asset('front/css/jq.js')}}"></script>
        <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('front/css/b.css')}}" rel="stylesheet">
        <script src="{{asset('front/css/owl.carousel.min.js')}}"></script>
        <!-- Custom styles for this template -->        
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/magnific-popup.css')}}">
        <link href="{{asset('front/css/4-col-portfolio.css')}}" rel="stylesheet">
    </head>
    <body>

    <div class="container-fluit header-contact">
     
            <div class="row"> 

                    <div id="triangle-bottomleft"></div> <div><i class="fa fa-phone"></i> +855 96 2555 209&nbsp;&nbsp; | &nbsp;&nbsp;<i class="fas fa-envelope"></i> sorvichey@gmail.com &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fas fa-map-marker"></i> 32E0, Daun Penh, Phnom Penh, Cambodia </div>

            </div>
 

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand navbar-brand-c col-md-3" href="{{url('/')}}"><img src="{{asset('front/img/logo.png')}}" width="70"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" 
                                href="#" id="navbarDropdownPortfolio" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false"
                            >
                                Service
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="portfolio-1-col.html">Server 1</a>
                                <a class="dropdown-item" href="portfolio-2-col.html">Server 2</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Resource
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="portfolio-1-col.html">Server 1</a>
                                <a class="dropdown-item" href="portfolio-2-col.html">Server 2</a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Project</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a  href="#"><img src="{{asset('front/img/en.png')}}" alt="" width="25"></a>&nbsp;   
                            <a href="#"><img src="{{asset('front/img/kh.png')}}" alt=""  width="25"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')

    <div class="container-fluit my-4">
        <img src="img/1.jpg" width="100%">
    </div>
    <div class="container">
        <div class="partner">
            <div class="col-md-12">
            <div class="row">
                <i class="fa fa-users partner-icon"></i>&nbsp;&nbsp;<h6> OUR PARTNERS</h6>
            </div></div>
            <aside class="text-partner text-gray"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</aside> 
            <div class="border-partner"><div class="in-icon"></div></div>
        </div>
        <div class="row">
        <div class="col-md-9 border-custom my-2"> 
            <div class="swiper-viewport">
                <div id="carousel0" class="swiper-container">
                    <div class="swiper-wrapper"> 
                        <div class="swiper-slide text-center"><img src="img/logo1.jpg" width="120" alt=""/></div>
                        <div class="swiper-slide text-center"><img src="img/logo2.png" alt="" width="120" /></div>
                        <div class="swiper-slide text-center"><img src="img/logo3.png" alt=""  width="120"/></div>
                        <div class="swiper-slide text-center"><img src="img/logo4.png" alt="" width="120" /></div>
                        <div class="swiper-slide text-center"><img src="img/logo5.png" alt="" width="120" /></div>
                        <div class="swiper-slide text-center"><img src="img/logo6.png" alt="" width="120" /></div>
                        <div class="swiper-slide text-center"><img src="img/logo1.jpg" alt=""  width="120"/></div>
                        <div class="swiper-slide text-center"><img src="img/logo2.png" alt="" width="120" /></div>
                        <div class="swiper-slide text-center"><img src="img/logo3.png" alt=""  width="120" /></div>
                        <div class="swiper-slide text-center"><img src="img/logo4.png" alt="" width="120"  /></div>
                        <div class="swiper-slide text-center"><img src="img/logo5.png" alt="" width="120" /></div>
                    </div>
                </div>
            </div>
            <div class="swiper-pager">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
         <div class="col-md-3">
            <div class="form-contact">
                          <form>
                        <div class="mg-5">
                            <input type="text" name="" placeholder="Full Name" class="form-control btn-flat">
                        </div>
                        <div class="mg-5">
                         <input type="email" name="" placeholder="Email" class="form-control btn-flat">
                        </div>
                        <div class="mg-5">
                          <input type="text" name="" placeholder="Subject" class="form-control btn-flat">
                        </div>
                         <div class="mg-5">
                              <textarea placeholder="Message*" class="form-control btn-flat" rows="5"></textarea>
                            </div>
                         <div class="mg-5">
                          <input type="submit" name="" class="btn btn-primary btn-primary-c btn-flat btn-block">
                      </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>
    <style type="text/css">
        .swiper-button-next, .swiper-button-prev {
          position: absolute;
          top: 60%;
          width: 40px;
          height: 26px;
          margin-top: -22px;
        }
      </style>
    <script type="text/javascript">
        $('#carousel0').swiper({
            mode: 'horizontal',
            slidesPerView: 5,
            pagination: '.carousel0',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            autoplay: 2500,
            loop: true
        });
    </script>
    <!-- /.container -->
    <div class="container-fluit company-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-white text-center">
                    <aside><b>ECC BUILDING TRUST</b></aside>
                    <aside>Your Superer Engineer Partner!</aside>
                </div>
                <div class="col-md-4 text-center">
                    <button type="button" class="btn btn-outline-primary btn-outline-primary-c"> <i class="far fa-building"></i> COMPANY PROFILE</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-5 footer ">
      <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo-footer">
                    <img src="{{asset('front/img/logo.png')}}" width="100">
                </div>
                <p></p>
                <aside class="text-gray">
                    <i class="fas fa-map-marker"></i>&nbsp; Street 32E0, Daun Penh, Phnom Penh, Cambodia 
                </aside>
                <aside class="text-gray">
                    <i class="fas fa-envelope"></i>&nbsp; sorvichey@gmail.com 
                </aside>
                <aside class="text-gray">
                    <i class="fa fa-phone"></i>&nbsp; +855 96 2555 209
                </aside>
            </div>
             <div class="col-md-2">
                <h6>Menu</h6>
                <div class="footer-page">
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">About</a>
                    </aside>
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">Resource</a>
                    </aside>
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">Service</a>
                    </aside>
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">Contact Us</a>
                    </aside>
                </div>
            </div>
             <div class="col-md-2">
                 <h6>Page</h6>
                <div class="footer-page">
                   <aside class="text-gray">
                        About
                    </aside>
                    <aside class="text-gray">
                        Service
                    </aside>
                    <aside class="text-gray">
                        Resource
                    </aside class="text-gray">
                    <aside class="text-gray">
                        Contact Us
                    </aside>
                </div>
            </div>
                <div class="col-md-4">
                    <h6>You can trust us</h6><p></p>
                    <a href=""><img src="{{asset('front/img/fb.png')}}" alt="" width="40"></a>
                    <a href=""><img src="{{asset('front/img/fb.png')}}" alt="" width="40"></a>
                    <a href=""><img src="{{asset('front/img/fb.png')}}" alt="" width="40"></a>
                    <a href=""><img src="{{asset('front/img/fb.png')}}" alt="" width="40"></a>
                </div>
            </div>
        </div>
    </footer>
        <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('front/vendor/jquery/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('front/vendor/jquery/popup-gallery.js')}}" type="text/javascript"></script>
    </body>
</html>
