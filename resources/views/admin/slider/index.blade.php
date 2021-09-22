@extends('admin.layout.master')
 
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_name." ".$title }}
       {{--  <small>advanced tables</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}/dashbord"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Manage {{ $title }}</a></li>
        {{-- <li class="active">{{ $page_name." ".$title }}</li> --}}
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @include('admin.layout._status_msg')
          <div class="box">
            <div class="box-header">
             <!--  <h3 class="box-title">{{ $page_name." ".$title }}</h3> -->
              <a href="{{url('/admin')}}/add_{{$url_slug}}" class="btn btn-primary btn-sm" style="float: right;">Add {{ $title }}</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Banner Name</th>
                  <th>Order No</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $key=>$value)
                    <tr>
                      <td>
                        {{$key+1}}
                      </td>
                      <td>
                        {{ucfirst($value['name'])}}
                      </td> 
                      <td>
                        <table>
                           <tr>
                              <form data-parsley-validate="parsley"  action="{{ url('/admin')}}/update_order_no/{{$value['id']}}" method="POST">
                                <td>
                                  <input type="text" class="form-control" name="order_no" value="{{$value['order_no']}}">
                                </td>
                                <td>
                                  &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i></button>
                                </td>
                              </form>
                          </tr>
                        </table>
                      </td> 
                      <td>
                       
                        <a class="fancybox btn btn-sm btn-success" rel="group" href="{{url('/')}}/uploads/banner/{{$value['image']}}" title="View"><i class="fa fa-eye"></i></a>
                
                        @if($value['is_active']==1)
                           @php $checked="checked"; $style="success"; @endphp 
                        @else
                           @php $checked=""; $style="danger";@endphp 
                        @endif
                        <input type="checkbox" {{$checked}} data-toggle="toggle" data-onstyle="success" title="status" onchange="change_Status(<?php echo $key+1; ?>,<?php echo $value['id']; ?>);" data-offstyle="danger" id="{{$key+1}}_is_active" data-size="small" data-style="slow" >
                        <div class="btn-group">
                          <a href="{{url('/admin')}}/edit_{{$url_slug}}/{{$value['id']}}"  class="btn btn-primary"  title="Edit">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="{{url('/admin')}}/delete_{{$url_slug}}/{{$value['id']}}"   class="btn btn-default "  title="Delete" onclick="return confirm('Are you sure you want to delete this record?');">
                            <i class="fa fa-trash "></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

  <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  

  <script type="text/javascript">
    function change_Status(id,plan_id) 
    {  
      
      swal({
        title: "Banner status",
        text: "Are You sure to change Banner status",
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
                  url: "{{url('/admin')}}/status_banner",
                  type: 'post',
                  data: {status:status,plan_ids:plan_id},
                  success: function (data) 
                  {
                    swal("Success", "Banner status successfully changed !", "success");
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

  $(".fancybox").fancybox({
  openEffect: "none",
  closeEffect: "none"

});
</script>
@endsection