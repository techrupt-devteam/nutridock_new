<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\CommentModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Sentinel;
use Session;
//use Cookie;
use DB;
use Validator;

class CommentController extends Controller
{
	function __construct()
	{  	
		$this->arr_view_data                = [];
		$this->module_title                 = "Product";
		$this->module_view_folder           = "admin";
		$this->product_image_base_path      = base_path().'/uploads/images/';
		$this->product_image_public_path 	= url('/').config('app.project.img_path.images');
		$this->CommentModel					= new CommentModel();
	}


    public function index(Request $request)
    {	
    	$user = \Sentinel::check();
        $data['session_user']  = Session::get('user');

        if($data['session_user']){
        $arr_data = [];
        $value     = \DB::table('comments')
                        ->orderBy('id','DESC')
                        ->get();
        if(!empty($value))
        {
            $arr_data = $value->toArray();
        }

        $data['arr_data']      = $arr_data;
        $data['page_name'] = "Comment List";
        return view($this->module_view_folder.'.comment-list',$data);

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
		//$arr_rules['blog_description']      	   	= "required";

		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}
		//$name = $request->input('name', null);

		$arr_data['blog_title']				=	$request->input('blog_title', null);	
		$arr_data['blog_description']		=	$request->input('blog_description', null);	
		$arr_data['sub_title1']		=	$request->input('sub_title1', null);	
		$arr_data['quote_person']		=	$request->input('quote_person', null);	
		$arr_data['quote']		=	$request->input('quote', null);	
		$arr_data['sub_description1']		=	$request->input('sub_description1', null);	
		$arr_data['sub_title2']		=	$request->input('sub_title2', null);	
		$arr_data['sub_description2']		=	$request->input('sub_description2', null);
		$arr_data['sub_image1']		=	'1';
		$arr_data['sub_image2']		=	'2';
		

		//print_r($request->hasFile('image')); die;
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

		if($request->hasFile('sub_image1'))
		{         
			$file_extension = strtolower($request->file('sub_image1')->getClientOriginalExtension());

			if(in_array($file_extension,['png','jpg','jpeg']))
			{
				$file     = $request->file('sub_image1');
				$filename = sha1(uniqid().uniqid()) . '.' . $file->getClientOriginalExtension();
				$path     = $this->product_image_base_path. $filename;
				$isUpload = $file->move($this->product_image_base_path , $filename);
				if($isUpload)
				{
					$arr_data['sub_image1'] = $filename;
				}
			}    
			else
			{
				Session::flash('error', 'Please use jpg,png or jpeg.');
				return redirect()->back();
			}
		}

		if($request->hasFile('sub_image2'))
		{         
			$file_extension = strtolower($request->file('sub_image2')->getClientOriginalExtension());

			if(in_array($file_extension,['png','jpg','jpeg']))
			{
				$file     = $request->file('sub_image2');
				$filename = sha1(uniqid().uniqid()) . '.' . $file->getClientOriginalExtension();
				$path     = $this->product_image_base_path. $filename;
				$isUpload = $file->move($this->product_image_base_path , $filename);
				if($isUpload)
				{
					$arr_data['sub_image2'] = $filename;
				}
			}    
			else
			{
				Session::flash('error', 'Please use jpg,png or jpeg.');
				return redirect()->back();
			}
		}

		//print_r($path); die;
		$status = $this->BlogModel->create($arr_data);
		//print_r($status); die;
		if($status)
		{
			Session::flash('success', 'Record added successfully.');
			return redirect($this->module_view_folder.'/blog_list');
		}

		Session::flash('error', 'Something went wrong.');
		return redirect('/admin/index');
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
	
		$data['arr_data']               	    = $arr_data;
		$data['enc_id']                  	= $enc_id;
		$data['product_image_public_path']   = $this->product_image_public_path;
		$user = \Sentinel::check();
        $data['session_user']  = Session::get('user');
        if($data['session_user']){
			return view($this->module_view_folder.'.edit-blog',$data);
		 }else{
            return view('admin/auth/login');
        }
	}

	public function update(Request $request,$enc_id)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;

		$arr_rules['_token']				= "required";
		$arr_rules['blog_title']      	   		= "required";
		//r_rules['description']      	   	= "required";

		$validator = validator::make($request->all(),$arr_rules);

		if($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$arr_data['blog_title']				=	$request->input('blog_title', null);	
		$arr_data['blog_description']		=	$request->input('blog_description', null);	
		$arr_data['sub_title1']		=	$request->input('sub_title1', null);	
		$arr_data['quote_person']		=	$request->input('quote_person', null);	
		$arr_data['quote']		=	$request->input('quote', null);	
		$arr_data['sub_description1']		=	$request->input('sub_description1', null);	
		$arr_data['sub_title2']		=	$request->input('sub_title2', null);	
		$arr_data['sub_description2']		=	$request->input('sub_description2', null);
		$arr_data['sub_image1']		=	'1';
		$arr_data['sub_image2']		=	'2';


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

		if($request->hasFile('sub_image1'))
		{         
			$file_extension = strtolower($request->file('sub_image1')->getClientOriginalExtension());
			if(in_array($file_extension,['png','jpg','jpeg']))
			{
				$file     = $request->file('sub_image1');
				$filename = sha1(uniqid().uniqid()) . '.' . $file->getClientOriginalExtension();
				$path     = $this->product_image_base_path. $filename;
				$isUpload = $file->move($this->product_image_base_path , $filename);
				if($isUpload)
				{
					$arr_data['sub_image1'] = $filename;
				}
			}    
			else
			{
				Session::flash('error', 'Please use jpg,png or jpeg.');
				return redirect()->back();
			}
		}

		if($request->hasFile('sub_image2'))
		{         
			$file_extension = strtolower($request->file('sub_image2')->getClientOriginalExtension());
			if(in_array($file_extension,['png','jpg','jpeg']))
			{
				$file     = $request->file('sub_image2');
				$filename = sha1(uniqid().uniqid()) . '.' . $file->getClientOriginalExtension();
				$path     = $this->product_image_base_path. $filename;
				$isUpload = $file->move($this->product_image_base_path , $filename);
				if($isUpload)
				{
					$arr_data['sub_image2'] = $filename;
				}
			}    
			else
			{
				Session::flash('error', 'Please use jpg,png or jpeg.');
				return redirect()->back();
			}
		}

		$status = $this->BlogModel->where('id',base64_decode($enc_id))->update($arr_data);

		if($status)
		{
			Session::flash('success', 'Record updated successfully.');
			return redirect($this->module_view_folder.'/blog_list');
		}

		Session::flash('error', 'Something went wrong.');
		return redirect('/admin/index');
	}

	public function delete(Request $request,$enc_id)
	{
		$arr_rules      = $arr_data = array();
		$status         = false;

		$status = $this->BlogModel->where('id',base64_decode($enc_id))->delete();

		if($status)
		{
			Session::flash('success', 'Record deleted successfully.');
				return redirect($this->module_view_folder.'/blog_list');
		}

		Session::flash('error', 'Something went wrong.');
		return redirect('/admin/index');
	}


}