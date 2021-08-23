<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MenuModel;
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
       $this->MenuModel         = new MenuModel();
       $this->MenuCategoryModel = new MenuCategoryModel();
    }

    public function index()
    {
        

        $category          = $this->MenuCategoryModel->orderby('id','DESC')->where('is_active','=',1)->get()->toArray();
        $menu_array        = [];
        foreach($category as $cat_value)
        {
            $menu_data     = $this->MenuModel->where('menu_category_id','=',$cat_value['id'])->where('is_active','=',1)->get()->toArray(); 
            $menu_array[$cat_value['name']] = $menu_data;
        }
         
        
        $data              = [];  
        $data['title']     = "Home";
        $data['category']  = $category;
        $data['menu_data'] = $menu_array;
        $data['Session_id'] = Session::getId();
        return view('index',$data);
    }

   

    
}
