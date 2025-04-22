<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\PostHelper;
use App\Models\Post;

class HomeController extends Controller
{
    use PostHelper;

    private const CATEGORY_POST_LIMIT = 20;
    private const RECENT_POST_LIMIT = 6;

    public function home()
    {
        $categorySlugs = [
            'congnghe_laptrinh'    => 'cong-nghe-va-lap-trinh',
            'suckhoe_theduc'       => 'suc-khoe-va-the-duc',
            'dulich'               => 'du-lich',
            'taichinh_canhan'      => 'tai-chinh-ca-nhan',
            'phattrien_banthan'    => 'phat-trien-ban-than',
            'giaoduc_hoctap'       => 'giao-duc-va-hoc-tap',
            'doisong_giadinh'      => 'doi-song-va-gia-dinh',
        ];
       
        $data = [];

        foreach ($categorySlugs as $key => $slug) {
            $category = Category::where('slug', $slug)->first();
            $data[$key] = $category ? $this->getPostsByCategoryOrRecent($category->_id, self::CATEGORY_POST_LIMIT) : collect();
        }

        $data['recent_posts'] = $this->getPostsByCategoryOrRecent(null, self::RECENT_POST_LIMIT);
        $data['most_popular'] = Post::select('_id', 'title', 'content', 'image', 'slug', 'category_id', 'created_at','views','likes','comments_count')->orderBy('views', 'desc')->limit(3)->get(); 

        return view('index', compact('data'));
    }
}
