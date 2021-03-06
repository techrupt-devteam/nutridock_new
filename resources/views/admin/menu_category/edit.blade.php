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
                <div class="">
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="menu_name">Menu Category Name<span style="color:red;" >*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Menu Category Name" value="{{$data['name']}}" required="true" data-parsley-errors-container="#name_error" data-parsley-error-message="Please enter the category name." autocomplete="off">
                         <div id="name_error" style="color:red;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">  <div class="box-body">
                      <div class="form-group">
                        <label for="name">Menu Category Image<span style="color:red;" >*</span></label>
                         <div class="input-group">
                           <input type="file" class="form-control" id="cat_image" name="cat_image" placeholder="Menu Category Image" >
                            <input type="hidden" name="old_cat_image" value="{{$data['cat_image']}}">
                            <div class="input-group-addon">
                              <a data-fancybox="gallery" href="{{ url('/')}}/uploads/category/{{$data['cat_image']}}"><i class="fa fa-eye"></i></a>
                            </div>
                       </div>
                       <div id="icon_error" style="color:red;"></div>
                      </div>
                  </div>
                  </div>
                </div>
              </div>  
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{url('/admin')}}/manage_{{$url_slug}}"  class="btn btn-default">Back</a>
              </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />
@endsection