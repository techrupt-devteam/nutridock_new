<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use Config;
use Session;
use Sentinel;
use Validator;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input;
use Image;

class OfferController extends Controller
{
    public function __construct(Offer $Offer)
    {
        $data               = [];
        $this->base_model   = $Offer; 
        $this->title        = "Offer";
        $this->url_slug     = "offer";
        $this->folder_path  = "admin/offer/";

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

        $offer_img              = Input::file('banner_file');
        //random number genrate 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 18; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $arr_data          = [];
        $arr_data['name']  = ucfirst($request->input('name'));
        $arr_data['image'] = $randomString."".$offer_img->getClientOriginalName();

        $offer = $this->base_model->create($arr_data);
        
        if (!empty($offer))
        {
            $destinationPath = 'uploads/offer/';
            $destinationPathThumb = $destinationPath . 'thumb/';
            $filename_offer = $offer_img->getClientOriginalName();
            $original_offer = $offer_img->move($destinationPath,$randomString."".$filename_offer);
            
            //thumbnail create menu
            $menu_thumb = Image::make($original_offer->getRealPath())
            ->resize(600,404)
            ->save($destinationPathThumb . $randomString."".$filename_offer);

            Session::flash('success',$this->Insert);
            return \Redirect::to('admin/manage_offer');
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
        $offer_img              = Input::file('banner_file');
        //random number genrate 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        
        for ($i = 0; $i < 18; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];


        }

       if(isset($_FILES['banner_file']["name"]) && !empty($_FILES['banner_file']["name"]))
        { 
            $arr_data['image']  = $randomString."".$offer_img->getClientOriginalName();
        }
        else
        {
            $arr_data['image']  = $request->input('old_img');
        }


        $offer                  = $this->base_model->where(['id'=>$id])->update($arr_data);

        if (!empty($offer))
        {   

            $destinationPath = 'uploads/offer/';
            $destinationPathThumb = $destinationPath . 'thumb/';

        if(isset($_FILES['banner_file']["name"]) && !empty($_FILES['banner_file']["name"]))
        {
          
            $filename_offer = $offer_img->getClientOriginalName();
            $original_offer = $offer_img->move($destinationPath, $randomString."".$filename_offer);
                
            //thumbnail create menu
            $menu_thumb = Image::make($original_offer->getRealPath())
            ->resize(600,404)
            ->save($destinationPathThumb . $randomString."".$filename_offer);
            
            unlink($destinationPath."".$request->input('old_img'));
           // unlink($destinationPathThumb."".$request->input('old_img'));

        }

            Session::flash('success',$this->Update);
            return \Redirect::to('admin/manage_offer');
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
        
        $offer = $this->base_model->where(['id'=>$id])->update($arr_data);
        
        if (!empty($offer))
        {
            Session::flash('success',$this->Update);
            return \Redirect::to('admin/manage_offer');
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
        unlink('uploads/offer/'.$data->image);

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
