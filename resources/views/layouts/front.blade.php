<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ECC Building Trust</title>

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
        <div class="col-md-12">
            <div class="row"> 
                <div id="triangle-bottomleft"></div> 
                <div class=" text-gray text-center rep-h-text">
                    <i class="fa fa-phone"></i> 017 996 687 / 077 456 752&nbsp;&nbsp; | &nbsp;&nbsp;<i class="fas fa-envelope"></i> info@eccbuildingtrust.com &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fas fa-map-marker"></i> #10A, St.446, Sangkat Toul Tompong I, Khan Chamkarmorn, 
                    Phnom penh, Cambodia. “Diamond home Condo I”
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand navbar-brand-c col-md-3 col-3" href="{{url('/')}}"><img src="{{asset('front/img/logo.png')}}" width="70"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav">
                        <?php 
                            $menus = DB::table('main_menus')->where('active',1)->orderBy('order_number')->get();
                        ?>
                        @foreach($menus as $m)
                        <?php $subs = DB::table('sub_menus')
                            ->where('active',1)
                            ->where('parent_id', $m->id)
                            ->orderBy('order_number')
                            ->get();
                        ?>
                        @if(count($subs)<=0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{url($m->url)}}">{{$m->name}}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown dropdown-menu-c">
                                <a class="nav-link dropdown-toggle smenu" href="#" data-toggle="dropdown">
                                    {{$m->name}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-c">
                                    @foreach($subs as $s)
                                        <a class="dropdown-item dropdown-item-c" href="{{url($s->url)}}">{{$s->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endforeach
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
    <?php $b = DB::table('background_images')->first();?>
    <div class="container-fluit my-4">
        <img src="{{asset('uploads/backgrounds/'.$b->photo)}}" width="100%">
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

        <?php         
            $partners = DB::table('partners')
                ->where('active',1)
                ->select('logo','url')
                ->orderBy('id', 'desc')
            ->get();
            ?>
        <div class="row">
        <div class="col-md-9 border-custom my-2 desktop"> 
            <div class="swiper-viewport">
                <div id="carousel0" class="swiper-container">
                    <div class="swiper-wrapper">
                    @foreach($partners as $p) 
                        <div class="swiper-slide text-center">
                            <img src="{{asset('uploads/partners/'.$p->logo)}}"   style="margin: 0 auto"   width="110" alt=""/>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="swiper-pager">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="col-md-12 border-custom my-2 mobile"> 
            <div class="swiper-viewport">
                <div id="carousel1" class="swiper-container">
                    <div class="swiper-wrapper">
                    @foreach($partners as $p) 
                        <div class="swiper-slide text-center">
                            <img src="{{asset('uploads/partners/'.$p->logo)}}"  style="margin: 0 auto"  width="110" alt=""/>
                        </div>
                        @endforeach
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
                <form action="{{url('/send-email')}}" method="POST">
                    {{csrf_field()}}
                        <div class="mg-5">
                            <input type="text" name="name" placeholder="Full Name" class="form-control btn-flat">
                        </div>
                        <div class="mg-5">
                         <input type="email" name="email" placeholder="Email*" required class="form-control btn-flat">
                        </div>
                        <div class="mg-5">
                          <input type="text" name="subject" required placeholder="Subject*" class="form-control btn-flat">
                        </div>
                         <div class="mg-5">
                              <textarea placeholder="Message*" class="form-control btn-flat" rows="5" name="message" required></textarea>
                            </div>
                         <div class="mg-5">
                          <input type="submit" name="" class="btn btn-primary btn-primary-c btn-flat btn-block">
                          <p class="text-danger text-center" style="padding-top: 5px">
                              @if(Session::has('sms'))
                                {{session('sms')}}
                              @endif
                          </p>
                      </div>
                    </form>
                </div>
            </div>
        </div>     
    </div>
    <style type="text/css">
        .swiper-button-next, .swiper-button-prev {
          position: absolute;
          top: 58%;
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
   
    <script type="text/javascript">
        $('#carousel1').swiper({
            mode: 'horizontal',
            slidesPerView: 1,
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
                    <a href="{{asset('uploads/profiles/company-profile-en.pdf')}}" class="btn btn-outline-primary btn-outline-primary-c" target="_blank"><i class="far fa-building"></i> COMPANY PROFILE</a>
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
                    @foreach($menus as $m)
                    <aside class="text-gray">
                        <a href="{{$m->url}}" class="a text-gray">{{$m->name}}</a>
                    </aside>
                    @endforeach
                </div>
            </div>
             <div class="col-md-2">
                 <h6>Pages</h6>
                <div class="footer-page">
                   <aside class="text-gray">
                        <a href="#" class="a text-gray">Support</a>
                    </aside>
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">Terms of Services</a>
                    </aside>
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">RSS Feeds</a>
                    </aside class="text-gray">
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">Partnerships</a>
                    </aside>
                    <aside class="text-gray">
                        <a href="#" class="a text-gray">Lestest News</a>
                    </aside>
                </div>
            </div>
            <?php 
                $socials = DB::table('socials')
                    ->where('active', 1)
                    ->select('icon','url')
                    ->orderBy('order_number', 'asc')
                    ->get();
            ?>
                <div class="col-md-4">
                    <h6>Follow Us On</h6>
                    <div class="footer-page">
                        @foreach($socials as $so)
                        <a href="{{$so->url}}" class="a" style="padding:2px;" target="_blank">
                            <img src="{{asset('uploads/socials/'.$so->icon)}}" width="40">
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </footer>
        <script src="{{asset('front/vendor/jquery/slide.js')}}"></script>
        <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('front/vendor/jquery/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('front/vendor/jquery/popup-gallery.js')}}" type="text/javascript"></script>
        @yield('js')
    </body>
</html>