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
            <form action="{{ url('/admin')}}/store_{{$url_slug}}" method="post" role="form" data-parsley-validate="parsley" enctype="multipart/form-data">
              @include('admin.layout._status_msg')
              {!! csrf_field() !!}
              <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="name">Booklet Code<span style="color:red;" >*</span></label>
                        <input type="text" autocomplete="off" class="form-control" id="booklet_code" name="booklet_code" placeholder="Enter Booklet Code" required="true" data-parsley-errors-container="#booklet_code_error" data-parsley-error-message="Please enter booklet code.">
                         <div id="#booklet_code_error" style="color:red;"></div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="name">Voucher Prefix<span style="color:red;" >*</span></label>
                        <input type="text" autocomplete="off" class="form-control" id="voucher_prifix" name="voucher_prifix" placeholder="Enter Voucher Prefix" required="true" data-parsley-errors-container="#voucher_prefix" data-parsley-error-message="Please enter voucher prefix.">
                         <div id="#voucher_prefix" style="color:red;"></div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="name">No of Voucher<span style="color:red;" >*</span></label>
                        <input type="text" autocomplete="off" class="form-control" id="no_of_vouchers" name="no_of_vouchers" placeholder="Enter No Voucher" required="true" data-parsley-errors-container="#no_of_vouchers_error" data-parsley-error-message="Please no of vouchers." onchange="addVoucherRow();">
                         <div id="#no_of_vouchers_error" style="color:red;"></div>
                      </div>
                    </div>
                </div>
                <div class="col-md-12" style="padding:20px !important;">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                         <th>Voucher code</th>
                         <th>Discount Type</th>
                         <th width="10%">Discount Value</th>
                         <th width="20%">CAP (<small style="font-size: 10px;">Amount range</small>)<br/> <small style="font-size: 10px;">Optional</small></th>
                         <th width="20%">Date <br/><small style="font-size: 10px;"> Optional</small></th>
                      </tr>
                    </thead>
                    <tbody id="voucher_body">
                    
                    </tbody>
                  </table>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
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

<script src="{{url('/admin_css_js')}}/css_and_js/admin/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
function addVoucherRow()
  {
     $('.row_duration').remove('');
      var voucher_prefix = $('#voucher_prifix').val();
      var voucher_count  = $('#no_of_vouchers').val();
      for ( var i = 1, l = voucher_count; i <= l; i++ )
      {
        $('#voucher_body').append('<tr class="row_duration"><td><input type="textbox" class="form-control"  id="voucher_name'+i+'" name="voucher_name'+i+'" value="'+voucher_prefix+'#'+makeid(3)+'" style="font-weight:900;"><span id="img_msg1" style="color:red;"></span></td><td><select class="form-control" onchange="iconch('+i+')"  id="discount_type'+i+'" name="discount_type'+i+'"><option value="Percentage">Percentage</option><option value="Amount">Amount</option></select><span id="img_msg1" style="color:red;"></span></td><td><input type="textbox" class="form-control"  id="discount'+i+'" name="discount'+i+'" ><span id="perce'+i+'" style="color:red;"></span></td><td><input type="textbox" class="form-control" style=" width: 49% !important;float: left !important;"  id="min'+i+'" placeholder="Min" name="min'+i+'" ><span id="img_msg1" style="color:red;"></span><input type="textbox" class="form-control righttext"  id="max'+i+'"  placeholder="Max" name="max'+i+'" style=" width: 49% !important;float: left !important;margin-left:2% !important"><span id="img_msg1" style="color:red;"></span></td><td><input type="textbox" class="form-control" style=" width: 49% !important;float: left !important;"  placeholder="Start Date" id="start_date'+i+'" name="start_date'+i+'" ><span id="img_msg1" style="color:red;"></span><input type="textbox" class="form-control"  placeholder="Expiry Date" style=" width: 49% !important;float: left !important;margin-left:2% !important"  id="end_date'+i+'" name="end_date'+i+'" ><span id="img_msg1" style="color:red;"></span></td></tr>');
      }
  }

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;
}

function iconch(num)
{ 
  var dis_value = $('#discount_type'+num).val();
  if(dis_value=="Percentage")
  {
    $('#perce'+i).html('%');
  }else
  {
    $('#perce'+i).html('');
  }

}

</script>

