<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Config;
use Session;
use Sentinel;
use Validator;
use DB;
class StoreController extends Controller
{
    public function __construct(Store $Store)
    {
        $data               = [];
        $this->base_model   = $Store; 
        $this->title        = "Store";
        $this->url_slug     = "store";
        $this->folder_path  = "admin/store/";
        //Message
        $this->Insert = Config::get('constants.messages.Insert');
        $this->Update = Config::get('constants.messages.Update');
        $this->Delete = Config::get('constants.messages.Delete');
        $this->Error = Config::get('constants.messages.Error');
        $this->Is_exists = Config::get('constants.messages.Is_exists');
    }

    //Menu Listing Function
    public function index()
    {
        $arr_data = [];
        $data     = $this->base_model->orderby('id','DESC')->get();
        if(!empty($data))
        {
            $arr_data = $data->toArray();
        }
        $data['data']      = $arr_data;
        $data['page_name'] = "Manage";
        $data['url_slug']  = $this->url_slug;
        $data['title']     = $this->title;
        return view($this->folder_path.'index',$data);
    }

    // Store Add Function 
    public function add()
    {
        $data['page_name'] = "Add";
        $data['title']     = $this->title;
        $data['url_slug']  = $this->url_slug;
        return view($this->folder_path.'add',$data);
    }

    // Store Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
        if ($validator->fails()) 
        {
            return $validator->errors()->all();
        }
        $is_exist = $this->base_model->where(['name'=>$request->input('name')])->count();
        if($is_exist)
        {
            Session::flash('error', $this->Is_exists);
            return \Redirect::back();
        }
        $arr_data             = [];
        $arr_data['name']     = $request->input('name');
        $arr_data['email1']   = $request->input('email1');
        $arr_data['email2']   = $request->input('email2');
        $arr_data['phone1']   = $request->input('phone1');
        $arr_data['phone2']   = $request->input('phone2');
        $arr_data['address']  = $request->input('address');
        $arr_data['navigate_link']  = $request->input('navigate_link');
        $arr_data['order_link']     = $request->input('order_link');
        
        $store = $this->base_model->create($arr_data);
        if(!empty($store))
        {
            Session::flash('success', $this->Insert);
            return \Redirect::to('admin/manage_store');
        }
        else
        {
            Session::flash('error', $this->Error);
            return \Redirect::back();
        }
    }

    // Menu Edit Function
    public function edit($id)
    {
        $id= base64_decode($id);
        $arr_data = [];
        $data     = $this->base_model->where(['id'=>$id])->first();
        if(!empty($data))
        {
            $arr_data = $data->toArray();
        }   
        $data['data']      = $arr_data;
        $data['page_name'] = "Edit";
        $data['url_slug']  = $this->url_slug;
        $data['title']     = $this->title;
        return view($this->folder_path.'edit',$data);
    }

    // Store update function
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
        if ($validator->fails()) 
        {
            return $validator->errors()->all();
        }
        $is_exist = $this->base_model->where('id','<>',$id)->where(['name'=>$request->input('name')])
                    ->count();
        if($is_exist)
        {
            Session::flash('error', $this->Is_exists);
            return \Redirect::back();
        }
        $arr_data             = [];
        $arr_data['name']     = $request->input('name');
        $arr_data['email1']   = $request->input('email1');
        $arr_data['email2']   = $request->input('email2');
        $arr_data['phone1']   = $request->input('phone1');
        $arr_data['phone2']   = $request->input('phone2');
        $arr_data['address']  = $request->input('address');
        $arr_data['navigate_link']  = $request->input('navigate_link');
        $arr_data['order_link']     = $request->input('order_link');
    
        $module_update = $this->base_model->where(['id'=>$id])->update($arr_data);
        Session::flash('success',$this->Update );
        return \Redirect::to('admin/manage_store');        
    }

    // Store delete function
    public function delete($id)
    {
        $id= base64_decode($id);
        $this->base_model->where(['id'=>$id])->delete();
        Session::flash('success',$this->Delete);
        return \Redirect::back();
    }
    
    public function status(Request $request)
    {

        $status  = $request->status;
        $plan_id = $request->plan_ids;
        $arr_data               = [];
        if($status=="true")
        {
         $arr_data['is_active'] = '1';
        }
        if($status=="false")
        {
         $arr_data['is_active'] = '0';
        }   
        $this->base_model->where(['id'=>$plan_id])->update($arr_data);
        //return \Redirect::back();
    }
}
