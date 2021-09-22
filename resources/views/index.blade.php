
@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
 

<style>
   
.product.product-3 {
    position: relative;
    padding-bottom: 18px !important;
    max-width: 300px;
    background-color:#fff; 
    border-radius: 10px;
}

.product.product-3 img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.product-title {
    font-weight: 600;
    padding: 0px 9px;
    color: #1c2a39 !important;
    font-size: 1.25rem;
    text-align: center;
    padding-top: 10px;
    font-size: 1.25rem;
}
.product-title a {
    margin-top: 15px;
    font-weight: 600;
    padding: 0px 9px;
    color: #1c2a39 !important;
    text-align: center;
    padding-top: 10px;
    font-size: 1.25rem;
}



.demo{ 
    padding-top: 5px;
    background: url("{{url('')}}/assets//images/offer/single-img.jpg");
    
   }
.testimonial{
    margin: 0 20px 40px;
}
.testimonial .testimonial-content{
    padding: 35px 25px 35px 50px;
    margin-bottom: 35px;
    background: #fff;
    border: 1px solid #f0f0f0;
    position: relative;
}
.testimonial .testimonial-content:after{
    content: "";
    display: inline-block;
    width: 20px;
    height: 20px;
    background: #fff;
    position: absolute;
    bottom: -10px;
    left: 22px;
    transform: rotate(45deg);
}
.testimonial-content .testimonial-icon{
    width: 50px;
    height: 45px;
    background: #90d124;
    text-align: center;
    font-size: 22px;
    color: #fff;
    line-height: 42px;
    position: absolute;
    top: 37px;
    left: -19px;
}
.testimonial-content .testimonial-icon:before{
    content: "";
    border-bottom: 16px solid #ccc;
    border-left: 18px solid transparent;
    position: absolute;
    top: -16px;
    left: 1px;
}
.testimonial .description{
    font-size: 15px;
    font-style: italic;
    color: #8a8a8a;
    line-height: 23px;
    margin: 0;
}
.testimonial .title{
    display: block;
    font-size: 18px;
    font-weight: 700;
    color: #525252;
    text-transform: capitalize;
    letter-spacing: 1px;
    margin: 0 0 5px 0;
}
.testimonial .post{
    display: block;
    font-size: 14px;
    color: #ff4242;
}
.owl-theme .owl-controls{
    margin-top: 20px;
}
.owl-theme .owl-controls .owl-page span{
    background: #ccc;
    opacity: 1;
    transition: all 0.4s ease 0s;
}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{
    background: #ff4242;
}


.carousel-control-next-icon, .carousel-control-prev-icon {
    display:inline-block;
    width:40px;
    height:40px;
    background-repeat:no-repeat;
    background-position:50%;
    background-size:20px 20PX;
    background-color:#85d12f;
    /* border-radius:0 12px; */
}


</style>
<div class="page-content-main ">
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        @foreach($slider as $key => $slider_value)
           @if($key==0)
          <?php $active1 = "active";?>
          @else
          <?php $active1 = "";?>
          @endif

      <li data-target="#carousel-example-2" data-slide-to="{{$key}}" class="<?php echo $active1;?>"></li>
      <!-- <li data-target="#carousel-example-2" data-slide-to="1"></li>
      <li data-target="#carousel-example-2" data-slide-to="2"></li> -->
        @endforeach
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        
      @foreach($slider as $key => $slider_value)
      @if($key==0)
      <?php $active = "active";?>
      @else
      <?php $active = "";?>
      @endif
      <div class="carousel-item <?php echo $active;?>">
        <div class="view">
          <img class="d-block w-100" src="{{url('')}}/uploads/banner/{{$slider[$key]['image']}}" alt="First slide">
          <div class="mask rgba-black-light"></div>
        </div>
        <div class="carousel-caption">
          <!-- <h3 class="h3-responsive">Light mask</h3>
          <p>First text</p> -->
        </div>
      </div>
      @endforeach

      <?php /*?> <div class="carousel-item">
        <!--Mask color-->
        <div class="view">
          <img class="d-block w-100" src="http://dev.nutridockfit.com/public/front/img/eating-well.png"
            alt="Second slide">
          <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-caption">
          <!-- <h3 class="h3-responsive">Strong mask</h3>
          <p>Secondary text</p> -->
        </div>
      </div>
      <div class="carousel-item">
        <!--Mask color-->
        <div class="view">
          <img class="d-block w-100" src="http://dev.nutridockfit.com/public/front/img/proper-nutrition.png"
            alt="Third slide">
          <div class="mask rgba-black-slight"></div>
        </div>
        <div class="carousel-caption">
          <!-- <h3 class="h3-responsive">Slight mask</h3>
          <p>Third text</p> -->
        </div>
      </div> <?php*/?>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--/.Carousel Wrapper-->
  
