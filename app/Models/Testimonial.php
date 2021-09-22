<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model
{
    protected $table = 'nutri_mst_testimonial';
    protected $primaryKey  = "id";
    protected $fillable = ['name','designation','message'];
}

