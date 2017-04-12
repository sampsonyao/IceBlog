<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function posts(){
    	# code...
    	return $this->hasMany('App\Post');
    }
}
