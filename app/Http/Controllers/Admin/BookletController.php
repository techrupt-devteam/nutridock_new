<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Sentinel;
use Validator;
use DB;
use Config;
class BookletController extends Controller
{
    public function __construct()
    {
        $data               = [];
        $this->title        = "Booklet";
        $this->url_slug     = "booklet";
        $this->folder_path  = "admin/booklet/";
        
        //Message
        $this->Insert       = Config::get('constants.messages.Insert');
        $this->Update       = Config::get('constants.messages.Update');
        $this->Delete       = Config::get('constants.messages.Delete');
        $this->Error        = Config::get('constants.messages.Error');
        $this->Is_exists    = Config::get('constants.messages.Is_exists');
        
    }


 
    public function add()
    {
        $data['page_name'] = "Add";
        $data['title']     = $this->title;
        $data['url_slug']  = $this->url_slug;
        return view($this->folder_path.'add',$data);
    }

  
}
