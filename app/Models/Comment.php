<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'comments';
    
    protected $fillable = ['post_id', 'user_id', 'content', 'parent_comment_id'];
    
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id', '_id');
    }
    
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id', '_id');
    }
    
 
}
