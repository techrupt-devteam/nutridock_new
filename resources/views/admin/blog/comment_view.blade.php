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
              <h3 class="box-title">Comment View For <strong>{{ $blog_name}}</strong></h3>
               <a href="{{url('/admin')}}/manage_blog"  class="btn btn-danger pull-right">Back</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                    <tr>
                      <th style="width: 5px;">#</th>         
                      <th style="width: 20px;">Name</th>
                      <th style="width: 20px;">Email</th>
                      <th style="width: 20px;">Comment</th>
                      <th style="width: 10px;">Date</th>
                      <th style="width: 15px;">Action</th>
                    </tr>
                  </thead>
                <tbody>
                    @foreach($data as $key => $row)
                    <tr>    
                      <td style="vertical-align: middle;">{{$key+1}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->email}}</td>
                      <td width="50%">{{$row->comment_desc}}</td>
                      <td width="10%">{{$row->created_at}}</td>
                      <td width="10%">
                         @if($row->is_active==1)
                           @php $checked="checked"; $style="success"; @endphp 
                        @else
                           @php $checked=""; $style="danger";@endphp 
                        @endif
                      <input type="checkbox" {{$checked}} data-toggle="toggle" data-onstyle="success" title="status" onchange="change_Status(<?php echo $key+1; ?>,<?php echo $row->id;?>);" data-offstyle="danger" id="{{$key+1}}_is_active" data-size="small" data-style="slow" >
                    </td>
                    </tr>
                    @endforeach
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
        title: "Comment  status",
        text: "Are You sure to change Comment  status",
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
                  url: "{{url('/admin')}}/status_comment",
                  type: 'post',
                  data: {status:status,plan_ids:plan_id},
                  success: function (data) 
                  {
                    swal("Success", "Comment status successfully changed !", "success");
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