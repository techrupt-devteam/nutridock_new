@extends('layouts.master')
@section('content')

<link rel="stylesheet" href="{{url('')}}/assets/css/about-us.css"/>
    <div class="page-content-main ">
    <div class="hero_single inner_pages background-image" style="background-image: url('{{url('')}}/assets/images/home_section_1.jpg');">
            <div class="opacity-mask" style="background-color: rgba(0, 0, 0, 0.6);">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Blog List</h1>
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
              <div class="col-lg-8 col-xl-9">
                <div class="inset-xl-right-70">
                  <div class="row row-50 row-md-60 row-lg-80 row-xl-100">
                    @foreach($blog_data as $blog_value)
                    <div class="col-12">

                      <article class="post box-xxl post-modern">
                        <div class="post-modern-panel">
                          <div>
                            <a href="" class="post-modern-tag">{{$blog_value->name}}</a>
                          </div>
                          <div>
                            <time datetime="2020-08-09" class="post-modern-time">{{ date('M d,Y',strtotime($blog_value->created_at))}}</time>
                          </div>
                        </div> 
                        <h1 class="post-modern-title">
                          <a href="{{url('/')}}/blog_detail/{{$blog_value->link}}">{{$blog_value->blog_title}}</a>
                        </h1>
                        <a href="#" class="post-modern-figure">
                         <img alt="" src="{{url('')}}/uploads/images/{{$blog_value->image}}" class="img-fluid">
                        </a>
                        <div class="post-modern-text" style="text-align: justify;">
                          {!!substr($blog_value->blog_description,0,200)!!}
                        </div> 
                    <a href="{{url('/')}}/blog_detail/{{$blog_value->link}}" class="post-modern-link">Read more</a>
                    </article>

                    </div>
                    @endforeach
                    <div class="col-12">
                      <!-- <article class="post box-xxl post-modern">
                        <div class="post-modern-panel">
                          <div>
                            <a href="" class="post-modern-tag">Lifestyle Hacks</a>
                          </div>
                          <div>
                            <time datetime="2020-08-09" class="post-modern-time">July 10, 2021</time>
                          </div>
                        </div> 
                        <h1 class="post-modern-title">
                          <a href="blog-detail.php">How can Nutridock Subscription Service help you?</a>
                        </h1>
                        <a href="#" class="post-modern-figure">
                          <img alt="" src="{{url('')}}/assets/images/Better-Sleep.jpg" class="img-fluid">
                        </a>
                        <p class="post-modern-text" style="text-align: justify;">
                          Since you’re here, I’m sure all of you know of Nutridock Health Kitchen by now. To reintroduce ourselves, Nutridock is a representation of mindful eating that allows you to choose from a wide range of healthy and flavorful dishes. We aim to be the catalyst for a nutrition revolution that is centered around embracing food as fuel for o
                        </p> 
                        <a href="blog-detail.php" class="post-modern-link">Read more</a>
                    </article> -->
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
                        <a href="{{url('')}}/category/{{$category_value->name}}">{{$category_value->name}}</a>
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
                      <!-- <div class="col-lg-12 col-6">
                        <article class="post post-minimal">
                          <div class="align-items-lg-center flex-column flex-lg-row unit unit-spacing-sm">
                            <div class="unit-left">
                              <a href="https://www.nutridockfit.com/blog_detail/5-Foods-To-Eat-Before-Bed-To-Get-Better-Sleep" class="post-minimal-figure">
                                <img alt="" src="https://www.nutridockfit.com/uploads/images/19a269ba3be7912acfcd7772ff039036659bd55d.jpg" width="106" height="104">
                              </a>
                            </div>
                            <div class="unit-body">
                              <p class="post-minimal-title">
                                <a href="https://www.nutridockfit.com/blog_detail/5-Foods-To-Eat-Before-Bed-To-Get-Better-Sleep">5 Foods To Eat Before Bed To Get Better Sleep
                                </a>
                              </p>
                              <div class="post-minimal-time">
                                <time datetime="2020-03-15">June 12, 2021</time>
                              </div>
                            </div>
                          </div>
                        </article>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
    </section>

</div>
@endsection
 
