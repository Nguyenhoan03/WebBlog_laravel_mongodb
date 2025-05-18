<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'author_id',
        'title',
        'image',
        'slug',
        'content',
        'tags',
        'status',
        'views',
        'likes',
        'comments_count',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public static function getPost($slug)
    {
        return self::where('slug', $slug)->first();
    }
}