<div class="container margin_60_40">
    <div class="main_title">
        <span><em></em></span>
        <h2>Coupons & Offers</h2>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        <a href="#0">View All</a>
    </div>
    
    <div class="owl-carousel owl-theme carousel_4 position-relative">
      @foreach($coupan as $key => $coupan_value)
          @if($key==0)
          <?php $active = "active";?>
          @else
          <?php $active = "";?>
          @endif
          <div class="item">
            <div class="strip">
                <figure>
                  <a href="javascript:void(0)" class="strip_info">
                    <img src="{{url('')}}/uploads/offer/thumb/{{$coupan[$key]['image']}}" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
         </div>
        @endforeach
        
        <!-- <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/Dominos_Mobi_Home_20210503.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div>
        <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/Home_airtel_30082020.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div>
        <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/Home_Freecharge_20210405.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div>
        <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/Home_Paytm_20210519.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div>
        <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/Home_payzapp_20201029.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div>
        <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/amazon_home_20210412.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div>
        <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/Dominos_Mobi_Home_20210503.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div>
        <div class="item">
            <div class="strip">
                <figure>
                  <a href="detail-restaurant.html" class="strip_info">
                    <img src="{{url('')}}/assets//images/Offer/Home_airtel_30082020.jpg" class="owl-lazy" alt="">
                  </a>
                </figure>
            </div>
        </div> -->
    </div>
    <!-- /carousel -->
