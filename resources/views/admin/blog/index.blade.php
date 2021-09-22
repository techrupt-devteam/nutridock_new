@extends('admin.layout.master')
 
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @include('admin.layout._status_msg')
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $page_name." ".$title }}</h3>
              <a href="{{url('/admin')}}/add_{{$url_slug}}" class="btn btn-primary btn-sm" style="float: right;">Add Blog</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                    <tr>
                      <th style="width: 5px;">#</th>         
                      <th style="width: 20px;">Title</th>
                      <th style="width: 20px;">Category</th>
             
                      <th style="width: 20px;">Image</th>
                      <th style="width: 10px;">Date</th>
                      <th style="width: 15px;">Action</th>
                    </tr>
                  </thead>
                <tbody>
               <?php  $cnt=0; foreach($arr_data as $key => $row): $cnt++; 
                       $originalDate=$row->created_at; $newDate=date("d-m-Y",strtotime($originalDate));
                     ?>
                    <tr>
                      <td style="vertical-align: middle;">{{$cnt}}</td>
                      <?php $category_id=$row->category_id; $obj_data = \DB::table('categories')->where('id',$category_id)->get();
                        if($obj_data)
                        {
                          $arr_data = $obj_data->toArray();
                        }
                        $cat_data = $arr_data;
                        foreach ($cat_data as $value);
                       ?>
                      <td width="20%">{{$row->blog_title}}</td>
                      <td width="20%"><?php echo $value->name; ?></td>
                
                      <td class="text-center" width="10%">
                        <img src="{{url('')}}/uploads/images/{{$row->image}}" width="40px" class="rounded-circle" />
                      </td>
                       
                      <td width="20%">{{$newDate}}</td>
                      <td  width="20%">
                         @if($row->is_active==1)
                           @php $checked="checked"; $style="success"; @endphp 
                        @else
                           @php $checked=""; $style="danger";@endphp 
                        @endif
                      <input type="checkbox" {{$checked}} data-toggle="toggle" data-onstyle="success" title="status" onchange="change_Status(<?php echo $key+1; ?>,<?php echo $row->id;?>);" data-offstyle="danger" id="{{$key+1}}_is_active" data-size="small" data-style="slow" >

                          <a href="{{url('/admin')}}/comment/{{$row->id}}"  class="btn btn-primary" >
                          <i class="fa fa-eye" data-toggle="tooltip" data-placement="left" title="View Comment"></i></a>

                        <a href="{{url('/admin')}}/edit_{{$url_slug}}/{{ base64_encode($row->id) }}"  class="btn btn-primary" >
                          <i class="fa fa-pencil" data-toggle="tooltip" data-placement="left" title="Edit"></i></a> 
<!-- 
                        <a href="{{url('/')}}/admin/blog/view-benefits/{{ base64_encode($row->id) }}" class="btn btn-sm btn-primary">
                          <i class="far fa-thumbs-up" data-toggle="tooltip" data-placement="left" title="Benefits"></i></a> -->

                        <!-- <a href="{{url('/')}}/admin/blog/view-comments/{{ base64_encode($row->id) }}" class="btn btn-sm btn-info">
                          <i class="far fa-comments" data-toggle="tooltip" data-placement="left" title="Comments"></i></a> -->
                        <a href="{{url('/admin')}}/delete_{{$url_slug}}/{{ base64_encode($row->id) }}" class="btn  btn-default" onclick="return confirm('Are you sure to remove this record ?');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Delete"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  

  <script type="text/javascript">
    function change_Status(id,plan_id) 
    {  
      
      swal({
        title: "Blog  status",
        text: "Are You sure to change Blog  status",
        icon: "warning",
          buttons: [
            'Cancel',
            'Yes, change it!'
          ],
         
        }).then(function(isConfirm) {
          if (isConfirm) 
          { 
            
            var status = $("#"+id+"_is_active").prop('checked');
            var plan_ids = plan_id;
            //alert(status);
             $.ajax({
                  url: "{{url('/admin')}}/status_blog",
                  type: 'post',
                  data: {status:status,plan_ids:plan_id},
                  success: function (data) 
                  {
                    swal("Success", "Blog status successfully changed !", "success");
                  }
              });
                
          } else {
               
            var className = $("#"+id+"_is_active").closest('div').prop('className');
           
            if(className == "toggle btn btn-sm slow btn-danger off"){
               $("#"+id+"_is_active").closest('div').removeClass(className);
               $("#"+id+"_is_active").closest('div').addClass('toggle btn btn-success btn-sm slow');
            }else{
              $("#"+id+"_is_active").closest('div').removeClass(className);
               $("#"+id+"_is_active").closest('div').addClass('toggle btn btn-sm slow btn-danger off');
            }
          }
        });


     }
  </script>
@endsection