<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
	//use SoftDeletes;
	protected $table 	   = "nutri_mst_slider";
    protected $primaryKey  = "id";
    protected $fillable = [
		"name",
		"image",
		"order_no",
		"is_active"
    ];
}