</div>
<div class="bg_gray" style="overflow: hidden;">
    <div class="container margin_60_40">
        

        <section class="section bg-green">
            <!-- bg-default -->
            <div class="container">
                <div class="main_title">
                    <span><em></em></span>
                    <h2>Explore Menu</h2>
                   
                    <a href="#0">View All</a>
                </div>
               <div class="row row-30">
                  <!-- justify-content-center align-items-center -->
                 
                  <div class="col-md-12 col-lg-12 p-2">
                     <div class="fit-meals-child">
                        <div class="collection-list-wrapper-10 w-dyn-list">
                           <div class="row row-30 row-md-40 new-meal-card-parent fit">
                              @foreach($category as $key => $category_value)
                              <div class="col-sm-6 col-md-4 col-6  pr-2 mb-3 fit-meal-card">
                                 <article class="product product-3">
                                    <div class="product-body">
                                       <div class="product-figure"><img src="{{url('')}}/uploads/category/thumb/{{$category_value->cat_image}}" class="img-fluid"> </div>
                                       <h5 class="product-title"><a href="">{{$category_value->name}}</a></h5></div>
                                 </article>
                              </div>
                              @endforeach

                              <!-- <div class="col-sm-6 col-md-4 col-6 pl-2 pr-2 mb-3 fit-meal-card">
                                 <article class="product product-3">
                                    <div class="product-body">
                                       <div class="product-figure"><img src="{{url('')}}/assets//images/Best-Deals/6.jpg" class="img-fluid"> </div>
                                       <h5 class="product-title"><a href="">SANDWICH</a></h5>
                                       
                                    
                                    </div>
                                 </article>
                              </div>
                              <div class="col-sm-6 col-md-4 col-6 pl-2 pr-2 mb-3 fit-meal-card">
                                 <article class="product product-3">
                                    <div class="product-body">
                                       <div class="product-figure"><img src="http://dev.nutridockfit.com/uploads/images/95c7ae53605c065179545265ef5655305c095cf8.jpg" class="img-fluid"> </div>
                                       <h5 class="product-title"><a href="">WRAPS</a></h5>
                                      
                                      
                                    </div>
                                 </article>
                              </div>
                              <div class="col-sm-6 col-md-4 col-6  pr-2 mb-3 fit-meal-card">
                                 <article class="product product-3">
                                    <div class="product-body">
                                       <div class="product-figure">
                                       <img src="http://dev.nutridockfit.com/uploads/images/647399ddc20ecf2f6038977eb876c3bca6dd738b.jpg" class="img-fluid"> 
                                       </div>
                                       <h5 class="product-title">
                                       <a href="">SMOOTHIE BOWLS</a></h5>
                                      
                                      
                                    </div>
                                 </article>
                              </div>
                              <div class="col-sm-6 col-md-4 col-6 pl-2 pr-2 mb-3 fit-meal-card">
                                 <article class="product product-3">
                                    <div class="product-body">
                                       <div class="product-figure"><img src="http://dev.nutridockfit.com/uploads/images/2accb5793e936a81e03b1d280f45dbae8e3bb0eb.jpg" class="img-fluid"> </div>
                                       <h5 class="product-title"><a href="">MEAL BOWLS</a></h5>
                                      
                                    </div>
                                 </article>
                              </div>
                              <div class="col-sm-6 col-md-4 col-6 pl-2 pr-2 mb-3 fit-meal-card">
                                 <article class="product product-3">
                                    <div class="product-body">
                                       <div class="product-figure">
                                          <img src="http://dev.nutridockfit.com/uploads/images/91b3d9bf56d3344bec2dda10af5a85d61889f122.jpg" class="img-fluid"> 
                                       </div>
                                       <h5 class="product-title"><a href="">JUICES</a></h5>
                                       
                                      
                                    </div>
                                 </article>
                              </div>
                              <div class="col-sm-6 col-md-4 col-6 pl-2 pr-2 mb-3 fit-meal-card">
                                <article class="product product-3">
                                   <div class="product-body">
                                      <div class="product-figure">
                                         <img src="http://dev.nutridockfit.com/uploads/images/91b3d9bf56d3344bec2dda10af5a85d61889f122.jpg" class="img-fluid"> 
                                      </div>
                                      <h5 class="product-title"><a href="">DESSERT</a></h5>   
                                   </div>
                                </article>
                             </div>
                             <div class="col-sm-6 col-md-4 col-6 pl-2 pr-2 mb-3 fit-meal-card">
                                <article class="product product-3">
                                   <div class="product-body">
                                      <div class="product-figure">
                                         <img src="http://dev.nutridockfit.com/uploads/images/91b3d9bf56d3344bec2dda10af5a85d61889f122.jpg" class="img-fluid"> 
                                      </div>
                                      <h5 class="product-title"><a href="">DIPS & DRESSING</a></h5>
                                   </div>
                                </article>
                             </div>
                             <div class="col-sm-6 col-md-4 col-6 pl-2 pr-2 mb-3 fit-meal-card">
                                <article class="product product-3">
                                   <div class="product-body">
                                      <div class="product-figure">
                                         <img src="http://dev.nutridockfit.com/uploads/images/91b3d9bf56d3344bec2dda10af5a85d61889f122.jpg" class="img-fluid"> 
                                      </div>
                                      <h5 class="product-title"><a href="">SNACKS</a></h5>  
                                   </div>
                                </article>
                             </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="helper-div ff text-center">
                  <!--<a href="http://dev.nutridockfit.com/subscribe_now" class="btn btn-darkblue">Get Started</a>-->
               </div>
            </div>
         </section>
        <div class="main_title center">
            <span><em></em></span>
            <h2>Explore</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
        </div>
        <!-- /main_title -->
        <div class="owl-carousel owl-theme categories_carousel">
            <div class="item">
                <a href="#0">
                    <span>98</span>
                    <img src="{{url('')}}/assets//images/explore/menu.png" class="explore_icon" />
                    <h3>Our Menu</h3>
                    <small>Explore our range of delicious Pizzas, delivered in 30 minutes!</small>
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <span>87</span>
                    <img src="{{url('')}}/assets//images/explore/store.png" class="explore_icon" />
                    <h3>Nearby Store</h3>
                    <small>Find a Domino’s Pizza restaurant near you</small>
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <span>96</span>
                    <img src="{{url('')}}/assets//images/explore/birthday.png" class="explore_icon" />
                    <h3>Birthday Party</h3>
                    <small>Celebrate the joy of birthday with Fresh & Hot pizzas</small>
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <span>78</span>
                    <img src="{{url('')}}/assets//images/explore/catering.png" class="explore_icon" />
                    <h3>Catering</h3>
                    <small>Live Domino's Kitchen for weddings / corporate events</small>
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <span>96</span>
                    <img src="{{url('')}}/assets//images/explore/menu.png" class="explore_icon" />
                    <h3>Corporate Enquiry</h3>
                    <small>Celebrate the joy of birthday with Fresh & Hot pizzas</small>
                </a>
            </div>
            
        </div>
        <!-- /carousel -->
    </div>
        <!-- /container -->
