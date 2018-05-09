@extends('layouts.front')
@section('content')
    <?php 
        $slides = DB::table('slides')->where('active',1)->orderBy('order','asc')->get(); 
        $i = 1; 
        $c = 0;
    ?>
    <div class="container-fluit">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                @foreach($slides as $sl)
                    @if($c == 0)
                        <li data-target="#demo" data-slide-to="{{$c}}" class="active"></li>
                    @else 
                        <li data-target="#demo" data-slide-to="{{$c}}"></li>
                    @endif  
                    <?php $c++; ?>
                @endforeach
            </ul>
            <div class="carousel-inner">
                @foreach($slides as $slide)
                @if($i++ == 1)
                    <div class="carousel-item active">
                        <a href="{{$slide->url}}">
                            <img src="{{asset('front/slides/'.$slide->photo)}}" alt="" width="100%">
                        </a>
                    </div>
                @else
                    <div class="carousel-item">
                        <a href="{{$slide->url}}">
                            <img src="{{asset('front/slides/'.$slide->photo)}}" alt="" width="100%">
                        </a>
                    </div>
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <?php
            $a = DB::table('company_features')->where('id',1)->first();
            $b = DB::table('company_features')->where('id',2)->first();
            $c = DB::table('company_features')->where('id',3)->first();
            $d = DB::table('company_features')->where('id',4)->first();
        ?>
        <!-- Page Content -->
        <div class="container ">
            <div class="row my-5 my-5-c">
                <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                    <div class="card card-c  h-100">
                        <div class="text-center icon-home">
                            <i class="fas fa-users-cog text-warning"></i>
                        </div>
                        <div class="card-body card-body-c text-center">
                            <h6 class="card-title">
                                <span class="text-dark-gray"><b>{{$a->title}}</b></span>
                            </h6>
                            <p class="card-text text-gray">{{$a->short_description}}</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card card-c h-100">
                    <div class="text-center icon-home">
                        <i class="fas fa-trophy text-warning"></i>
                    </div>
                    <div class="card-body card-body-c text-center">
                        <h6 class="card-title">
                            <span class="text-dark-gray"><b>{{$b->title}}</b></span>
                        </h6>
                        <p class="card-text text-gray">{{$b->short_description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card card-c h-100">
                    <div class="text-center icon-home">
                        <i class="far fa-gem text-warning"></i>
                    </div>
                    <div class="card-body card-body-c text-center">
                    <h6 class="card-title">
                        <span class="text-dark-gray"><b>{{$c->title}}</b></span>
                    </h6>
                    <p class="card-text text-gray">{{$c->short_description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
                <div class="card card-c h-100">
                    <div class="text-center  icon-home">
                        <i class="fas fa-handshake text-warning"></i>
                    </div>
                    <div class="card-body card-body-c text-center">
                        <h6 class="card-title">
                            <span class="text-dark-gray"><b>{{$d->title}}</b></span>
                        </h6>
                        <p class="card-text text-gray">{{$d->short_description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $ads = DB::table('advertisements')->where('active',1)->orderBy('order','asc')->get(); 
        $j = 1;
        $a = 0;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators carousel-indicators-c">
                        @foreach($ads as $ad)
                            @if($a == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$a}}" class="active"></li>
                            @else 
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$a}}"></li>
                            @endif  
                            <?php $a++; ?>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                    @foreach($ads as $adv)
                        @if($j++ == 1)
                            <div class="carousel-item active">
                                <a href="{{$adv->url}}">
                                    <img src="{{asset('uploads/advertisements/'.$adv->photo)}}" alt="" width="100%">
                                </a>
                            </div>
                        @else
                            <div class="carousel-item">
                                <a href="{{$adv->url}}">
                                    <img src="{{asset('uploads/advertisements/'.$adv->photo)}}" alt="" width="100%">
                                </a>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="col-md-12">
            <div class="row">
               <i class="far fa-newspaper news-icon"></i></i>&nbsp;&nbsp;<h6> NEWS</h6>
            </div>
        </div>
        <aside class="text-partner text-gray"> Lorem ipsum dolor sit</aside> 
        <div class="in-icon"></div>  
    </div>
     <div class="news">
        <div class="container">
        <div class="row my-4">
           <div class="col-md-4 my-4">
                <div class="img">
                    <img src="img/n1.jpg" width="100%">
                    <div class="new-title">
                        <b>Lorem ipsum dolor sit amet, consectetur adipisicing</b>
                    </div>
               </div>
           </div>
           <div class="col-md-8 my-4">
               <div class="row">
                    <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic1.jpg" width="100%">
                        <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </div>
                    </div>
                     <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic2.jpg" width="100%">
                         <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing adipisicing 
                        </div>
                    </div>
                     <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic3.jpg" width="100%">
                         <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing adipisicing
                        </div>
                    </div>
                     <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic4.jpg" width="100%">
                         <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </div>
                    </div>
                     <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic5.jpg" width="100%">
                         <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </div>
                    </div>
                     <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic6.jpg" width="100%">
                         <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing  adipisicing adipisicing
                        </div>
                    </div>
                     <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic7.jpg" width="100%">
                         <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </div>
                    </div>
                     <div class="col-md-3 h-100 pd-5">
                        <img src="img/pic8.jpg" width="100%">
                         <div class="new-title">
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                        </div>
                    </div>
               </div></div>
            </div>
           </div>
       </div>
    </div>
    <div class="container my-4">
         <div class="col-md-12">
            <div class="row">
               <i class="fab fa-youtube news-icon" style="color:#D50000;"></i></i>&nbsp;&nbsp;<h6> VIDEOS</h6>
            </div>
        </div>
        <aside class="text-partner text-gray"> Lorem ipsum dolor sit</aside> 
        <div class="in-icon"></div>  
    </div>
     <div class="news">
        <div class="container">
        <div class="row my-4">
           <div class="col-md-7 my-4">
                <div class="img">
                    <iframe width="100%" height="415" src="https://www.youtube.com/embed/0BXGh0EYJtE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
               </div>
           </div>
           <div class="col-md-5 my-4">
               <div class="row">
                    <div class="col-md-12 h-100">
                        <div class="row">
                            <div class="col-md-5 pd-5">
                               <iframe width="100%" height="100" src="https://www.youtube.com/embed/U7UKNoufSbk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-7 pd-5">
                                <b>Lorem ipsum dolor sit amet, consectetur adipisicing</b>
                            </div>
                            <div class="col-md-5 pd-5">
                               <iframe width="100%" height="100" src="https://www.youtube.com/embed/IsaCk4SARPk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-7">
                                <b>Lorem ipsum dolor sit amet, consectetur adipisicing</b>
                            </div>
                            <div class="col-md-5 pd-5">
                               <iframe width="100%" height="100" src="https://www.youtube.com/embed/baimGHLHq5E" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-7 pd-5">
                                 <b>Lorem ipsum dolor sit amet, consectetur adipisicing</b>
                            </div>
                            <div class="col-md-5 pd-5">
                               <iframe width="100%" height="100" src="https://www.youtube.com/embed/mhd-wDhZNzE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-7 pd-5">
                                <b>Lorem ipsum dolor sit amet, consectetur adipisicing</b>
                            </div>
                        </div>
                    </div>
                    
               </div></div>
            </div>
           </div>
       </div>
    </div>
    <div class="container-fluit our-service">
        <div class="row">
            <div class="col-md-12 text-center text-gray">
                <div class="container">
                    <div> <i class="fas fa-cog text-warning" style="font-size: 50px;"></i></a></div>
                    <h5 class="text-dark-gray"> OUR SERVICES</h5>
                    <aside class="text-os">HELLO WORK FOR YOU</aside>
                    <p></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio-section -->
    <div class="space-medium">
        <div class="container-fluit portfolio">
             <div class="container">
              <ul class="nav justify-content-center" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Construction</a>
                  </li>
                     <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Project</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"></div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                </div>
              </div>
             </div>
             <div class="col-md-12">
            <div class="row">
                <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6  pd-0">
                    <div class="gallery-img"><a href="img/pic1.jpg" class="image-link" title="Image 1"><img src="img/pic1.jpg"  width="100%" alt=""></a>
                    </div>
                </div>
                <!-- portfolio-block -->
                <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6  pd-0">
                    <div class="gallery-img"><a href="img/pic2.jpg" class="image-link" title="Image 2"><img src="img/pic2.jpg" width="100%" alt=""></a>
                    </div>
                </div>
                <!-- portfolio-block -->
                <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6 pd-0">
                    <div class="gallery-img"><a href="img/pic6.jpg" class="image-link" title="Image 3"><img src="img/pic6.jpg"  width="100%" alt="" class="img-responsive">
                    </div>
                </div>
                <!-- portfolio-block -->
                 <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6  pd-0">
                    <div class="gallery-img"><a href="img/pic5.jpg" class="image-link" title="Image 4"><img src="img/pic5.jpg"  width="100%" alt=""></a>
                    </div>
                </div>
                <!-- portfolio-block -->
                 <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6 pd-0">
                    <div class="gallery-img"><a href="img/pic4.jpg" class="image-link" title="Image 5"><img src="img/pic4.jpg"  width="100%" alt=""></a>
                    </div>
                </div>
                <!-- portfolio-block -->
                <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6 pd-0">
                    <div class="gallery-img"><a href="img/pic1.jpg" class="image-link" title="Image 6"><img src="img/pic1.jpg"  width="100%"  alt="" ></a>
                    </div>
                </div>
                <!-- portfolio-block -->
                <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6 pd-0">
                    <div class="gallery-img"><a href="img/pic2.jpg" class="image-link" title="Image 7"><img src="img/pic2.jpg"  width="100%"  alt=""></a>
                    </div>
                </div>
                <!-- portfolio-block -->
                <!-- portfolio-block -->
                <div class="col-lg-3 col-md-3 col-sm-6 pd-0">
                    <div class="gallery-img"><a href="img/pic3.jpg" class="image-link" title="Image 8"><img src="img/pic3.jpg" width="100%"   alt=""></a>
                    </div>
                </div>
                <!-- portfolio-block -->
            </div></div>
        </div>
    </div>
    <!-- /.portfolio-section -->

    <p></p>
    <div class="container">
         <div class="col-md-12">
            <div class="row">
                <i class="fa fa-building building-icon"></i>&nbsp;&nbsp;<h6> RECENT PROJECTS</h6>
            </div>
        </div>
        <aside class="text-partner text-gray"> Lorem ipsum dolor sit</aside> 
        <div class="in-icon"></div>   
    </div>
    <div class="container-fluit my-4">
        <img src="img/b1.jpg" alt="" width="100%" > 
       
             <div class="col-md-12 text-center"> 
                    <img src="img/c1.jpg" class="recent-project" width="100">
                    <img src="img/c1.jpg" class="recent-project" width="100">
                    <img src="img/c1.jpg" class="recent-project" width="100">
              </div>
    </div>



    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <i class="fa fa-building building-icon"></i>&nbsp;&nbsp;<h6> FEATURE WORK</h6>
            </div>
        </div>
        <aside class="text-partner text-gray"> Lorem ipsum dolor sit</aside> 
        <div class="in-icon"></div>    
        <div class="my-4">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class=" h-100">
                    <a href="#"><img class="card-img-top" src="img/pic1.jpg" alt=""></a>
                    <div class="card-body card-body-f text-center">
                      <h5>
                        <a href="#" class="a text-dark-gray">18 FLOORS PROJECT</span></a>
                      </h5>
                      <aside class="card-text text-gray">Lorem ipsum dolor sit amet</aside> 
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class=" h-100">
                    <a href="#"><img class="card-img-top" src="img/pic2.jpg" alt=""></a>
                    <div class="card-body card-body-f text-center">
                      <h5>
                        <a href="#" class="a text-dark-gray">14 FLOORS PROJECT</span></a>
                      </h5>
                      <p class="card-text text-gray">Lorem ipsum dolor sit amet</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class=" h-100">
                    <a href="#"><img class="card-img-top" src="img/pic3.jpg" alt=""></a>
                    <div class="card-body card-body-f text-center">
                      <h5>
                        <a href="#" class="a text-dark-gray">10 FLOORS PROJECT</span></a>
                      </h5>
                      <p class="card-text text-gray">Lorem ipsum dolor sit amet</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class=" h-100">
                    <a href="#" class="a"><img class="card-img-top" src="img/pic4.jpg" alt=""></a>
                    <div class="card-body card-body-f text-center">
                      <h5 class="card-title">
                        <a href="#" class="a text-dark-gray">12 FLOORS PROJECT</span></a>
                      </h5>
                      <p class="card-text text-gray">Lorem ipsum dolor sit amet</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class=" h-100">
                    <a href="#"><img class="card-img-top" src="img/pic5.jpg" alt=""></a>
                    <div class="card-body card-body-f text-center">
                      <h5>
                        <a href="#" class="a text-dark-gray">17 FLOORS PROJECT</span></a>
                      </h5>
                      <p class="card-text text-gray">Lorem ipsum dolor sit amet</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class=" h-100">
                    <a href="#" class="a"><img class="card-img-top" src="img/pic6.jpg" alt=""></a>
                    <div class="card-body card-body-f text-center">
                      <h5>
                        <a href="#" class="a text-dark-gray">18 FLOORS PROJECT</span></a>
                      </h5>
                      <p class="card-text text-gray">Lorem ipsum dolor sit amet</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <i class="fa fa-map-marker location-icon"></i>&nbsp;&nbsp;<h6> CONSTRUCTION PROJECT'S LOCATION</h6>
            </div>
        </div>
        <aside class="text-partner text-gray"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</aside> 
        <div class="in-icon"></div>
        <iframe class="my-6" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.816209370627!2d104.83790256532104!3d11.56502964178934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31094e215a3059bd%3A0x890d7d8ceb16ec45!2sTaing+Kor+Sang+Khang+Tboung+Pagoda%2C+Street+105K%2C+Phnom+Penh!5e0!3m2!1sen!2skh!4v1525745264801" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
@endsection