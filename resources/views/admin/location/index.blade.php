@extends('admin.layout.master')
 
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        {{ $page_name." ".$title }}
       {{--  <small>advanced tables</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}/dashbord"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Manage {{ $title }}</a></li>
        {{-- <li class="active">{{ $page_name." ".$title }}</li> --}}
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @include('admin.layout._status_msg')
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                {{ $page_name." ".$title }}
                {{--  <small>advanced tables</small> --}}
              </h3>
              <a href="{{url('/admin')}}/add_location" class="btn btn-primary btn-sm" style="float: right;">Add location</a>
            </div>
            
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th  width="10%">Sr. No.</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Area</th>
                  <th>Pincode</th>
                  <th class="text-center" width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $key=>$value)
                    <tr>
                      <td width="10%">
                        {{$key+1}}
                      </td>
                      <td>
                        {{$value->name}}
                      </td>
                      <td>
                        {{$value->city_name}}
                      </td>
                      <td>
                        {{$value->area}}
                      </td>
                      <td class="text-center">
                        {{!empty($value->pincode)?$value->pincode:"-"}}
                      </td>
                      
                       <td class="text-center" width="30%">
                      <!--   @if($value->is_active=='1')
                           @php $checked="checked"; $style="success"; @endphp 
                        @else
                           @php $checked=""; $style="danger";@endphp 
                        @endif
                        <input type="checkbox" {{$checked}} data-toggle="toggle" data-onstyle="success" title="status" onchange="change_Status(<?php echo $key+1; ?>,<?php echo $value->id; ?>);" data-offstyle="danger" id="{{$key+1}}_is_active" data-size="small" data-style="slow" > -->

                        @if($value->is_active==1)
                           @php $checked="checked"; $style="success"; @endphp 
                        @else
                           @php $checked=""; $style="danger";@endphp 
                        @endif
                        <input type="checkbox" {{$checked}} data-toggle="toggle" data-onstyle="success" title="status" onchange="change_Status(<?php echo $key+1; ?>,<?php echo $value->id; ?>);" data-offstyle="danger" id="{{$key+1}}_is_active" data-size="small" data-style="slow" >
                        <a href="{{url('/admin')}}/edit_{{$url_slug}}/{{$value->id}}" class="btn btn-sm btn-primary" title="Edit">
                          <i class="fa fa-edit"></i>
                        </a>
                       
                       <!--  <a href="{{url('/admin')}}/delete_{{$url_slug}}/{{$value->id}}"  class="btn btn-sm btn-default" title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
                          <i class="fa fa-trash"></i>
                        </a> -->
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
        title: "Location status",
        text: "Are You sure to change location status",
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
                  url: "{{url('/admin')}}/status_location",
                  type: 'post',
                  data: {status:status,plan_ids:plan_id},
                  success: function (data) 
                  {
                    swal("Success", "Location status successfully changed !", "success");
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