</div>
<!-- /bg_gray -->

<div class="container margin_60_40">
    <div class="col-12">
        <div class="main_title version_2">
            <span><em></em></span>
            <h2>Testimonial</h2>
         
        </div>
    </div>
<div class="banner" data-bg="url({{url('')}}/assets//images/offer/single-img.jpg)">
    <div class="demo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonial-slider" class="owl-carousel">
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum dolor sit amet eros imperdiet, sit amet hendrerit nisi vehicula.
                                </p>
                            </div>
                            <h3 class="title">williamson</h3>
                            <span class="post">Web Developer</span>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum dolor sit amet eros imperdiet, sit amet hendrerit nisi vehicula.
                                </p>
                            </div>
                            <h3 class="title">williamson</h3>
                            <span class="post">Web Developer</span>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum dolor sit amet eros imperdiet, sit amet hendrerit nisi vehicula.
                                </p>
                            </div>
                            <h3 class="title">Kristina</h3>
                            <span class="post">Web Designer</span>
                        </div>
     
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="testimonial-icon">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent bibendum dolor sit amet eros imperdiet, sit amet hendrerit nisi vehicula.
                                </p>
                            </div>
                            <h3 class="title">williamson</h3>
                            <span class="post">Web Developer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /banner -->

<div class="row">
    <div class="col-12">
        <div class="main_title version_2">
            <span><em></em></span>
            <h2>Our Very Best Deals</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            <a href="#0">View All</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="list_home">
            <ul>
                <li>
                    <a href="detail-restaurant.html">
                        <figure>
                            <img src="{{url('')}}/assets//images/Best-Deals/6.jpg" alt="" class="lazy">
                        </figure>
                        <div class="score"><strong>9.5</strong></div>
                        <em>Italian</em>
                        <h3>La Monnalisa</h3>
                        <small>8 Patriot Square E2 9NF</small>
                        <ul>
                            <li><span class="ribbon off">-30%</span></li>
                            <li>Average price $35</li>
                        </ul>
                    </a>
                </li>
                <li>
                    <a href="detail-restaurant.html">
                        <figure>
                            <img src="{{url('')}}/assets//images/Best-Deals/5.jpg" alt="" class="lazy">
                        </figure>
                        <div class="score"><strong>8.0</strong></div>
                        <em>Mexican</em>
                        <h3>Alliance</h3>
                        <small>27 Old Gloucester St, 4563</small>
                        <ul>
                            <li><span class="ribbon off">-40%</span></li>
                            <li>Average price $30</li>
                        </ul>
                    </a>
                </li>
                <li>
                    <a href="detail-restaurant.html">
                        <figure>
                            <img src="{{url('')}}/assets//images/Best-Deals/4.jpg" alt="" class="lazy">
                        </figure>
                        <div class="score"><strong>9.0</strong></div>
                        <em>Sushi - Japanese</em>
                        <h3>Sushi Gold</h3>
                        <small>Old Shire Ln EN9 3RX</small>
                        <ul>
                            <li><span class="ribbon off">-25%</span></li>
                            <li>Average price $20</li>
                        </ul>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="list_home">
            <ul>
                <li>
                    <a href="detail-restaurant.html">
                        <figure>
                            <img src="{{url('')}}/assets//images/Best-Deals/3.jpg" alt="" class="lazy">
                        </figure>
                        <div class="score">
                            <strong>9.5</strong>
                        </div>
                        <em>Vegetarian</em>
                        <h3>Mr. Pepper</h3>
                        <small>27 Old Gloucester St, 4563</small>
                        <ul>
                            <li><span class="ribbon off">-30%</span></li>
                            <li>Average price $20</li>
                        </ul>
                    </a>
                </li>
                <li>
                    <a href="detail-restaurant.html">
                        <figure>
                            <img src="{{url('')}}/assets//images/Best-Deals/2.jpg" alt="" class="lazy">
                        </figure>
                        <div class="score"><strong>8.0</strong></div>
                        <em>Chinese</em>
                        <h3>Dragon Tower</h3>
                        <small>22 Hertsmere Rd E14 4ED</small>
                        <ul>
                            <li><span class="ribbon off">-50%</span></li>
                            <li>Average price $35</li>
                        </ul>
                    </a>
                </li>
                <li>
                    <a href="detail-restaurant.html">
                        <figure>
                            <img src="{{url('')}}/assets//images/Best-Deals/1.jpg" alt="" class="lazy">
                        </figure>
                        <div class="score">
                            <strong>8.5</strong>
                        </div>
                        <em>Pizza - Italian</em>
                        <h3>Bella Napoli</h3>
                        <small>135 Newtownards Road BT4</small>
                        <ul>
                            <li><span class="ribbon off">-45%</span></li>
                            <li>Average price $25</li>
                        </ul>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /row -->
