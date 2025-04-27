<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\PostHelper;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

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
        $data['most_popular'] = Post::select('_id', 'title', 'content', 'image', 'slug', 'category_id', 'created_at', 'views', 'likes', 'comments_count')
            ->orderBy('views', 'desc')
            ->limit(3)
            ->get();


        $data['recommendations'] = Cache::remember('recommendations', 60, function () {
            $recommendations = Post::raw(function ($collection) {
                return $collection->aggregate([
                    [
                        '$group' => [
                            '_id' => '$author_id',
                            'total_posts' => ['$sum' => 1],
                        ]
                    ],
                    [
                        '$sort' => ['total_posts' => -1]
                    ],
                    [
                        '$limit' => 5
                    ]
                ]);
            });

            $recommendations = collect(iterator_to_array($recommendations));

            $recommendations = $recommendations->map(function ($recommendation) {
                $user = User::where('_id', $recommendation['_id'])
                    ->select('name', 'email', 'image_avatar')
                    ->first();

                if ($user) {
                    $recommendation->user = $user;
                }

                return $recommendation;
            });

            return $recommendations;
        });

        return view('index', compact('data'));
    }
}
