<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Traits\PostHelper;
use Illuminate\Http\Request;
class DetailController extends Controller
{
    use PostHelper;

    public function index($category, $slug)
    {
        $data = Post::where('slug', $slug)->first();
        if (!$data) {
            return redirect()->route('home')->with('error', 'Bài viết không tồn tại');
        }

        $getAuth = User::where('_id', $data->author_id)->select('name', '_id', 'image_avatar')->first();
        $categoryId = Category::where('slug', $category)->first()->_id;
        $data_category_relate = $this->getPostsByCategoryOrRecent($categoryId, 7);
        $post_user_other = $this->getPostAuth($getAuth);

        return view('detail_product', [
            'data' => $data,
            'category' => $category,
            'author' => $getAuth,
            'data_category_relate' => $data_category_relate,
            'post_user_other' => $post_user_other,
        ]);
    }
    public function update_like(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            return response()->json(['status' => 'error', 'message' => 'Post not found'], 404);
        }
    
        if ($request->isMethod('post')) {
            $post->increment('likes');
        } elseif ($request->isMethod('delete')) {
            if ($post->likes > 0) {
                $post->decrement('likes');
            }
        }
    
        return response()->json(['status' => 'success', 'likes' => $post->likes]);
    }

    public function comment(){
        
    }
    
}
