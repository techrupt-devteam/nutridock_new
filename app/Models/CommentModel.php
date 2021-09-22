<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model 
{
    protected $table = 'comments';

    protected $fillable = [
                            'name',
                            'email',
    	                    'blog_id',
    	                    'comment_desc',
    	                    'created_at'
                          ];
}
	