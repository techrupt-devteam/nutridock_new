
@extends('admin.layout.master')
<?php  
  $session_user = Session::get('user');

  if($session_user->roles!='admin'){
      $session_module = Session::get('module_data');
      $session_permissions = Session::get('permissions');
      $session_parent_menu = Session::get('parent_menu');
      $session_sub_menu = Session::get('sub_menu');
  }


?>
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: auto !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard  <!--  Login-city : <?php echo Session::get('login_city_name'); ?> --> 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="">
       
      </div>
      
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade static" id="modal-details">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="content"> </div>
    </div>
  </div>
</div>

  <!-- /.content-wrapper -->
<style type="text/css">
  .wf{
    color:white !important;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('/')}}/admin_css_js/css_and_js/admin/chart.js/Chart.js"></script>
<script src="{{url('/admin_css_js')}}/css_and_js/admin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  

<script type="text/javascript">
    $("#month").datepicker({ format: "M-yyyy",
    viewMode: "months", 
    minViewMode: "months",
    autoclose: true}).val();



    var canvas = document.getElementById('barChart');
    var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ,"Aug","Sep","Oct","Nov","Dec"],
    datasets: [
        {

            label: "Active Subscriber",
            backgroundColor: "#39e21aa1",
            borderColor: "#1d8c08",
            borderWidth: 2,
            hoverBackgroundColor: "#aa7af8",
            hoverBorderColor: "#8845f5",
            //data: [65, 59, 30, 81, 56, 55, 40,80,100,200,80,30],
            //data:[],
            data: [<?php echo (!empty($data['sub_array']))?implode(',',$data['sub_array']):0?>],
        },
        {
            label: "Expire Subscriber",
            backgroundColor: "rgba(155,50,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            borderWidth: 2,
            hoverBackgroundColor: "#f1957e",
            hoverBorderColor: "#b94629",
            //data:[],
            //data: [25, 39, 10, 65, 45, 35, 20,60,50,60,70,10],
            data: [<?php echo (!empty($data['sub_array']))?implode(',',$data['exp_array']):0 ?>],
        }
    ]
};
var option = {
animation: {
        duration:5000
},
x: {
      gridLines: {
          offsetGridLines: true
      }

  },
scales: {
    yAxes: [{
        ticks: {
                min: 0,
                stepSize:1,
                max:<?php echo  (!empty($data['total_subscriber_count']))?$data['total_subscriber_count']:0?>,
            }
    }]
}
};

var myBarChart = Chart.Bar(canvas,{
  data:data,
  options:option
});

/**************************************************************************/
  function viewDetails(kitchen_id) 
  { 
    var kit_id = kitchen_id;
    //alert(status);
    $.ajax({
      url: "{{url('/admin')}}/kitchen_details",
      type: 'post',
      data: {kitchen_id:kit_id},
      success: function (data) 
      {
        $('#content').html(data);
      }
    });
  }


  function viewsubDetails(subscriber_id) 
  {
  swal("Good job!", "You clicked the button!", "success"); 
     var id  = subscriber_id ;
       //alert(id);
      $.ajax({
          url: "{{url('/admin')}}/subscriber_details",
          type: 'post',
          data: {sid :subscriber_id },
          success: function (data) 
          {
            $('#content').html(data);
          }
      });
  }

  




  /***********************************************************************/
   $(document).ready(function () {
        $('#datatb').DataTable({

            "processing"    : true,
            "serverSide"    : true,
           
            "ajax":{
                     "url": "{{url('/admin')}}/getSubscriberDatadash",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            
            "columns": [
                { data: "name",},
          
                { data: "mobile",},       
                { data: "expire_date",},
                { data: "action",}
            
            ]



        });
    });

//getkichensubscriber();



function getkichensubscriber()
{  
    var kit_id = $('#kitchen_id').val();
    $.ajax({
      url: "{{url('/admin')}}/kitchen_chart",
      type: 'post',
      data: {kitchen_id:kit_id},
      success: function (response) 
      {   
         response = JSON.parse(response);
         console.log(response.data.quantity);
          myBarChart.data.datasets[0].data = response.data.quantity; // or you can iterate for multiple datasets
          myBarChart.data.datasets[1].data = response.data.quantity2; // or you can iterate for multiple datasets
          myBarChart.update();

      }
    });
}

getTargetdata();
//target kichen wose 
 function getTargetdata()
 {  
    var month = $('#month').val();
    $.ajax
    ({
       url: "{{url('/admin')}}/kitchen_month_progress",
       type: 'post',
       data: {month:month},
       success: function (response) 
       {  
         if(response == "nodata")
         {
           swal("Not found","The Kitchen target not available for this month!", "warning");
         }else
         {
           $('.ajax_process').html(response);
         }
    

       }
    });
 }

 </script> 
 
@endsection