<p class="text-center d-block d-md-block d-lg-none"><a href="grid-listing-filterscol.html" class="btn_1">View All</a></p>
<!-- /button visibile on tablet/mobile only -->
</div>
<!-- /container -->

<section class="app-section">
    <div class="app-wrap">
        <div class="container">
            <div class="row text-img-block text-xs-left">
                <div class="container">
                    <div class="row">
                    <div class="col-12 col-md-5 right-image text-center">
                        <figure class="m-0"> <img src="{{url('')}}/assets//images/app.png" alt="Right Image" class="img-fluid"> </figure>
                    </div>
                    <div class="col-12 col-md-7 left-text text-center text-md-left">
                        <h3>The Best Food Delivery App</h3>
                        <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                        <div class="social-btns text-center text-md-left">
                            <a href="#" class="app-btn apple-button clearfix" style="width: 170px;">
                                <div class="float-left"><i class="fab fa-apple"></i> </div>
                                <div class="float-right"> 
                                    <span class="text">Available on the</span> <span class="text-2">App Store</span> 
                                </div>
                            </a>
                            <a href="#" class="app-btn android-button clearfix">
                                <div class="float-left"><i class="fab fa-android"></i> </div>
                                <div class="float-right"> 
                                    <span class="text">Available on the</span> <span class="text-2">Play store</span> 
                                </div>
                            </a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- COMMON SCRIPTS -->
    <script src="{{url('')}}/assets//js/common_scripts.min.js"></script>
    <script src="{{url('')}}/assets//js/common_func.js"></script>
    <!-- <script src="{{url('')}}/{{url('')}}/assets//js/validate.js"></script> -->
@endsection
 
