<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MenuCategoryModel;
use Config;
use Session;
use Sentinel;
use Validator;
use DB;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input;
use Image;
class MenuCategoryController extends Controller
{
    public function __construct(MenuCategoryModel $MenuCategoryModel)
    {
        $data               = [];
        $this->base_model   = $MenuCategoryModel; 
        $this->title        = "Menu Category";
        $this->url_slug     = "menucategory";
        $this->folder_path  = "admin/menu_category/";
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

    // Menu Category Add Function 
    public function add()
    {
        $data['page_name'] = "Add";
        $data['title']     = $this->title;
        $data['url_slug']  = $this->url_slug;
        return view($this->folder_path.'add',$data);
    }

    // Menu Category Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required'
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


        $cat_img              = Input::file('cat_image');
        //random number genrate 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 18; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $arr_data                 = [];
        $arr_data['name']         = $request->input('name');
        $arr_data['cat_image']    = $randomString."".$cat_img->getClientOriginalName();

        $role = $this->base_model->create($arr_data);
        if(!empty($role))
        {

            $destinationPath = 'uploads/category/';
            $destinationPathThumb = $destinationPath . 'thumb/';
            $filename_cat = $cat_img->getClientOriginalName();
            $original_cat = $cat_img->move($destinationPath,$randomString."".$filename_cat);
            
            //thumbnail create menu
            $menu_thumb = Image::make($original_cat->getRealPath())
            ->resize(600,404)
            ->save($destinationPathThumb . $randomString."".$filename_cat);


            Session::flash('success', $this->Insert);
            return \Redirect::to('admin/manage_menucategory');
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

    // Menu category update function
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
        $arr_data               = [];
         $cat_img              = Input::file('cat_image');
        //random number genrate 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 18; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];


        }

       if(isset($_FILES['cat_image']["name"]) && !empty($_FILES['cat_image']["name"]))
        { 
            $arr_data['cat_image']  = $randomString."".$cat_img->getClientOriginalName();
        }
        else
        {
            $arr_data['cat_image']  = $request->input('old_cat_image');
        }

        $arr_data['name']   = $request->input('name');
        $module_update = $this->base_model->where(['id'=>$id])->update($arr_data);

        if (!empty($module_update))
        {   

            $destinationPath = 'uploads/category/';
            $destinationPathThumb = $destinationPath . 'thumb/';

            if(isset($_FILES['cat_image']["name"]) && !empty($_FILES['cat_image']["name"]))
            {
              
                $filename_cat = $cat_img->getClientOriginalName();
                $original_cat = $cat_img->move($destinationPath, $randomString."".$filename_cat);
                    
                //thumbnail create menu
                $menu_thumb = Image::make($original_cat->getRealPath())
                ->resize(600,404)
                ->save($destinationPathThumb . $randomString."".$filename_cat);
                
              //  unlink($destinationPath."".$request->input('old_cat_image'));
              //  unlink($destinationPathThumb."".$request->input('old_cat_image'));

            }

            Session::flash('success',$this->Update );
            return \Redirect::to('admin/manage_menucategory'); 
        }
        else
        {
            Session::flash('error',$this->Error);
            return \Redirect::back();
        }


               
    }

    // Menu category delete function
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
