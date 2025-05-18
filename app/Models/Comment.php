<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    public $timestamps = true;

    protected $fillable = ['post_id', 'user_id', 'content', 'parent_comment_id'];

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id', 'id');
    }
}
