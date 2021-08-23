
</div>
<div style="height: 20vh;">&nbsp;</div>
<div class="mobCart bgCart z-depth-1 colorcodeclass">
    <a class="nav-link cartbtnlink" onclick="carOpen()" style="">
        <div class="CartImg">
            <i class="fa fa-shopping-bag fa-2x"></i>
        </div>
        <div class="countercartdiv"></div>
    </a>
</div>

<!-- Login with otp --> 
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">× esc</a>
    <div class="main_warp_login">
        <img class="food_img" src="{{url('')}}/assets/images/login_pizza_image.png"/>
        <img class="logo_sidebar" src="{{url('')}}/assets/images/logo.png">
        <div class="inner-section">
            <div class="login__txt">
                <span>Login</span> to unlock awesome new features</div>
                <div class="row no-gutters">
                    <div class="col-4 d-flex">
                    <img src="{{url('')}}/assets/images/health.png" class="food-icon"/>
                    <div class="hd-img__sbtxt__img-txt">
                        Healthy  Food
                    </div>
                    </div>
                <div class="col-4 d-flex">
                    <img src="{{url('')}}/assets/images/great_offers.svg" class="food-icon"/>
                    <div class="hd-img__sbtxt__img-txt"> Great 
                        Offers
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <img src="{{url('')}}/assets/images/order-food.png" class="food-icon"/>
                    <div class="hd-img__sbtxt__img-txt">
                        Easy
                       Order
                    </div>
                </div>
            </div>
        </div>
        <div class="form-section-start">
            <div class="sc-dqBHgY ikREsg">
                <div class="subtitle-login"> Login with your valid mobile number</div>
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="background-color: transparent;">+91</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Mobile No.">
                    </div>
                    <input type="text" class="form-control" placeholder="OTP">
                    <div class="submit_btn mt-3">
                        <input type="submit" class="btn btn-success" value="SUBMIT"></div>
                    </form>
                </div>
            </div>
            <div class="login_option_">
                <div class="sc-gxMtzJ jkZWiM">
                    <div class="heading_accounts"> Login with social accounts</div>
                    <div class="btn-group">
                        <button class="btn btn-primary mr-1">
                            <i class="fab fa-facebook-f"></i>
                            <span>Facebook</span>
                        </button>
                        <button class="btn btn-danger ml-1">
                            <i class="fas fa-envelope"></i> <span>Google</span>
                        </button>
                </div>
            </div>
        </div>
    </div>
   
  </div>
</div>
<!--End  Login with otp -->

<!-- Cart checkout -->
<div id="myCart" class="sidebar addCart">
      <div class="modal-header colorcodeclass">
        <p class="heading lead colorcodeclass mb-0">Your order summary</p>
        <a href="javascript:void(0)" class="closebtnCart" onclick="closecart()">×</a>
    </div> 
    <div class="cart_wrap">   
        <div id="cart_list">
    
        </div>
    </div>
 </div>
<!-- End Cart checkout -->


<!-- Modal filter -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Food Type</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <form>
            <div class="row">
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck">  Indian Super Food </label>
                   </div>  
                </div>
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="example2">
                    <label class="custom-control-label" for="customCheck2">    <500 kcal </label>
                   </div>  
                </div>
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="example1">
                    <label class="custom-control-label" for="customCheck3">  Jain </label>
                   </div>  
                </div>
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="example1">
                    <label class="custom-control-label" for="customCheck4">    Vegan </label>
                   </div>  
                </div>
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck5" name="example1">
                    <label class="custom-control-label" for="customCheck5">  High Protein </label>
                   </div>  
                </div>
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck6" name="example1">
                    <label class="custom-control-label" for="customCheck6">  Gluten-Free </label>
                   </div>  
                </div>
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck7" name="example1">
                    <label class="custom-control-label" for="customCheck7">    Vegan </label>
                   </div>  
                </div>
                <div class="col-md-4 mt-2 mb-2">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck8" name="example1">
                    <label class="custom-control-label" for="customCheck8"> Immunity Booster </label>
                   </div>  
                </div>
            </div>
           
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal filter -->


    
<footer class="page-footer text-center">
<div class="container text-center text-md-left pt-4">
    <div class="row mt-3">
        <div class="col-12 col-md-2 col-lg-2 col-xl-2 mb-4">
            <figure class="Imgwrap">
                <img src="{{url('')}}/assets/images/NutridockFit-Logo.png" class="rounded float-left img-fluid foologo" alt="logo">                
            </figure>
            <div class="clear"></div>
                <div class="text-center pt-3 social-buttons">
                        <a href="#" target="_blank"> 
                            <i class="fab fa-facebook mr-3"></i> 
                        </a>
                        <a href="#" target="_blank"> 
                            <i class="fab fa-instagram-square mr-3"></i> 
                        </a>           
                </div>
            </div>
            <div class="col-md-5 col-lg-5 col-xl-5 mb-4 mx-auto">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>ADDRESS</strong>
                </h6>
                <hr class="info-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <h5 class="footAddrs">
                    <i class="fa fa-map-marker pr-2"></i> 
                    Nutridock, Store B-17,MIDC Ambad, Nashik, Next To Seva Nexa Service Center, Maharashtra 422010
                </h5>
            </div>
            <div class="col-md-5 col-lg-5 col-xl-3 col-12">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Contact Information</strong>
                </h6>
                <hr class="info-color mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a id="footer-link-team" href="#"> 
                        <i class="fa fa-users mr-3"></i> About Us</a>
                </p>
                 <p>
                <a href="tel:7447725922" id="footer-link-company"> 
                    <i class="fa fa-phone mr-3" aria-hidden="true"></i> +91 7447725922
                </a>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-copyright py-3">
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                    <h5 class="footAddrs mb-0">
                        © Nutridock 2021. All rights reserved. | Design & Develop <a href="#">Techrupt</a>
                    </h5>
                </div><!--end of col-3-->
          </div><!--end of row-->
        </div><!--end of container-->
    </div>
