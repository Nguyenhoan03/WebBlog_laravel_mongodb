<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function home()
    {
        // Cache categories for 1 hour
        $categories = Cache::remember('categories', 3600, function () {
            return Category::select('_id', 'slug')->get();
        });

        $data = [];
        $categorySlugs = [
            'congnghe_laptrinh' => 'cong-nghe-lap-trinh',
            'suckhoe_theduc' => 'suc-khoe-the-duc',
            'dulich' => 'du-lich',
            'taichinh_canhan' => 'tai-chinh-ca-nhan',
            'phattrien_banthan' => 'phat-trien-ban-than',
            'giaoduc_hoctap' => 'giao-duc-va-hoc-tap',
            'doisong_giadinh' => 'doi-song-va-gia-dinh'
        ];

        // Get posts for each category with pagination
        foreach ($categorySlugs as $key => $slug) {
            $category = $categories->where('slug', $slug)->first();
            if ($category) {
                $data[$key] = Cache::remember("posts.{$slug}", 3600, function () use ($category) {
                    return Post::where('category_id', $category->_id)
                        ->select('_id', 'title', 'content', 'image', 'slug', 'category_id')
                        ->limit(12)
                        ->get();
                });
            }
        }

        // Get recent posts with pagination
        $data['recent_posts'] = Cache::remember('recent_posts', 3600, function () {
            return Post::select('_id', 'title', 'content', 'image', 'slug', 'category_id')
                ->orderBy('created_at', 'desc')
                ->limit(6)
                ->get();
        });

        return view('index', compact('data'));
    }
}
