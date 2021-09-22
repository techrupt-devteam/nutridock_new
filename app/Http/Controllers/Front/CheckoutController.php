<?php
namespace App\Http\Controllers\Front;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\MenuCategoryModel;
use Illuminate\Support\Arr;
use App\Models\Cart;
use Session;
use Sentinel;
use Validator;
use DB;
use URL;
use Mail;

class CheckoutController extends Controller
{
    
    public function __construct(Cart $Cart)
    {
        
        $this->base_model   = $Cart; 
    }
    
    public function index(Request $request)
    {
        $sessionid   = $request->input('session_id');
        $usersrno    = $request->input('login_id');
        

        if(!empty($usersrno))
        {
            $cart_list   = \DB::table('nutri_trn_ordertemp')
                           ->Join('nutri_mst_menu','nutri_trn_ordertemp.menu_id', '=', 'nutri_mst_menu.id')
                           ->where('usersrno','=',$usersrno)
                           ->select('nutri_mst_menu.menu_title','nutri_mst_menu.menu_description','nutri_mst_menu.image','nutri_trn_ordertemp.*')
                           ->get();       
        }else
        {
            $cart_list   = \DB::table('nutri_trn_ordertemp')
                           ->Join('nutri_mst_menu','nutri_trn_ordertemp.menu_id', '=', 'nutri_mst_menu.id')
                           ->where('sessionid','=',Session::getId())
                           ->select('nutri_mst_menu.menu_title','nutri_mst_menu.menu_description','nutri_mst_menu.menu_price','nutri_mst_menu.image','nutri_trn_ordertemp.*')
                           ->get();
        }
       //dd($cart_list);
        $data = []; 
        $data['cart_list'] = $cart_list;
        return view('checkout',$data);

    }

    /*//product add to cart  functionality 
    public function addtocart(Request $request)
    {  
        
        $is_exist = $this->base_model->where(['menu_id'=>$request->input('menu_id'),'sessionid'=>Session::getId()])->first();
      //  dd($is_exist['qty']);
        if(!empty($is_exist))
        {
            $arr_data['qty']                      = $is_exist['qty'] + 1;
            $menu_update = $this->base_model->where(['menu_id'=>$request->input('menu_id'),'sessionid'=>Session::getId()])->update($arr_data);
              return "success";
        }

        $arr_data                = [];
        $arr_data['sessionid']   = Session::getId();
        $arr_data['usersrno']    = $request->input('login_id');
        $arr_data['menu_id']     = $request->input('menu_id');
        $arr_data['rate']        = $request->input('price');
        $arr_data['qty']         = 1;
        $order_temp              = $this->base_model->create($arr_data);
      
        if(!empty($order_temp))
        {
            return "success";
        }
        else
        {
            return "fail";
        }
    }
    
    //product load to cart list 
    public function loadcart(Request $request)
    {

        $sessionid   = $request->input('session_id');
        $usersrno    = $request->input('login_id');
        

        if(!empty($usersrno))
        {
            $cart_list   = \DB::table('nutri_trn_ordertemp')
                           ->Join('nutri_mst_menu','nutri_trn_ordertemp.menu_id', '=', 'nutri_mst_menu.id')
                           ->where('usersrno','=',$usersrno)
                           ->select('nutri_mst_menu.menu_title','nutri_mst_menu.menu_description','nutri_mst_menu.image','nutri_trn_ordertemp.*')
                           ->get();       
        }else
        {
            $cart_list   = \DB::table('nutri_trn_ordertemp')
                           ->Join('nutri_mst_menu','nutri_trn_ordertemp.menu_id', '=', 'nutri_mst_menu.id')
                           ->where('sessionid','=',Session::getId())
                           ->select('nutri_mst_menu.menu_title','nutri_mst_menu.menu_description','nutri_mst_menu.menu_price','nutri_mst_menu.image','nutri_trn_ordertemp.*')
                           ->get();
        }
       //dd($cart_list);
        $data = []; 
        $data['cart_list'] = $cart_list;
        return view('cart_list',$data);
    }
    
    //delete 
    public function deletcart(Request $request)
    {

        $sessionid   = Session::getId();
        $usersrno    = $request->input('login_id');
        $menu_id     = $request->input('menu_id');
        

        if(!empty($usersrno))
        {
            $cart_delete   =   $this->base_model->where(['usersrno'=>$usersrno,'menu_id'=>$menu_id])->delete();
            return "success";       
        }else
        {
            $cart_delete   =   $this->base_model->where(['sessionid'=>$sessionid,'menu_id'=>$menu_id])->delete();
            return "success";
        }     


    }*/
   

    
}
