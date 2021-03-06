<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\SubscriberDetails;
use App\Models\State;
use App\Models\City;
use App\Models\Location;
use App\Models\User;
use App\Models\Kitchen;
use App\Models\AssignNutritionist;
use Session;
use Sentinel;
use Validator;
use DB;
use Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class DashboardController extends Controller
{


    public function __construct(AssignNutritionist $AssignNutritionist,Location $Location,City $City,State $State,User $User,SubscriberDetails $SubscriberDetails,Kitchen $Kitchen)
    {
        $data                         = [];
        $this->base_model             = $AssignNutritionist; 
        $this->base_users             = $User; 
        $this->base_location          = $Location; 
        $this->base_city              = $City; 
        $this->base_state             = $State; 
        $this->base_kitchen           = $Kitchen; 
        $this->base_subscriber_dtl    = $SubscriberDetails; 
        $this->title                  = "Assign Nutritionist";
        $this->url_slug               = "assign_nutritionist";
        $this->folder_path            = "admin/assign_nutritionist/";
        //Message
        $this->Insert    = Config::get('constants.messages.Insert');
        $this->Update    = Config::get('constants.messages.Update');
        $this->Delete    = Config::get('constants.messages.Delete');
        $this->Error     = Config::get('constants.messages.Error');
        $this->Is_exists = Config::get('constants.messages.Is_exists');
    }

   // Dashboard
   public function dashbord(Request $request)
   {
        return view('admin/dashbord');
   }

   public function get_expiry_subcriber(Request $request)
    {
        // dd(session()->all());
        $login_city_id = Session::get('login_city_id'); 
        $assign_subscriber = Session::get('assign_subscriber'); 
        $user = \Sentinel::check();
        $login_user_details  = Session::get('user');
        $kichen_data_sub = DB::table('nutri_mst_kitchen_users')->where('user_id','=',$login_user_details->id)->select('kitchen_id')->first();
        $columns = array( 
                            0=>'Name',
                            1=> 'Email',
                            2=> 'Mobile',
                            3=> 'Expiry Date',
                            4=> 'Action',
                        );
        $data = \DB::table('nutri_dtl_subscriber')
                        ->join('nutri_mst_subscriber','nutri_dtl_subscriber.subscriber_id','=','nutri_mst_subscriber.id')
                        ->join('city','nutri_dtl_subscriber.city','=','city.id')
                        ->join('state','nutri_dtl_subscriber.state','=','state.id')
                        ->where('nutri_dtl_subscriber.is_deleted','<>',1) 
                        ->where('nutri_dtl_subscriber.expiry_date','>=',date('Y-m-d') ) 
                        ->where('nutri_dtl_subscriber.expiry_date', '<=',date('Y-m-d', strtotime(date('Y-m-d').' +2 day'))); 
            if($login_city_id != "all" && $login_user_details->roles=="admin"){
                $data     =  $data->where('nutri_dtl_subscriber.city','=',$login_city_id)
                                    ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                    ->orderBy('nutri_dtl_subscriber.sub_plan_id', 'DESC')
                                    ->get();         
               // dd("admin_All");           
            }else if($login_user_details->roles=="admin"){
                $data     =  $data->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                              ->orderBy('nutri_dtl_subscriber.sub_plan_id', 'DESC')
                              ->get();     

            }
            if(isset($assign_subscriber) && $login_user_details->roles!="admin"){
                $data     =  $data->whereIn('nutri_dtl_subscriber.id',$assign_subscriber)
                              ->where('nutri_dtl_subscriber.city','=',$login_city_id)
                              ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                              ->orderBy('nutri_dtl_subscriber.sub_plan_id', 'DESC')
                              ->get();   
      
            }else if($login_user_details->roles=="2")
            {
              //dd('test');
                $skitchen_id = $kichen_data_sub->kitchen_id;
                 $data     =  $data
                              ->where('nutri_dtl_subscriber.skitchen_id','=',$skitchen_id)
                              ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                              ->orderBy('nutri_dtl_subscriber.sub_plan_id', 'DESC')
                              ->get();
            }/*else if($login_user_details->roles!="admin")
            {
              //dd('test');
                 $data     =  $data
                              ->where('nutri_dtl_subscriber.city','=',$login_city_id)
                              ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                              ->orderBy('nutri_dtl_subscriber.sub_plan_id', 'DESC')
                              ->get();
            }*/
        //dd($data);
        $totalData = count($data);
          if($totalData > 0){ 
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {   

                $get_tbl_data = \DB::table('nutri_dtl_subscriber')
                                ->join('nutri_mst_subscriber','nutri_dtl_subscriber.subscriber_id','=','nutri_mst_subscriber.id')
                                ->join('city','nutri_dtl_subscriber.city','=','city.id')
                                ->join('state','nutri_dtl_subscriber.state','=','state.id')
                                ->where('nutri_dtl_subscriber.is_deleted','<>',1)
                                ->where('nutri_dtl_subscriber.expiry_date','>=',date('Y-m-d') ) 
                                ->where('nutri_dtl_subscriber.expiry_date', '<=',date('Y-m-d', strtotime(date('Y-m-d').' +2 day'))); 
   



                if($login_city_id != "all" && $login_user_details->roles=="admin"){    
                    $get_tbl_data   = $get_tbl_data->where('nutri_dtl_subscriber.city','=',$login_city_id)
                                       ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                       ->offset($start)
                                       ->limit($limit)
                                       ->orderBy($order,$dir)
                                       ->get(); 
                    //   dd("admin_All");                  
                } else if($login_user_details->roles=="admin"){

                    $get_tbl_data   =  $get_tbl_data->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                      ->offset($start)
                                      ->limit($limit)
                                      ->orderBy($order,$dir)
                                      ->get(); 
                }


                if(isset($assign_subscriber)  && $login_user_details->roles!="admin"){

                   $get_tbl_data    =   $get_tbl_data->whereIn('nutri_dtl_subscriber.id',$assign_subscriber) 
                                        ->where('nutri_dtl_subscriber.city','=',$login_city_id)  
                                        ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                        ->offset($start)
                                        ->limit($limit)
                                        ->orderBy($order,$dir)
                                        ->get();    
                     
                }   
                elseif($login_user_details->roles!="admin")
                {
                     $skitchen_id      = $kichen_data_sub->kitchen_id;
                     $get_tbl_data     =  $get_tbl_data->where('nutri_dtl_subscriber.skitchen_id','=',$skitchen_id) 
                                            ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                            ->offset($start)
                                            ->limit($limit)
                                            ->orderBy($order,$dir)
                                            ->get();    
                }  
                /*elseif($login_user_details->roles!="admin")
                {
                  $get_tbl_data     =  $get_tbl_data->where('nutri_dtl_subscriber.city','=',$login_city_id)  
                                        ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                        ->offset($start)
                                        ->limit($limit)
                                        ->orderBy($order,$dir)
                                        ->get();    
                }*/  

             

        }
        else {
            
               $search = $request->input('search.value'); 
               $get_tbl_data  = \DB::table('nutri_dtl_subscriber')
                ->join('nutri_mst_subscriber','nutri_dtl_subscriber.subscriber_id','=','nutri_mst_subscriber.id')
                ->join('city','nutri_dtl_subscriber.city','=','city.id')
                ->join('state','nutri_dtl_subscriber.state','=','state.id')
                ->where('nutri_dtl_subscriber.is_deleted','<>',1)
                ->where('nutri_dtl_subscriber.expiry_date','>=',date('Y-m-d') ) 
                ->where('nutri_dtl_subscriber.expiry_date', '<=',date('Y-m-d', strtotime(date('Y-m-d').' +2 day'))); 
   

               if($login_city_id != "all" && $login_user_details->roles=="admin"){    
                    $get_tbl_data  = $get_tbl_data->where('nutri_dtl_subscriber.city','=',$login_city_id)
                                    ->orWhere('nutri_dtl_subscriber.subscriber_name', 'LIKE',"%{$search}%")
                                    ->orWhere('nutri_mst_subscriber.email', 'LIKE',"%{$search}%")
                                    ->orWhere('nutri_mst_subscriber.mobile', 'LIKE',"%{$search}%")
                                    ->orWhere('nutri_dtl_subscriber.payment_status', 'LIKE',"%{$search}%")
                                    ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                    ->offset($start)
                                    ->limit($limit)
                                    ->orderBy($order,$dir)
                                    ->get();
                    //   dd("admin_All");                  
                } else if($login_user_details->roles=="admin"){

                    $get_tbl_data  = $get_tbl_data->where('nutri_dtl_subscriber.id','LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.subscriber_name', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.email', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.mobile', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.payment_status', 'LIKE',"%{$search}%")
                                        ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                        ->offset($start)
                                        ->limit($limit)
                                        ->orderBy($order,$dir)
                                        ->get();
                }


               if(isset($assign_subscriber) && $login_user_details->roles!="admin"){

                  $get_tbl_data     =  $get_tbl_data->whereIn('nutri_dtl_subscriber.id',$assign_subscriber)
                                        ->where('nutri_dtl_subscriber.city','=',$login_city_id) 
                                        ->where('nutri_dtl_subscriber.id','LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.subscriber_name', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.email', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.mobile', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.payment_status', 'LIKE',"%{$search}%")
                                        ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                        ->offset($start)
                                        ->limit($limit)
                                        ->orderBy($order,$dir)
                                        ->get();  
                     
                }else if($login_user_details->roles=="2")
                {

                     $skitchen_id      = $kichen_data_sub->kitchen_id;
  
                     $get_tbl_data     =  $get_tbl_data->where('nutri_dtl_subscriber.skitchen_id','=',$skitchen_id) 
                                        ->where('nutri_dtl_subscriber.id','LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.subscriber_name', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.email', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.mobile', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.payment_status', 'LIKE',"%{$search}%")
                                        ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                        ->offset($start)
                                        ->limit($limit)
                                        ->orderBy($order,$dir)
                                        ->get();  
                }/*else if($login_user_details->roles!="admin")
                {
                  
                     $get_tbl_data     =  $get_tbl_data->where('nutri_dtl_subscriber.city','=',$login_city_id) 
                                        ->where('nutri_dtl_subscriber.id','LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.subscriber_name', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.email', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_mst_subscriber.mobile', 'LIKE',"%{$search}%")
                                        ->orWhere('nutri_dtl_subscriber.payment_status', 'LIKE',"%{$search}%")
                                        ->select('nutri_dtl_subscriber.*','city.city_name','state.name as state_name','nutri_mst_subscriber.email','nutri_mst_subscriber.mobile')
                                        ->offset($start)
                                        ->limit($limit)
                                        ->orderBy($order,$dir)
                                        ->get();  
                }*/    

                

            /*$totalFiltered = value::where('id','LIKE',"%{$search}%")
                             ->orWhere('title', 'LIKE',"%{$search}%")
                             ->count();*/
        }

        $data = array();
        if(!empty($get_tbl_data))
        {
            $cnt = 1;
            foreach ($get_tbl_data as $key => $value)
            {
                $nestedData['name']         = $value->subscriber_name;
                /*$nestedData['email']        = $value->email;*/
                $nestedData['mobile']       = $value->mobile;
                $current_date               = date('Y-m-d');
                $expire_date                =  date('Y-m-d',strtotime($value->expiry_date));
                $nestedData['expire_date']  = date('d-m-Y',strtotime($value->expiry_date));
                $nestedData['action']        = "<button type='button' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modal-details' onclick='viewsubDetails(".$value->id.")' title='subscriber details'><i class='fa fa-info-circle'></i> subscriber details</button>";
                $data[] = $nestedData;
                $cnt++;

            }
        }


        //  dd($data);
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
        }
        else{
           $json_data = array(
                    "draw"            => 0,  
                    "recordsTotal"    => 0,  
                    "recordsFiltered" => 0, 
                    "data"            => 0   
                    );   
        }    
        echo json_encode($json_data); 
        
    }


    public function get_subscriber_chart_kichenwise(Request $request)
    {
            $kitchen_id = $request->kitchen_id; 
          //  dd($kitchen_id); 
            $sub_array  = [];   
            $exp_array  = [];   
            $month      = array(1,2,3,4,5,6,7,8,9,10,11,12);
            foreach ($month as $mvalue) {
               
               if($kitchen_id!=0)
               {
                $start_month  = \DB::table('nutri_dtl_subscriber')->where('skitchen_id','=',$kitchen_id)->whereMonth('start_date','=',$mvalue)->where('expiry_date','>=',date('Y-m-d'))->count();
                    $sub_array[]  =  $start_month;
                    $expiry_month = \DB::table('nutri_dtl_subscriber')->where('skitchen_id','=',$kitchen_id)->whereMonth('expiry_date','=',$mvalue)->where('expiry_date','<=',date('Y-m-d'))->count();
                    /*$start_month  = \DB::table('nutri_dtl_subscriber')->where('city','=',$city)->whereMonth('start_date','=',$mvalue)->count();
                    $sub_array[]  =  $start_month;
                    $expiry_month = \DB::table('nutri_dtl_subscriber')->where('city','=',$city)->whereMonth('expiry_date','=',$mvalue)->count();*/
                    $exp_array[]  =  $expiry_month;
               }else
               {
                  /*$start_month  = \DB::table('nutri_dtl_subscriber')->whereMonth('start_date','=',$mvalue)->count();
                  $sub_array[]  =  $start_month;
                  $expiry_month = \DB::table('nutri_dtl_subscriber')->whereMonth('expiry_date','=',$mvalue)->count();*/
                  $start_month  = \DB::table('nutri_dtl_subscriber')->whereMonth('start_date','=',$mvalue)->where('expiry_date','>=',date('Y-m-d'))->count();
                    $sub_array[]  =  $start_month;
                    $expiry_month = \DB::table('nutri_dtl_subscriber')->whereMonth('expiry_date','=',$mvalue)->where('expiry_date','<=',date('Y-m-d'))->count();
                  $exp_array[]  =  $expiry_month;
               }
              
            }

            //$data[0]      = json_encode('sub_array':$sub_array);
            //$data[1]      = json_encode('exp_array':$exp_array);
            $data = array(
              'data' => array(
                'quantity' => $sub_array,
                'quantity2' => $exp_array
              )
            );
           
           return json_encode($data);
          

    }

   public function kitchen_target_progressbar(Request $request)
   {
       $month                 = $request->month;
       $kitchen_target_list   = \DB::table('nutri_trn_kitchen_target')
                            ->join('nutri_mst_kitchen','nutri_trn_kitchen_target.kitchen_id','=','nutri_mst_kitchen.kitchen_id')
                            ->select('nutri_mst_kitchen.kitchen_name','nutri_trn_kitchen_target.target_amt','nutri_trn_kitchen_target.achive_amt','nutri_mst_kitchen.process_color')
                            ->where('nutri_trn_kitchen_target.month','=', $month)
                            ->where('nutri_trn_kitchen_target.is_deleted','<>',1)
                            ->get(); 
        $cnt = count($kitchen_target_list);   
          
        if($cnt > 0){                 
            $html = "";                    
            foreach($kitchen_target_list as $kvalue)
            {
      
                if(!empty($kvalue->achive_amt)){
                  $achive_amt = $kvalue->achive_amt;
                }
                else
                {
                  $achive_amt = 0;
                }

                $html .= '<div class="progress-group">
                            <span class="progress-text">'.ucfirst($kvalue->kitchen_name).'</span>
                            <span class="progress-number"><b>'.$achive_amt.'</b>/'.$kvalue->target_amt.'</span>';
                                $percent = ($kvalue->achive_amt/$kvalue->target_amt)*100;
                $html .='<div class="progress sm">
                            <div class="progress-bar" style="width: '.$percent.'%; background-color:'.$kvalue->process_color.'!important;"></div>
                            </div>
                          </div>';
            }
        }
        else
        {
            $html = "nodata"; 
        }

        return $html;
                            
   }
}
