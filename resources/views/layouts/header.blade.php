<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">
    <meta name="author" content="Ansonika">
    <title>
        Order | Nutridock            
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{url('')}}/assets/images/favicon.png" sizes="16x16"> 
    <script src="{{url('')}}/assets/js/jquery-3.js" type="text/javascript"></script>    
    <link rel="stylesheet" href="{{url('')}}/assets/fontawesome/css/all.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap.css" type="text/css"> -->
    <link rel="stylesheet" href="{{url('')}}/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/style-new.css" type="text/css"> 
    <link rel="stylesheet" href="{{url('')}}/assets/css/landing.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/home.css" type="text/css">
    <link href="{{url('')}}/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <style type="text/css">
  .parsley-required{
    color: red;
  }
  .parsley-type{
    color: red;
  }
  .parsley-minlength{
    color: red; 
  }
  .parsley-errors-list{
    list-style: none;
      padding-left: 5px;
  }
  .parsley-equalto{
    color: red; 
  }
  .inr_font_size_12{
    font-size: 12px;
  }
    .alert_msg{
    max-width: 374px;
    margin-left: auto;
    border-radius: 0px;
  }
 .swal-button--confirm {
    background-color: #f44336 !important;
    color: #fff;
    border: none;
    box-shadow: none;
    border-radius: 5px;
    font-weight: 600;
    font-size: 14px;
    padding: 10px 24px;
    margin: 0;
    cursor: pointer;
}
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
/*Comment List styles*/
.comment-list .row {
  margin-bottom: 0px;
}
.comment-list .panel .panel-heading {
  padding: 4px 15px;
  position: absolute;
  border:none;
  /*Panel-heading border radius*/
  border-top-right-radius:0px;
  top: 1px;
}
.comment-list .panel .panel-heading.right {
  border-right-width: 0px;
  /*Panel-heading border radius*/
  border-top-left-radius:0px;
  right: 16px;
}
.comment-list .panel .panel-heading .panel-body {
  padding-top: 6px;
}
.comment-list figcaption {
  /*For wrapping text in thumbnail*/
  word-wrap: break-word;
}
/* Portrait tablets and medium desktops */
@media (min-width: 768px) {
  .comment-list .arrow:after, .comment-list .arrow:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-color: transparent;
  }
  .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
    border-left: 0;
  }
  /*****Left Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.left:before {
    left: 0px;
    top: 30px;
    /*Use boarder color of panel*/
    border-right-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.left:after {
    left: 1px;
    top: 31px;
    /*Change for different outline color*/
    border-right-color: #FFFFFF;
    border-width: 15px;
  }
  /*****Right Arrow*****/
  /*Outline effect style*/
  .comment-list .panel.arrow.right:before {
    right: -16px;
    top: 30px;
    /*Use boarder color of panel*/
    border-left-color: inherit;
    border-width: 16px;
  }
  /*Background color effect*/
  .comment-list .panel.arrow.right:after {
    right: -14px;
    top: 31px;
    /*Change for different outline color*/
    border-left-color: #FFFFFF;
    border-width: 15px;
  }
}
.comment-list .comment-post {
  margin-top: 6px;
}
  </style>

 </head>

<body style="overflow-x: hidden;">
    <header id="header-main" class="header darkblue">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
         <img src="{{url('')}}/assets/images/logo.svg" class="img-fluid" alt="logo logo-mobile" style="width: 92px;">  
        </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="header-left">
    <button class="hrhamburger" data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
        <div id="nav-icon1">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </button>
    <div class="float-left order-0 sign-up d-sm-none pl-2">
        <a href="#" class="openbtn" onclick="openNav()">
            <img src="{{url('')}}/assets/images/avatar.svg">
            <div class="hdr-lgn">
                <span class="hdr-lgn-txt ellipsis">My Account</span>
                <span class="hdr-lgn-txt-hd">Login | Signup</span>
            </div>
        </a>
    </div>
 </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
     <!--  <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('')}}/our-menu">Our Menu</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{url('')}}/our-store">Store Finder</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('')}}/about-us">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('')}}/blog">Blog</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="corporate-Enquiry.php">Corporate Enquiry</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('')}}/contact">Contact Us</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
    <?php /*
      <div class="mobile-menu clearfix" id="headerhamburger">
                <div class="header-right float-right">
                    <div class="serach-bar-top z-depth-1-half order-1" style="display:none;">
                        <div class="container">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-group search-input">
                                        <input type="text" class="form-control item_search_txt" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-search item_search_btn colorcodeclass waves-effect waves-light" type="submit"><i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="serach-bar-top-close searchtop">
                                <svg width="16.001" height="16" viewBox="0 0 16.001 16">
                                    <g transform="translate(0 -0.016)">
                                        <g transform="translate(0 0.016)">
                                            <path d="M9.763,8.016l5.983-5.983a.877.877,0,0,0,0-1.238L15.221.271a.877.877,0,0,0-1.238,0L8,6.254,2.018.271a.877.877,0,0,0-1.237,0L.256.8a.876.876,0,0,0,0,1.238L6.239,8.016.256,14a.878.878,0,0,0,0,1.238l.524.524a.877.877,0,0,0,1.237,0L8,9.778l5.983,5.983a.868.868,0,0,0,.619.255h0a.868.868,0,0,0,.619-.255l.524-.524a.878.878,0,0,0,0-1.238Z" transform="translate(0 -0.016)"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="search-sec float-left">
                        <div class="search searchtop"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.307" height="21.034" viewBox="0 0 20.307 21.034"><defs></defs><path class="a" d="M20.983,19.159l-5.006-5.207a8.489,8.489,0,1,0-6.5,3.033,8.4,8.4,0,0,0,4.865-1.537l5.044,5.246a1.108,1.108,0,1,0,1.6-1.536ZM9.476,2.215A6.277,6.277,0,1,1,3.2,8.492,6.284,6.284,0,0,1,9.476,2.215Z" transform="translate(-0.984)"></path></svg>
                        </div>
                    </div>
                    <div class="head-min-ord float-left order-3">
                       <a data-toggle="modal" data-target="#myModal" style="align-self: center;cursor: pointer;"> 
                            <img src="{{url('')}}/assets/images/filter-setting.svg" width="25px" />
                        </a>
                    </div>

                    <div class="float-left order-0 sign-up d-none d-sm-flex">
                        <a href="#" class="openbtn" onclick="openNav()">
                            <img src="{{url('')}}/assets/images/avatar.svg"/>
                            <div class="hdr-lgn">
                                <span class="hdr-lgn-txt ellipsis">My Account</span>
                                <span class="hdr-lgn-txt-hd">Login | Signup</span>
                            </div>
                        </a>
                    </div>

                    <div class="dropdown float-left order-0 sign-up d-none pl-0 ml-0"> <!-- d-sm-flex --> 
                        <a type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="background-color: #fff;">
                           <img src="{{url('')}}/assets/images/avatar.svg" style="width: 30px;"/>
                            <div class="hdr-lgn">
                                <span class="hdr-lgn-txt ellipsis">Surendra Singh</span>
                                <span class="hdr-lgn-txt-hd text-left">7028102190</span>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                          <h5 class="dropdown-header">Setting</h5>
                          <a class="dropdown-item ml-0" href="my-account.php"><i class="fas fa-users"></i> &nbsp; Profile</a>
                          <hr/>
                          <a class="dropdown-item ml-0" href="#"><i class="fas fa-sign-out-alt"></i> &nbsp; Signout</a>
                        </div>
                    </div> <?php */?>
                </div>
            </div>

    </div>
  </div>
</nav>
</header>