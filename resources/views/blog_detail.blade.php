@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{url('')}}/assets//css/about-us.css"/>
  <div class="page-content-main ">
  <div class="hero_single inner_pages background-image" style="background-image: url('{{url('')}}/assets//images/home_section_1.jpg');">
          <div class="opacity-mask" style="background-color: rgba(0, 0, 0, 0.6);">
              <div class="container">
                  <div class="row justify-content-center text-center">
                      <div class="col-xl-9 col-lg-10 col-md-8">
                          <h1>Blog Post</h1>
                      </div>
                  </div>
                  <!-- /row -->
              </div>
          </div>
      </div>
      <div class="container content-main my-5 py-4">
      <section class="blog ptb-100">
          <div class="container">
            <div class="row row-50 row-md-60">
              <div class="col-lg-8 col-xl-9"><div class="inset-xl-right-70">
                    <div class="row row-50 row-md-60 row-lg-80 row-xl-100"><div class="col-12">
                        <article class="post box-xxl post-modern" style="text-align: justify;">
                          <div class="post-modern-panel">
                            <div>
                              <a href="javascript:;" class="post-modern-tag">{{$blog_details->name}}</a></div><div>
                                <time datetime="2020-08-09" class="post-modern-time">{{ date('M d,Y',strtotime($blog_details->created_at))}}</time>
                              </div>
                            </div>
                            <h1 class="post-modern-title">
                              <a href="">{{$blog_details->blog_title}}</a>
                            </h1>
                            <a href="" class="post-modern-figure">
                              <img alt="" src="{{url('')}}/uploads/images/{{$blog_details->image}}" class="img-fluid">
                            </a>
                           {!!$blog_details->blog_description!!}
                        </article>
<!-- <div class="single-post-bottom-panel">
  <div class="group-sm group-justify">
    <div class="mobile-size-adjut">
      <div class="group-sm group-tags">
        <a href="#" class="link-tag">Fruits</a> 
        <a href="#" class="link-tag">Vegetables</a>
        <a href="#" class="link-tag">Drinks</a>
      </div>
    </div>
    <div>
</div>
</div>
</div> -->
</div>
<div class="col-12">
     
<h6 class="single-post-title">Related Posts</h6>
<div class="row row-30">
 @foreach($related_blog as $related_value)
  <div class="col-sm-6">
    <article class="post box-md post-classic">
      <a href="#" class="post-classic-figure">
        <img src="{{url('')}}/uploads/images/{{$related_value->image}}" class="img-fluid">
      </a>
      <div class="post-classic-content">
        <div class="post-classic-time">
          <time datetime="2020-09-08">{{ date('M d,Y',strtotime($related_value->created_at))}}</time>
        </div>
        <h2 class="post-classic-title" style="font-size:1.25rem">
          <a href="{{url('/')}}/blog_detail/{{$related_value->link}}">{{$related_value->blog_title}}</a>
        </h2>
        <p class="post-classic-text" style="text-align: justify;">
           {!!substr($related_value->blog_description,0,70)!!}
        </p>
      </div>
    </article>
  </div>
  @endforeach

</div>
</div>
<div class="col-12 mb-4">
  <h6 class="single-post-title">Comments</h6>

<section class="comment-list">
          <!-- First Comment -->
            @foreach($comments as $com_value)
          <article class="row">
            <!-- <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                <figcaption class="text-center">username</figcaption>
              </figure>
            </div> -->
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><strong><i class="fa fa-user"></i> {{ucfirst($com_value->name)}}</strong></div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>{{date('D M Y',strtotime($com_value->created_at))}}</time>
                  </header>
                  <div class="comment-post">
                    <p>
                      {{ucfirst($com_value->comment_desc)}}
                    </p>
                  </div>
                
                </div>
              </div>
            </div>
          </article> @endforeach
        </section>

</div> 
<div class="col-12">
  <h6 class="single-post-title">Leave a comment</h6>
  <form role="form" data-parsley-validate="parsley" onsubmit="comment_Store();">
      {!! csrf_field() !!}
    <div class="row form-row">
      <div class="col-12 col-md-6 form-group mb-3">
        <input name="name" class="form-control" data-msg="Please enter at least 4 chars" data-rule="minlen:4" id="name" placeholder="Your Name" required="required">       
        <input name="blog_id" id="blog_id" type="hidden" value="{{$blog_details->id}}">
        <div class="validate">
        </div>
      </div>
      <div class="col-12 col-md-6 form-group mb-3">
        <input name="email" type="email" class="form-control" data-msg="Please enter a valid email" data-rule="email" id="email" placeholder="Your Email" required="required">
              <div class="validate">
              </div>
            </div>
          </div>
          <div class="mb-3 form-group mt-3">
            <textarea class="form-control" name="comment_desc" id="comment_desc" placeholder="Message" data-msg="Please write something for us" required="required">
            </textarea>
           </div>
          <div class="text-left">
            <button class="button" type="submit">Send Message</button>
          </div>
          </form>
          </div>
          </div>
          </div>
          </div>
              <div class="col-lg-4 col-xl-3">
                <div class="row aside justify-content-md-between row-30 row-md-50">
                  <div class="col-lg-12 aside-item col-sm-6 col-md-5">
                    <h6 class="aside-title">Categories</h6>
                    <ul class="list-categories">
                         @foreach($categories as $category_value)  
                      <li>
                        <a href="{{url('')}}/blog/{{$category_value->name}}">{{$category_value->name}}</a>
                        <span class="list-categories-number">({{$category_value->cnt}})</span>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="col-lg-12 aside-item col-sm-6">
                    <h6 class="aside-title">Latest Posts</h6>
                    <div class="row gutters-10 mt-4 row-20 row-lg-30">
                       @foreach($recent_data as $recent_value)
                      <div class="col-lg-12 col-6">
                        <article class="post post-minimal">
                          <div class="align-items-lg-center flex-column flex-lg-row unit unit-spacing-sm">
                            <div class="unit-left">
                              <a href="#" class="post-minimal-figure">
                                <img alt="" src="{{url('')}}/uploads/images/{{$recent_value->image}}" width="106" height="104">
                              </a>
                            </div>
                            <div class="unit-body">
                              <p class="post-minimal-title">
                                <a href="{{url('')}}/blog_detail/{{$recent_value->link}}">{{$recent_value->blog_title}}
                                </a>
                              </p>
                              <div class="post-minimal-time">
                                <time datetime="2020-03-15">{{ date('M d,Y',strtotime($recent_value->created_at))}}</time>
                              </div>
                            </div>
                          </div>
                        </article>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
    </section>

</div>
<script src="{{ url('/admin_css_js')}}/css_and_js/admin/parsley.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  

  <script type="text/javascript">
    function comment_Store() 
    {  
      var name1 = $("#name").val();
      var email1 = $("#email").val();
      var blog_id1 = $("#blog_id").val();
      var comment_desc1 = $("#comment_desc").val();
      if(name1!=""&&email1!=""&&comment_desc1!="")
      {
      //alert(status);
       $.ajax({
            url: "{{url('')}}/store_comment",
            type: 'post',
            data: {name:name1,email:email1,blog_id:blog_id1,comment_desc:comment_desc1},
            success: function (data) 
            {
              swal("Success", "comment successfully send", "success");
              return false;
            }
        });
      }else{
        swal("Warning", "Please fill all fields", "warning");
      }  

     }
  </script>
@endsection
 
