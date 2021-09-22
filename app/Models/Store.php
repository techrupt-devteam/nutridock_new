<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Store extends Model 
{
    protected $table = 'nutri_mst_store';
    protected $primaryKey  = "id";
    protected $fillable = ['name','email1','email2','phone1','phone2','address','is_active','order_link','navigate_link'];
}

