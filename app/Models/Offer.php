<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
	//use SoftDeletes;
	protected $table 	   = "nutri_mst_offer";
    protected $primaryKey  = "id";
    protected $fillable = [
		"name",
		"image",
		"order_no",
		"is_active"
    ];
}
