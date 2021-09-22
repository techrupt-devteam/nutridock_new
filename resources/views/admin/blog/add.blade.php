@extends('admin.layout.master')
@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                   
                            <div class="col-lg-4 col-md-4 ">
                                <div class="form-group">
                                <label class="label-control">Category <span style="color:red;">*</span></label>
                                <select class="form-control" name="category_id" required="required">
                                    <option value="">Select Category</option>
                                    @foreach($arr_data as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                <label class="label-control">Title <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="blog_title" placeholder="Title" required="required">
                              </div>
                            </div>
                           
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                <label class="label-control">Link <span style="color:red;">*</span> <small style="color: red;">(Note - Special characters are not allowed !)</small></label>
                                <input type="text" class="form-control" name="link" placeholder="Link" required="required" id="txtName">
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
                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" required="required">
                               </div>
                             </div>

                            <div class="col-lg-6">
                               <div class="form-group">
                                <label class="label-control">Meta Keywords <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="meta_keywords" placeholder="Meta Keywords" required="required">
                              </div>
                            </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                <label class="label-control">Meta Description <span style="color:red;">*</span></label>
                                <textarea rows="3" class="form-control w-100" name="meta_description" placeholder="Meta Description" required="required"></textarea>
                              </div>
                           </div>
                           <div class="row">
                            <div class="col-lg-6">
                                <label class="label-control">Image Title <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="image_title" placeholder="Image Title" required="required">
                            </div>
                            
                             <div class="col-lg-6">
                                <label class="label-control">Image Description <span style="color:red;">*</span></label>
                                <textarea rows="3" class="form-control w-100" name="image_description" placeholder="Image Description" required="required"></textarea>
                            </div>
                            </div>
                          </div>
                            <div class="col-lg-4">
                               <div class="form-group">
                              <label class="label-control">Blog Image <span style="color:red;">*</span></label>
                              <div class="mb-12">
                                  <div id="image-preview" class="mx-auto" >
                                  <label for="menu_image" id="image-label">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                  </label>
                                  <img id="blah" src="{{ url('/')}}/uploads/default-img.jpg"/>
                                  <input type="file" class="user_image-file" id="image" name="image" placeholder="Select  image" required="true" data-parsley-errors-container="#image_error" accept="image/x-png,image/gif,image/jpeg,image/png" data-parsley-error-message="Please upload image.">
                                </div>
                                <div id="image_error" style="color:red;"></div>
                              </div>
                              <p class="alert-danger alert mt-3" style="font-size: 13px;">
                                <strong>Note</strong>:- Image Size Width:-394px, Height:- 870px
                            </p>
                            </div>
                          </div>
                        </div>
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="label-control">Description <span style="color:red;">*</span></label>
                            <textarea rows="3" id="blog_description1" class="blog_description form-control w-100" name="blog_description" placeholder="Description" required="required"></textarea>
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

<script src="{{url('/admin_css_js')}}/css_and_js/admin/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script type="text/javascript">
   CKEDITOR.replace( 'blog_description1');


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