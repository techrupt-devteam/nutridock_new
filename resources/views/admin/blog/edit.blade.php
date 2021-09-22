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
        <li><a href="{{url('/admin')}}/manage_category">Manage {{ $title }}</a></li>
        <li class="active">{{ $page_name." ".$title }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $page_name." ".$title }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ url('/admin')}}/update_{{$url_slug}}/{{$data['id']}}" method="post" role="form" data-parsley-validate="parsley" enctype="multipart/form-data">
              @include('admin.layout._status_msg')
              {!! csrf_field() !!}
              
              <div class="box-body">
               
                <div class="row">
                   
                            <div class="col-lg-4 col-md-4 ">
                                <div class="form-group">
                                <label class="label-control">Category <span style="color:red;">*</span></label>
                                <select class="form-control" name="category_id" required="required">
                                    <option value="">Select Category</option>
                                     @foreach($cate_data as $row)
                                    <option @if($row->id == $data['category_id']) selected="selected" @endif value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                <label class="label-control">Title <span style="color:red;">*</span></label>
                                <input type="text" value="{{$data['blog_title'] ?? ''}}" class="form-control" name="blog_title" placeholder="Title" required="required">
                              </div>
                            </div>
                           
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                <label class="label-control">Link <span style="color:red;">*</span> <small style="color: red;">(Note - Special characters are not allowed !)</small></label>
                                <input type="text" value="{{$data['link'] ?? ''}}" class="form-control" name="link" placeholder="Link" required="required" id="txtName">
                                <div id="err_specialcharacter" style="color: red;"></div>
                                @if(Session::has('err_duplicate'))
                                  <div style="color: red;">{{ Session::get('err_duplicate') }}</div>
                                 @endif
                               </div>
                            </div>
                     </div>   
                    <!-- </div> -->

                   
                        <div class="row">
                          <div class="col-lg-8">
                             <div class="row">
                            <div class="col-lg-6"> 
                              <div class="form-group">
                                <label class="label-control">Meta Title <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" value="{{$data['meta_title'] ?? ''}}"  required="required">
                               </div>
                             </div>

                            <div class="col-lg-6">
                               <div class="form-group">
                                <label class="label-control">Meta Keywords <span style="color:red;">*</span></label>
                                <input type="text" value="{{$data['meta_keywords'] ?? ''}}" class="form-control" name="meta_keywords" placeholder="Meta Keywords" required="required">
                              </div>
                            </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                <label class="label-control">Meta Description <span style="color:red;">*</span></label>
                                <textarea rows="3" class="form-control w-100" name="meta_description" placeholder="Meta Description" required="required">{{$data['meta_description'] ?? ''}}</textarea>
                              </div>
                           </div>
                           <div class="row">
                            <div class="col-lg-6">
                                <label class="label-control">Image Title <span style="color:red;">*</span></label>
                                <input type="text" value="{{$data['image_title'] ?? ''}}" class="form-control" name="image_title" placeholder="Image Title" required="required">
                            </div>
                            
                             <div class="col-lg-6">
                                <label class="label-control">Image Description <span style="color:red;">*</span></label>
                                <textarea rows="3" class="form-control w-100" name="image_description" placeholder="Image Description" required="required">{{$data['image_description'] ?? ''}}</textarea>
                            </div>
                            </div>
                          </div>
                            <div class="col-lg-4">
                               <div class="form-group">
                              <label class="label-control">Blog Image <span style="color:red;">*</span></label>
                              <div id="image-preview" class="mx-auto" style="background-size:cover;background-image:  url('admin_css_js/css_and_js/admin/dist/img/default-img.jpg'); ">
                    <label for="images" id="image-label">
                      <i class="fa fa-camera" aria-hidden="true"></i>
                    </label>
                    <img id="blah" src="{{ url('/')}}/uploads/images/{{$data['image']}}"/>
                    <input type="file" class="user_image-file" id="images" name="images" placeholder="Select Image"  data-parsley-errors-container="#image_error" accept="image/x-png,image/gif,image/jpeg,image/png" data-parsley-error-message="Please upload image.">
                  </div>
                    <input type="hidden" name="old_img" value="{{$data['image']}}">
                        <div id="image_error" style="color:red;"></div>


                              <!-- <div class="mb-12">
                                  <div id="image-preview" class="mx-auto" >
                                  <label for="menu_image" id="image-label">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                  </label>
                                  <img id="blah" src="{{ url('/')}}/uploads/default-img.jpg"/>
                                  <input type="file" class="user_image-file" id="image" name="image" placeholder="Select  image"data-parsley-errors-container="#image_error" accept="image/x-png,image/gif,image/jpeg,image/png" data-parsley-error-message="Please upload image.">
                                </div>
                                <div id="image_error" style="color:red;"></div>
                              </div> -->
                              <p class="alert-danger alert mt-3" style="font-size: 13px;">
                                <strong>Note</strong>:- Image Size Width:-394px, Height:- 870px
                            </p>
                            </div>
                           <!--  <div class="mb-12">
                                <div class="w-100">
                                  <img id="image_<?php echo $data['id']; ?>" src="{{url('')}}/uploads/images/{{$data['image']}}" alt="" width="100%" height="170px" style="border:1px solid;">
                            <img id="pimage_<?php echo $data['id']; ?>" src="" alt="" style="display:none;" width="100%" height="150px">
                                </div>
                              </div> -->
                          </div>
                        </div>
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="label-control">Description <span style="color:red;">*</span></label>
                            <textarea rows="3" id="blog_description" class="form-control w-100" name="blog_description" placeholder="Description" required="required">{{$data['blog_description'] ?? ''}}</textarea>
                          </div>
                        </div>
                      </div>
                </div>
         
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('/admin')}}/manage_{{$url_slug}}"  class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />


<script>
   CKEDITOR.replace('blog_description');
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#image").change(function() {
   readURL(this);
  });
</script>
@endsection