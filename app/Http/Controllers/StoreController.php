<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Arr;
use Session;
use Sentinel;
use Validator;
use DB;
use URL;
use Mail;

class StoreController extends Controller
{
    
    public function __construct()
    {
       $this->base_store         = new Store();
    }

    public function index()
    {
        $store          = $this->base_store
                            ->orderby('name','ASC')
                            ->where('is_active','=',1)
                            ->get();
        $data           = [];  
        $data['title']  = "Home";
        $data['data']   = $store;
        return view('our-store',$data);
    }

   

    
}
