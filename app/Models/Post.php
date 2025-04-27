<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'posts';
    
    protected $fillable = ['author_id', 'title','image', 'slug', 'content', 'tags', 'status', 'views', 'likes', 'comments_count','category_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','_id');
    }

    public static function getPost($slug){
        return self::where('slug', $slug)->first();
    }
    
}
