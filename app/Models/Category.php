<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';
    protected $collection = 'categories';
    
    protected $fillable = ['name', 'slug', 'description'];
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', '_id');
    }
}
