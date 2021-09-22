<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\Slider;
use App\Models\Offer;
use App\Models\MenuCategoryModel;
use Illuminate\Support\Arr;
use Session;
use Sentinel;
use Validator;
use DB;
use URL;
use Mail;

class HomeController extends Controller
{
    
    public function __construct()
    {
       $this->Coupan            = new Offer();
       $this->Slider            = new Slider();
       $this->MenuModel         = new MenuModel();
       $this->MenuCategoryModel = new MenuCategoryModel();
    }

    public function index()
    {
        $category = $this->MenuCategoryModel->orderby('id','ASC')->where('is_active','=',1)->get();
        $slider   = $this->Slider->orderby('order_no','ASC')->where('is_active','=',1)->get()->toArray(); 
        $coupan   = $this->Coupan->orderby('order_no','ASC')->where('is_active','=',1)->get()->toArray();
        $menu     = $this->MenuModel->orderby('id','ASC')->where('is_active','=',1)->get()->toArray();

        
        $data              = [];  
        $data['title']     = "Home";
        $data['category']  = $category;
        $data['menu_data'] = $menu;
        $data['slider']    = $slider;
        $data['coupan']    = $coupan;
        return view('index',$data);
    }

   

    
}
