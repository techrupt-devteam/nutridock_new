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
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"> {{ $page_name." ".$title }}
                {{-- <small>Preview</small> --}}</h3>
                <ol class="breadcrumb">
                  <li><a href="{{url('/admin')}}/dashbord"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="{{url('/admin')}}/manage_category">Manage {{ $title }}</a></li>
                  <li class="active">{{ $page_name." ".$title }}</li>
                </ol>

            </div>
            <!-- /.box-header -->
            <!-- form start --> 
            <div class="box-body">
              <form action="{{ url('/admin')}}/update_{{$url_slug}}/{{$data['id']}}" method="post" role="form" data-parsley-validate="parsley" enctype="multipart/form-data">
              {!! csrf_field() !!}
              <div class="row">
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name"> Name <span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required="true" data-parsley-errors-container="#name_error" data-parsley-error-message="Please enter name." autocomplete="off" value="{{$data['name']}}">
                         <div id="name_error" style="color:red;" ></div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="name">Designation <span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required="true" data-parsley-errors-container="#1_error" data-parsley-error-message="Please enter designation." autocomplete="off" value="{{$data['designation']}}">
                         <div id="1_error" style="color:red;"></div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="name">Message <span style="color:red;" >*</span></label>
                         <textarea class="form-control" name="message" row=5 required="true" data-parsley-errors-container="#4_error" data-parsley-error-message="Please enter message."> {{$data['message']}} </textarea>
                         <div id="4_error" style="color:red;"></div>
                      </div>
                  </div>
                </div>
              </div>  
              <div class="box-footer">
                  <div class="row">
                    <div class="col-md-12">
                       <button type="submit" class="btn btn-primary">Update</button>
                       <a href="{{url('/admin')}}/manage_{{$url_slug}}"  class="btn btn-default">Back</a>
                    </div>
                  </div>
              </div>
              </div>    
              <!-- /.box-body -->

            </form>
          </div>
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