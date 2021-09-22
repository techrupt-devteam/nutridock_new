<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\BlogModel;
use App\Models\CommentModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Support\Str;
use \Illuminate\Support\Arr;

use Sentinel;
use Session;
//use Cookie;
use DB;
use Validator;

class BlogController extends Controller
{
    function __construct()
    {   
        $this->arr_view_data                = [];
        $this->module_view_folder           = "admin";
        $this->product_image_base_path      = base_path().'/uploads/images/';
        $this->product_image_public_path    = url('/').config('app.project.img_path.images');
        $this->BlogModel                    = new BlogModel();
        $this->CommentModel                 = new CommentModel();
    }


    public function index()
    {
        $arr_data = [];
        $blog_data   = \DB::table('blog')
                    ->leftjoin('categories','blog.category_id','=','categories.id')
                    ->select('categories.name','blog.*')
                    ->orderby('id','ASC')
                    ->get()->toArray();

        /*Category*/
     //select count(`blog`.`category_id`)as cnt, `categories`.`name` from `categories`  right join `blog` on `blog`.`category_id` = `categories`.`id` GROUP BY `categories`.`id`
        $cate_data     =  \DB::table('categories')
                            ->rightjoin('blog','blog.category_id','=','categories.id')
                            ->select('categories.name',DB::raw('COUNT(blog.category_id)as cnt'))
                            ->groupby('categories.id')
                            ->get()->toArray();
    // dd($cate_data);
        /*Recent Data*/

        $recent_data     = \DB::table('blog')
                            ->orderby('id','DESC')
                            ->limit(3)
                            ->get()->toArray();
      
        $data['blog_data']   = $blog_data;
        $data['recent_data'] = $recent_data;
        $data['categories']  = $cate_data;
        return view('blog',$data);
    }

    public function blog_detail(Request $request,$str)
    {
      
        $data['seo_title'] = "Blog Detail";
        //$id = base64_decode($enc_id);
        
        $str = $request->str;
        
       //$string = preg_replace('/[^\p{L}\s0-9]/u',' ',$str);
        
        $arr_data = [];
        $blog_data   = \DB::table('blog')
                    ->join('categories','blog.category_id','=','categories.id')
                    ->where('link','=',$str)
                    ->select('categories.name','blog.*')
                    ->orderby('id','ASC')
                    ->get()->toArray();

        $data['blog_details']      = $blog_data[0];

        /*Category*/     
          $cate_data     =  \DB::table('categories')
                            ->rightjoin('blog','blog.category_id','=','categories.id')
                            ->select('categories.name',DB::raw('COUNT(blog.category_id)as cnt'))
                            ->groupby('categories.id')
                            ->get()->toArray();
     
        /*Recent Data*/
        $recent_data        = \DB::table('blog')
                              ->where('is_active','=',1)
                              ->orderby('id','DESC')
                              ->limit(3)
                              ->get()->toArray();  

        $related_blog_data  = \DB::table('blog')
                              ->where('category_id','=',$blog_data[0]->category_id)
                              ->where('id','!=',$blog_data[0]->id)
                              ->orderby('id','DESC')
                              ->limit(2)
                              ->get()->toArray(); 
        $comments  = \DB::table('comments')
                             ->where('blog_id','=',$blog_data[0]->id)
                              ->orderby('id','DESC')
                              ->get()->toArray();
      
        $data['comments']      = $comments;
        $data['recent_data']   = $recent_data;
        $data['categories']    = $cate_data;
        $data['related_blog']  = $related_blog_data;
        return view('blog_detail', $data);
    }

    public function store_comment(Request $request)
    {
        $valstory_idator = Validator::make($request->all(), [
                'name'    => 'required',
                'email'   => 'required',
                'comment_desc' => 'required'
            ]);
        if ($valstory_idator->fails()) 
        {
            return $valstory_idator->errors()->all();
        }
    
        $arr_data                 = [];
        $arr_data['name']         = $request->input('name');
        $arr_data['email']        = $request->input('email');
        $arr_data['blog_id']      = $request->input('blog_id');
        $arr_data['comment_desc'] = $request->input('comment_desc');
        $comment = $this->CommentModel->create($arr_data);
        if(!empty($comment))
        {
           return "success";
        }
        else
        {
            return "fail";
        }
    }

    public function blog_catwise(Request $request)
    {
        $arr_data = [];
        $blog_data   = \DB::table('blog')
                    ->leftjoin('categories','blog.category_id','=','categories.id')
                    ->where('categories.name','=',$request->str)
                    ->select('categories.name','blog.*')
                    ->orderby('id','ASC')
                    ->get()->toArray();

        /*Category*/
     //select count(`blog`.`category_id`)as cnt, `categories`.`name` from `categories`  right join `blog` on `blog`.`category_id` = `categories`.`id` GROUP BY `categories`.`id`
        $cate_data     =  \DB::table('categories')
                            ->rightjoin('blog','blog.category_id','=','categories.id')
                            ->select('categories.name',DB::raw('COUNT(blog.category_id)as cnt'))
                            ->groupby('categories.id')
                            ->get()->toArray();
    // dd($cate_data);
        /*Recent Data*/

        $recent_data     = \DB::table('blog')
                            ->orderby('id','DESC')
                            ->limit(3)
                            ->get()->toArray();
      
        $data['blog_data']   = $blog_data;
        $data['recent_data'] = $recent_data;
        $data['categories']  = $cate_data;
        return view('blog',$data);
    }
}
