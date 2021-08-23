<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
class Cart extends Model
{
    protected $table 	   = "nutri_trn_ordertemp";
    protected $primaryKey  = "tempsrno";
    protected $fillable = [
    	"sessionid",
    	"usersrno",
        "menu_id",
        "rate",
        "qty",
        "offercode",
        "updated_at",
        "created_at",
	];

}
