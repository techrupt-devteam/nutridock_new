<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model 
{
    protected $table = 'nutri_mst_menu';

    protected $fillable = [
                            'menu_title',
                            'menu_price',
                            'kitchen_id',
                            'menu_type',
                            'menu_category_id',
    	                    'menu_description',
    	                    'what_makes_dish_special',
                            'image',
                            'item_id',
                            'specification_id',
                            'multiple_image',
                            'ingredients',
                            'calories',
                            'proteins',
                            'fats',
                            'carbohydrates',
                            'is_active',
                            'show_home'
                        ];
}
	