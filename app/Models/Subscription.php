<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'subscriptions';
    
    protected $fillable = ['user_id', 'author_id'];
}
