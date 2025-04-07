<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    private const CATEGORY_POST_LIMIT = 20;
    private const RECENT_POST_LIMIT = 6;

    public function home()
    {
        $categorySlugs = [
            'congnghe_laptrinh'    => 'cong-nghe-lap-trinh',
            'suckhoe_theduc'       => 'suc-khoe-the-duc',
            'dulich'               => 'du-lich',
            'taichinh_canhan'      => 'tai-chinh-ca-nhan',
            'phattrien_banthan'    => 'phat-trien-ban-than',
            'giaoduc_hoctap'       => 'giao-duc-va-hoc-tap',
            'doisong_giadinh'      => 'doi-song-va-gia-dinh',
        ];

        $data = [];

        foreach ($categorySlugs as $key => $slug) {
            $category = Category::where('slug', $slug)->first();

            if ($category) {
                $data[$key] = $this->getPostsByCategoryOrRecent($category->_id, self::CATEGORY_POST_LIMIT);
            } else {
                $data[$key] = collect();
            }
        }

        $data['recent_posts'] = $this->getPostsByCategoryOrRecent(null, self::RECENT_POST_LIMIT);
        return view('index', compact('data'));
    }

    private function getPostsByCategoryOrRecent($categoryId = null, $limit = 20)
    {
        $query = Post::select('_id', 'title', 'content', 'image', 'slug', 'category_id', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit($limit);

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $dataPost = $query->get();

        return $dataPost->map(function ($item) {
            $categorySlug = $item->category ? $item->category->slug : null;
            $item->category_slug = $categorySlug;
            return $item;
        });
    }
}
