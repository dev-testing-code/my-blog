<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('category_id', 'title','author', 'image', 'short_desc', 'description');
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
