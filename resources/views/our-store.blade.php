@extends('layouts.master')
@section('content')
<div class="page-content-main ">
    <div class="hero_single inner_pages background-image">
            <div class="opacity-mask" style="background-color: rgba(0, 0, 0, 0.6);">
                 <iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39714.47749917409!2d-0.13662037019554393!3d51.52871971170425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondra%2C+Regno+Unito!5e0!3m2!1sit!2ses!4v1557824540343!5m2!1sit!2ses" allowfullscreen height="100%">
                 </iframe>
            </div>
        </div>
        <!-- /hero_single -->
        <div class="bg_gray py-3">
            <div class="container mb-5 pt-3">
                <div class="main_title">
                    <h2 class="mb-3">Top Rated : Restaurants Nearby</h2>
                    <p class="pb-3">
                        Always available for freelancing if the right project comes along, Feel free to contact me.
                    </p>
                    <span><em></em></span>
                </div>
            </div>
            <div class="container mb-5">
                <div class="row justify-content-center">
                        @foreach($data as $value)
                        <div class="col-lg-4 mb-3">
                            <div class="address__wrap  bg-white">
                               <div class="padding_eight_all">
                                    <div class="heading_s1">
                                      <h3>{{ucfirst($value->name)}}</h3>
                                    </div>
                                <div>
                                    <div class="media">
                                        <div class="icon">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <span class="media-body">{{ucfirst($value->address)}}<!-- <br> United States Of America <br> NY 750065. -->
                                        </span>
                                    </div>
                                    <div class="media my-3">
                                        <div class="icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <span class="media-body">{{$value->email2}}<br>{{$value->email2}}</span>
                                    </div>
                                    <div class="media mb-2">
                                        <div class="icon">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <span class="media-body">{{$value->phone1}}<br>{{$value->phone2}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="st-section-bottom">
                                <ul class="nav d-flex">
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link" href="tel:{{$value->phone1}}">Call</a>
                                    </li>
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link" href="#" target="_blank">Navigate</a>
                                    </li>
                                    <li class="nav-item flex-fill border-right-0">
                                        <a class="nav-link active" href="{{$value->order_link}}" target="_blank">order</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-4 mb-3">
                        <div class="address__wrap  bg-white">
                            <div class="padding_eight_all">
                                <div class="heading_s1">
                                    <h3>Mumbai</h3>
                                </div>
                                <div>
                                    <div class="media">
                                        <div class="icon">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <span class="media-body">123 Stree New York City , <br> United States Of America <br> NY 750065.
                                        </span>
                                    </div>
                                    <div class="media my-3">
                                        <div class="icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <span class="media-body">support@domain.com<br>info@domain.com</span>
                                    </div>
                                    <div class="media mb-2">
                                        <div class="icon">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <span class="media-body">+044 966 9696 636<br>+044 966 9696 636</span>
                                    </div>
                                </div>
                            </div>
                            <div class="st-section-bottom">
                                <ul class="nav d-flex">
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link" href="tel:15252552">Call</a>
                                    </li>
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link" href="#" target="_blank">Navigate</a>
                                    </li>
                                    <li class="nav-item flex-fill border-right-0">
                                        <a class="nav-link active" href="#" target="_blank">order</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-4 mb-3">
                        <div class="address__wrap  bg-white">
                            <div class="padding_eight_all">
                                <div class="heading_s1">
                                    <h3>Thane</h3>
                                </div>
                                <div>
                                    <div class="media">
                                        <div class="icon">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </div>
                                        <span class="media-body">123 Stree New York City , <br> United States Of America <br> NY 750065.
                                        </span>
                                    </div>
                                    <div class="media my-3">
                                        <div class="icon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <span class="media-body">support@domain.com<br>info@domain.com</span>
                                    </div>
                                    <div class="media mb-2">
                                        <div class="icon">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <span class="media-body">+044 966 9696 636<br>+044 966 9696 636</span>
                                    </div>
                                </div>
                            </div>
                            <div class="st-section-bottom">
                                <ul class="nav d-flex">
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link" href="tel:15252552">Call</a>
                                    </li>
                                    <li class="nav-item flex-fill">
                                        <a class="nav-link" href="#" target="_blank">Navigate</a>
                                    </li>
                                    <li class="nav-item flex-fill border-right-0">
                                        <a class="nav-link active" href="#" target="_blank">order</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>

@endsection
 
