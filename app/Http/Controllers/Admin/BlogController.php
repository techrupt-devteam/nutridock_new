<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\BlogModel;
use App\Models\BenefitsModel;
use App\Models\CommentModel;
use App\Models\CommentReplyModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Support\Str;

use Sentinel;
use Session;
//use Cookie;
use DB;
use Validator;
use Config;
class BlogController extends Controller
{
	function __construct()
	{  	
		$this->arr_view_data                = [];
		$this->product_image_base_path      = base_path().'/uploads/images/';
		$this->product_image_public_path 	= url('/').config('app.project.img_path.images');
		$this->BlogModel					= new BlogModel();
		$this->BenefitsModel				= new BenefitsModel();
		$this->CommentModel					= new CommentModel();
		$this->CommentReplyModel 			= new CommentReplyModel();

		$this->title        = "Blog";
        $this->url_slug     = "blog";
        $this->folder_path  = "admin/blog/";
        
        //Message
        $this->Insert       = Config::get('constants.messages.Insert');
        $this->Update       = Config::get('constants.messages.Update');
        $this->Delete       = Config::get('constants.messages.Delete');
        $this->Error        = Config::get('constants.messages.Error');
        $this->Is_exists    = Config::get('constants.messages.Is_exists');
        
	}


    public function index(Request $request)
    {	
    	$user = \Sentinel::check();
        $data['session_user']  = Session::get('user');

        $arr_data = [];
        $value     = \DB::table('blog')
                        ->orderBy('id','DESC')
                        ->get();
        if(!empty($value))
        {
            $arr_data = $value->toArray();
        }
        $data['arr_data']      = $arr_data;

        $cate_data = [];
        $cate_value     = \DB::table('categories')
                       
                        ->orderBy('id','Asc')
                        ->get();
        if(!empty($cate_value))
        {
            $cate_data = $cate_value->toArray();
        }
        $data['cate_data']      = $cate_data;
       // $data['data']      = $cate_data;

        $data['page_name'] = "Manage";
        $data['url_slug']  = $this->url_slug;
        $data['title']     = $this->title;
        return view($this->folder_path.'index',$data);


    }

    public function create()
	{
		$user = \Sentinel::check();
        $data['session_user']  = Session::get('user');
        if($data['session_user']){
        	$arr_data = [];
	        $value     = \DB::table('categories')
	         				->where('is_active','=',1)
	                        ->orderBy('id','ASC')
	                        ->get();
	        if(!empty($value))
	        {
	            $arr_data = $value->toArray();
	        }

	        $data['arr_data']      = $arr_data;
			$data['page_name'] = "Manage";
			$data['url_slug']  = $this->url_slug;
			$data['title']     = $this->title;
		    return view($this->folder_path.'.add',$data);
	    }else{
            return view('admin/auth/login');
        }
	}