</footer>
<style>
.cart_wrap {
    max-height: 75vh !important;
    overflow-x: hidden;
    display: inline-flex;
    height: 100%;
    overflow-y: scroll;
    width: 100%;
}
</style>


<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "350px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}

function carOpen() {
  document.getElementById("myCart").style.width = "350px";
}

function closecart() {
  document.getElementById("myCart").style.width = "0";
}
</script>

 
 <script>
    $(document).ready(function($) {
        // Header fixed // Fixed sidebar function 
        function headerStuff() {
            if ($(window).scrollTop() >= 50) {
                $('body').addClass('fixedfifty');
                $('#header-main').addClass('fixed-header');
                $('#sticky-header').addClass('stickyActive');
            } else {
                $('body').removeClass('fixedfifty');
                $('#header-main').removeClass('fixed-header');
                $('#sticky-header').removeClass('stickyActive');
            }
        };
        // Header fixed // Fixed scrollspy_nav_fixed call
        headerStuff();
        $(window).scroll(function () {
            headerStuff();
        });
        $('.dropdown').click(function() {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.dropdown-menu').slideToggle(300);
        });
        $('.dropdown').focusout(function() {
            $(this).removeClass('active');
            $(this).find('.dropdown-menu').slideUp(300);
        });
        $('.dropdown .dropdown-menu li').click(function() {
            $(this).parents('.dropdown').find('span').text($(this).text());
            $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
        });
       
        $('.searchtop').click(function() {
            var classlall = this.classList;
            var filter_attributed_check = [];
            
            if(jQuery.inArray("search", classlall) !== -1){
                $.each($("input[name='attributefilter_other[]']:checked"), function(){            
                    filter_attributed_check.push($(this).val());
                });
                if(jQuery.inArray("1", filter_attributed_check) !== -1){
                   
                }
            }
            
            if(jQuery.inArray("serach-bar-top-close", classlall) !== -1){
                $.each($("input[name='attributefilter[]']:checked"), function(){            
                    filter_attributed_check.push($(this).val());
                });
            }
            $(".serach-bar-top").slideToggle();
        });
        
        // mobile menu  
       
    });
</script>

<script>
    $(document).ready(function () {
        $(".addongrouppopup").on('click', function(){
            $('#addongrouppopupModal').modal('show'); 
        });

        $("#category_scrollspy ul li a:first").addClass('active');
        $('body').scrollspy({target: "#category_scrollspy", offset: 250});
        var offset = 120;
        function scrollToSection(event) {
            event.preventDefault();
            var $section = $($(this).attr('href'));
            $('html, body').animate({
                scrollTop: $section.offset().top - 120
            }, 500);
        }
        $('[data-scroll]').on('click', scrollToSection);
        $('#category_scrollspy ul li a').click(function (event) {
            event.preventDefault();
            $($(this).attr('href'))[0].scrollIntoView();
            scrollBy(0, -offset);
            //$('#category_scrollspy').removeClass('category_scrollspy-open');
            $('#sidebar-mobile').removeClass('sidebar-mobile-active');
            $('.overlay').removeClass('overlay-open');
        });
        // mobile menu  
        $('.sidebar-mobile').click(function (e) {
            e.preventDefault();
            $('.sidebar-mobile').toggleClass('sidebar-mobile-active');
            $('#category_scrollspy').toggleClass('category_scrollspy-open');
            $('.col-left-sidebar').toggleClass('mobile-menu-show');
            $('.overlay').toggleClass('overlay-open');
            $('html').toggleClass('body-overflow-hide');
        });
        $('#category_scrollspy').click(function (e) {
            e.preventDefault();
            $('.sidebar-mobile').toggleClass('sidebar-mobile-active');
            $('#category_scrollspy').toggleClass('category_scrollspy-open');
            $('.overlay').removeClass('overlay-open');
            $('html').removeClass('body-overflow-hide');
        });
    $('.left_category_nav') .css({'height': (($(window).height()) - 130)+'px'});
        // End document
    });

</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

<!-- <script src="{{url('')}}/assets/js/order.js"></script> -->
<script src="{{url('')}}/assets/js/popper.js" type="text/javascript"></script>    
<script src="{{url('')}}/assets/js/bootstrap.js" type="text/javascript"></script>    
<!-- <script src="{{url('')}}/assets/js/mdb.js" type="text/javascript"></script>  -->
<!-- <script src="{{url('')}}/assets/js/common.js" type="text/javascript"></script>    
<script src="{{url('')}}/assets/js/custom.js" type="text/javascript"></script>  -->
<script src="{{url('')}}/assets/js/jquery.js" type="text/javascript"></script>    
<script src="{{url('')}}/assets/js/jquery-loading-overlay.js" type="text/javascript"></script>    
</body>
</html>

<!-- <script src="{{url('')}}/public/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('')}}/public/front/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{url('')}}/public/front/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="{{url('')}}/public/front/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{url('')}}/public/front/vendor/venobox/venobox.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="{{url('')}}/public/front/js/main.js"></script>
<script src="{{ url('/admin_css_js')}}/css_and_js/admin/parsley.js"></script>
 -->