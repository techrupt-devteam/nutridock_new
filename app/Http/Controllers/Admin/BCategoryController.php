<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\WhyusModel;
use App\Models\CategoryModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Sentinel;
use Session;
//use Cookie;
use DB;
use Validator;

class BCategoryController extends Controller
{
	function __construct()
	{  	
		$this->arr_view_data                = [];
		$this->module_view_folder           = "admin";
		$this->product_image_base_path      = base_path().'/uploads/images/';
		$this->product_image_public_path 	= url('/').config('app.project.img_path.images');
		$this->CategoryModel					= new CategoryModel();
	}


    public function index()
    {	
        $user = \Sentinel::check();
        $data['session_user']  = Session::get('user');

        if($data['session_user']){
        	$arr_data = [];
        $value     = \DB::table('categories')
                        //->where('id',1)
                        ->orderBy('id','DESC')
                        ->get();
        if(!empty($value))
        {
            $arr_data = $value->toArray();
        }

        $data['arr_data']      = $arr_data;

         /*For Modal*/
        $editarr_data = [];
        $value     = \DB::table('categories')
                        ->get();
        if(!empty($value))
        {
            $editarr_data = $value->toArray();
        }
        $data['editarr_data']      = $editarr_data;

        $data['page_name'] = "Category";
         	return view($this->module_view_folder.'.view-category-list',$data)->with('no', 1);

        }else{
           return view('admin/auth/login');
        }
       
    }

 
	public function category_store(Request $request)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;

		$arr_rules['_token']		= "required";
		$arr_rules['name']  = "required";

		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$arr_data['name']	=	$request->input('name', null);	

		$status = $this->CategoryModel->create($arr_data);
		if($status)
		{
			Session::flash('success', 'Record added successfully.');
			return redirect($this->module_view_folder.'/view-category-list');
		}
		Session::flash('error', 'Something went wrong.');
		return redirect('/admin/index');
	}

	
	public function category_update(Request $request,$enc_id)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;

		$arr_rules['_token']				= "required";
		$arr_rules['name']      	   		= "required";

		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$arr_data['name']	=	$request->input('name', null);
		
		$status = $this->CategoryModel->where('id',base64_decode($enc_id))->update($arr_data);

		if($status)
		{
			Session::flash('success', 'Record updated successfully.');
			return redirect($this->module_view_folder.'/view-category-list');
		}

		Session::flash('error', 'Something went wrong.');
		return redirect('/admin/index');
	}

/*	public function category_delete (Request $request,$enc_id)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;
		
		$status = $this->CategoryModel->where('id',base64_decode($enc_id))->delete();

		if($status)
		{
			Session::flash('success', 'Record deleted successfully.');
				return redirect($this->module_view_folder.'/view-specification-list');
		}

		Session::flash('error', 'Something went wrong.');
		return redirect('/admin/index');
	}*/
	
	
	public function category_delete (Request $request,$enc_id)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;
		
		$blog_data = [];
        $blog_value     = \DB::table('blog')->where('category_id',base64_decode($enc_id))->get();
        if(!empty($blog_value))
        {
            $blog_data = $blog_value->toArray();
        }

    	if($blog_data){
    	   Session::flash('success', 'Category can not be delete as it is used in blog.');
			return redirect($this->module_view_folder.'/view-category-list');
    	}else{
    		$status = $this->CategoryModel->where('id',base64_decode($enc_id))->delete();
    		if($status)
			{
				Session::flash('success', 'Record deleted successfully.');
					return redirect($this->module_view_folder.'/view-category-list');
			}
    	}
		Session::flash('error', 'Something went wrong.');
		return redirect('/admin/index');
	}



}