	public function store(Request $request)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;
		$arr_rules['_token']				= "required";
		$arr_rules['blog_title']      	   		= "required";
		$arr_rules['affiliate_link'] = 'nullable|string';

		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}
		
		$link	=	str_replace(' ', '-',$request->input('link', null));	

		$arr_data['blog_title']				=	$request->input('blog_title');	
		$arr_data['link']				    =	$link;
		$arr_data['category_id']			=	$request->input('category_id');	
		$arr_data['blog_description']		=	$request->input('blog_description');
		
		$arr_data['meta_title']				=	$request->input('meta_title');	
		$arr_data['meta_keywords']			=	$request->input('meta_keywords');	
		$arr_data['meta_description']		=	$request->input('meta_description');	
		$arr_data['image_title']			=	$request->input('image_title');	
		$arr_data['image_description']		=	$request->input('image_description');	
		
		if($request->hasFile('image'))
		{         
			$file_extension = strtolower($request->file('image')->getClientOriginalExtension());

			if(in_array($file_extension,['png','jpg','jpeg']))
			{
				$file     = $request->file('image');
				$filename = sha1(uniqid().uniqid()) . '.' . $file->getClientOriginalExtension();
				$path     = $this->product_image_base_path. $filename;
				$isUpload = $file->move($this->product_image_base_path , $filename);
				if($isUpload)
				{
					$arr_data['image'] = $filename;
				}
			}    
			else
			{
				Session::flash('error', 'Please use jpg,png or jpeg.');
				return redirect()->back();
			}
		}
		
		$status = $this->BlogModel->create($arr_data);
		if($status)
		{
			Session::flash('success', 'Record added successfully.');
			return redirect('admin/manage_blog');
		}

		Session::flash('error', 'Something went wrong.');
		return redirect('admin/manage_blog');
	}

	public function edit($enc_id='')
	{
	
		$arr_data = [];
		if($enc_id=='')
		{
			return redirect()->back();
		}

		$obj_data = $this->BlogModel->where('id', base64_decode($enc_id))->first();
		
		if($obj_data)
		{
			$arr_data = $obj_data->toArray();
		}

		$data['data']  = $arr_data;
		$data['id']   = $enc_id;
		$data['product_image_public_path']   = $this->product_image_public_path;
		$user = \Sentinel::check();
        $data['session_user']  = Session::get('user');
        if($data['session_user']){
        	$arr_data = [];
	        $value     = \DB::table('categories')
	        				->where('is_active','=','1')
	                        ->orderBy('id','ASC')
	                        ->get();
	        if(!empty($value))
	        {
	            $arr_data = $value->toArray();
	        }

	        $data['cate_data']      = $arr_data;
	        $data['page_name']     = "Edit";
			$data['url_slug']      = $this->url_slug;
			$data['title']         = $this->title;
			return view($this->folder_path.'.edit',$data);
		 }else{
            return view('admin/auth/login');
        }
	}

	public function update(Request $request,$enc_id)
	{
		$arr_rules               = $arr_data = array();
		$status         	     = false;
		$arr_rules['_token']	 = "required";
		$arr_rules['blog_title'] = "required";

		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
		   return redirect()->back()->withErrors($validator)->withInput();
		}
    	$link	=	str_replace(' ', '-',$request->input('link', null));	
		$arr_data['blog_title']				=	$request->input('blog_title');	
		$arr_data['category_id']			=	$request->input('category_id');	
		$arr_data['blog_description']		=	$request->input('blog_description');	
		$arr_data['link']					=	$link;	   		
		$arr_data['meta_title']				=	$request->input('meta_title');	
		$arr_data['meta_keywords']			=	$request->input('meta_keywords');	
		$arr_data['meta_description']		=	$request->input('meta_description');	
		$arr_data['image_title']			=	$request->input('image_title');	
		$arr_data['image_description']		=	$request->input('image_description');	

		if($request->hasFile('image'))
		{         
			$file_extension = strtolower($request->file('image')->getClientOriginalExtension());
			if(in_array($file_extension,['png','jpg','jpeg']))
			{
				$file     = $request->file('image');
				$filename = sha1(uniqid().uniqid()) . '.' . $file->getClientOriginalExtension();
				$path     = $this->product_image_base_path . $filename;
				$isUpload = $file->move($this->product_image_base_path , $filename);
				if($isUpload)
				{
					$arr_data['image'] = $filename;
				}
			}    
			else
			{
				Session::flash('error', 'Please use jpg,png or jpeg.');
				return redirect()->back();
			}
		}

		$status = $this->BlogModel->where('id',$enc_id)->update($arr_data);
		
		Session::flash('success', 'Record updated successfully.');
       return redirect('admin/manage_blog');
			
	}

	public function delete(Request $request,$enc_id)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;

		$status = $this->BlogModel->where('id',base64_decode($enc_id))->delete();
		Session::flash('success', 'Record deleted successfully.');
		return redirect('admin/manage_blog');
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
        $this->BlogModel->where(['id'=>$plan_id])->update($arr_data);
        //return \Redirect::back();
    }
	
	//comment 
	public function comment(Request $request,$id='')
	{
	
		$arr_data = [];
		$blog_data 			   = $this->BlogModel->where('id', $id)->first();
		$comment_data 		   = $this->CommentModel->where('blog_id',$id)->get();
		$data['data']  		   = $comment_data;
		$data['id']   		   = $id;
		$data['page_name']     = "Comment";
		$data['blog_name']     = $blog_data['blog_title'];
		$data['url_slug']      = $this->url_slug;
		$data['title']         = $this->title;
		return view($this->folder_path.'.comment_view',$data);
	
	}

}