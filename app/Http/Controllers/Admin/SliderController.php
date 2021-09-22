<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Config;
use Session;
use Sentinel;
use Validator;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input;
use Image;

class SliderController extends Controller
{
    public function __construct(Slider $Slider)
    {
        $data               = [];
        $this->base_model   = $Slider; 
        $this->title        = "Banner";
        $this->url_slug     = "slider";
        $this->folder_path  = "admin/slider/";

        //Message
        $this->Insert        = Config::get('constants.messages.Insert');
        $this->Update        = Config::get('constants.messages.Update');
        $this->Delete        = Config::get('constants.messages.Delete');
        $this->Error         = Config::get('constants.messages.Error');
        $this->Is_exists     = Config::get('constants.messages.Is_exists');
    }

    public function index()
    {
        $arr_data = [];
        $data     = $this->base_model->orderBy('id','DESC')->get();
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
 
    public function add()
    {
        $data['page_name'] = "Add";
        $data['title']     = $this->title;
        $data['url_slug']  = $this->url_slug;
        return view($this->folder_path.'add',$data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name'         => 'required',
                'banner_file'  => 'required'
          ]);

        if($validator->fails()) 
        {
           return $validator->errors()->all();
        }

        $slider_img              = Input::file('banner_file');
        //random number genrate 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 18; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $arr_data          = [];
        $arr_data['name']  = ucfirst($request->input('name'));
        $arr_data['image'] = $randomString."".$slider_img->getClientOriginalName();

        $slider = $this->base_model->create($arr_data);
        
        if (!empty($slider))
        {
            $destinationPath = 'uploads/banner/';
            $destinationPathThumb = $destinationPath . 'thumb/';
            $filename_slider = $slider_img->getClientOriginalName();
            $original_slider = $slider_img->move($destinationPath,$randomString."".$filename_slider);
            
         /*   //thumbnail create menu
            $menu_thumb = Image::make($original_slider->getRealPath())
            ->resize(255, 250)
            ->save($destinationPathThumb . $randomString."".$filename_slider);*/

            Session::flash('success',$this->Insert);
            return \Redirect::to('admin/manage_slider');
        }
        else
        {
            Session::flash('error',$this->Error);
            return \Redirect::back();
        }
    }

    public function edit($id)
    {
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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                'name'           => 'required'
            ]);

        if ($validator->fails()) 
        {
            return $validator->errors()->all();
        }

        $arr_data             = [];
        $arr_data['name']          = ucfirst($request->input('name'));
        $slider_img              = Input::file('banner_file');
        //random number genrate 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 18; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];


        }

       if(isset($_FILES['banner_file']["name"]) && !empty($_FILES['banner_file']["name"]))
        { 
            $arr_data['image']  = $randomString."".$slider_img->getClientOriginalName();
        }
        else
        {
            $arr_data['image']  = $request->input('old_img');
        }


        $slider                  = $this->base_model->where(['id'=>$id])->update($arr_data);

        if (!empty($slider))
        {   

            $destinationPath = 'uploads/banner/';
        $destinationPathThumb = $destinationPath . 'thumb/';

        if(isset($_FILES['banner_file']["name"]) && !empty($_FILES['banner_file']["name"]))
        {
          
            $filename_slider = $slider_img->getClientOriginalName();
            $original_slider = $slider_img->move($destinationPath, $randomString."".$filename_slider);
                
            //thumbnail create menu
            /*$menu_thumb = Image::make($original_Menu->getRealPath())
            ->resize(255, 250)
            ->save($destinationPathThumb . $randomString."".$filename_slider);*/
            
            unlink($destinationPath."".$request->input('old_img'));
           // unlink($destinationPathThumb."".$request->input('old_img'));

        }

            Session::flash('success',$this->Update);
            return \Redirect::to('admin/manage_slider');
        }
        else
        {
            Session::flash('error',$this->Error);
            return \Redirect::back();
        }
    } 


    public function order_no(Request $request, $id)
    {
       
        $arr_data['order_no']      = $request->input('order_no'); 
        
        $slider = $this->base_model->where(['id'=>$id])->update($arr_data);
        
        if (!empty($slider))
        {
            Session::flash('success',$this->Update);
            return \Redirect::to('admin/manage_slider');
        }
        else
        {
            Session::flash('error',$this->Error);
            return \Redirect::back();
        }
    }

    public function delete($id)
    {   
        $data  = $this->base_model->where(['id'=>$id])->first();
        unlink('uploads/banner/'.$data->image);

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
