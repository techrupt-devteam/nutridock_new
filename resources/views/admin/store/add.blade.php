@extends('admin.layout.master')
@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        {{ $page_name." ".$title }}
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}/dashbord"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('/admin')}}/manage_category">Manage {{ $title }}</a></li>
        <li class="active">{{ $page_name." ".$title }}</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
           @include('admin.layout._status_msg')
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> {{ $page_name." ".$title }}
                {{-- <small>Preview</small> --}}</h3>
                <ol class="breadcrumb">
                  <li><a href="{{url('/admin')}}/dashbord"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="{{url('/admin')}}/manage_category">Manage {{ $title }}</a></li>
                  <li class="active">{{ $page_name." ".$title }}</li>
                </ol> 
            </div>
            <div class="box-body">
            <!-- form start -->
            <form action="{{ url('/admin')}}/store_{{$url_slug}}" method="post" role="form" data-parsley-validate="parsley" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="row">
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Store Name <span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Store Name" required="true" data-parsley-errors-container="#name_error" data-parsley-error-message="Please enter name." autocomplete="off">
                         <div id="name_error" style="color:red;"></div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Email <span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="email1" name="email1" placeholder="Store email" required="true" data-parsley-errors-container="#1_error" data-parsley-error-message="Please enter email." autocomplete="off">
                         <div id="1_error" style="color:red;"></div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Other Email </label>
                        <input type="text" class="form-control" id="email2" name="email2" placeholder="Store Other Email">
                         <div id="2_error" style="color:red;"></div>
                      </div>
                  </div>
                </div>
                  <div class="row">
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Phone <span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Store Phone" required="true" data-parsley-errors-container="#3_error" data-parsley-error-message="Please enter phone." autocomplete="off">
                         <div id="3_error" style="color:red;"></div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Other Phone</label>
                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Store Other Phone">
                         <div id="4_error" style="color:red;"></div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Address <span style="color:red;" >*</span></label>
                         <textarea class="form-control" name="address" row=5 required="true" data-parsley-errors-container="#4_error" data-parsley-error-message="Please enter phone."> </textarea>
                         <div id="address_error" style="color:red;"></div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Order Link</label>
                        <input type="text" class="form-control" id="order_link" name="order_link" placeholder="Store Other Link">
                       
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Navigate Address <span style="color:red;" >*</span></label>
                         <textarea class="form-control" name="navigate_link" row=5 required="true" data-parsley-errors-container="#navigate_link" data-parsley-error-message="Please enter phone."></textarea>
                         <div id="navigate_link" style="color:red;"></div>
                      </div>
                  </div>
                </div>
              </div>  
              <div class="box-footer">
                  <div class="row">
                    <div class="col-md-12">

                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="{{url('/admin')}}/manage_{{$url_slug}}"  class="btn btn-default">Back</a>
                     

                    </div>
                  </div>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection