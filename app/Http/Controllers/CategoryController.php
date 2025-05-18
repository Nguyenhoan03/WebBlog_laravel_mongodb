<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Traits\PostHelper;

class CategoryController extends Controller
{
    use PostHelper;
    public function index($category)
    {
        $categoryId = Category::where('slug', $category)->first();
        $data = Post::where('category_id', $categoryId->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['id', 'title', 'image', 'slug', 'category_id', 'created_at','likes','comments_count']);
       
            return view('category', ['post' => $data, 'category' => $category]);   
         }
}
