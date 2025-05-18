<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Traits\PostHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DetailController extends Controller
{
    use PostHelper;

    public function index($category, $slug)
    {
        $data = Post::getPost($slug);
        if (!$data) {
            return redirect()->route('home')->with('error', 'Bài viết không tồn tại');
        }
        $getAuth = User::where('id', $data->author_id)->select('name', 'id', 'image_avatar')->first();
        $categoryId = Category::where('slug', $category)->first()->id;
        $data_category_relate = $this->getPostsByCategoryOrRecent($categoryId, 7);
        $post_user_other = $this->getPostAuth($getAuth);
        
        $comments = Comment::where('post_id', $data->id)->orderBy('created_at', 'asc')->get();
        $userIds = $comments->pluck('user_id')->unique();
        $auth_comments = User::whereIn('id', $userIds)->select('name', 'id', 'image_avatar')->get()->keyBy('id');
       
        return view('detail_product', [
            'data' => $data,
            'category' => $category,
            'slug' => $slug,
            'author' => $getAuth,
            'data_category_relate' => $data_category_relate,
            'post_user_other' => $post_user_other,
            'data_comment' => $comments,
            'data_auth_comment' => $auth_comments,
        ]);
    }

    public function update_like(Request $request, $slug)
    {
        $post = Post::getPost($slug);
        if (!$post) {
            return response()->json(['status' => 'error', 'message' => 'Post not found'], 404);
        }
        Log::info($post);
        if ($request->isMethod('post')) {
            $post->increment('likes');
        } elseif ($request->isMethod('delete')) {
            if ($post->likes > 0) {
                $post->decrement('likes');
            }
        }

        return response()->json(['status' => 'success', 'likes' => $post->likes]);
    }

    public function Post_comment($category, $slug, Request $request)
    {
        $user_id = Auth::user()->id;
        $post = Post::getPost($slug);

        if (!$post) {
            return response()->json(['status' => 'error', 'message' => 'Bài viết không tồn tại'], 404);
        }

        Comment::create([
            'post_id' => $post->id,
            'user_id' => $user_id,
            'content' => $request->content,
            'parent_comment_id' => $request->parent_id,
        ]);

        $post->update(['comments_count' => $post->comments_count + 1]);

        return redirect()->back()->with('success', 'Bình luận đã thêm thành công!');
    }
}
