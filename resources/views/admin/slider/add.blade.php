@extends('admin.layout.master')
 
@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_name." ".$title }}
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}/dashbord"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('/admin')}}/manage_{{$url_slug}}">Manage {{ $title }}</a></li>
        <li class="active">{{ $page_name." ".$title }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->

        <div class="col-md-12">
          <!-- general form elements -->
            @include('admin.layout._status_msg')
              {!! csrf_field() !!}
              
          <div class="box box-primary">
            <div class="box-header with-border">
             <!--  <h3 class="box-title">{{ $page_name." ".$title }}</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ url('/admin')}}/store_{{$url_slug}}" method="post" role="form" data-parsley-validate="parsley" enctype="multipart/form-data">

              <div class="box-body mt-20">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="oldpassword">Banner Name<span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Banner Name" required="true">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="oldpassword">File Upload<span style="color:red;" >*</span></label>
                      <input type="file" class="form-control" id="banner_file" name="banner_file" placeholder="" required="true">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('/admin')}}/manage_{{$url_slug}}"  class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
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