<?php

namespace App\Traits;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait PostHelper
{
    public function getPostsByCategoryOrRecent($categoryId = null, $limit = 20)
    {
        $query = Post::select('_id', 'title', 'content', 'image', 'slug', 'category_id', 'created_at','likes','comments_count')
            ->orderBy('created_at', 'desc')
            ->limit($limit);

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        return $query->get()->map(function ($item) {
            $item->category_slug = $item->category ? $item->category->slug : null;
            $item->content = Str::words(strip_tags($item->content), 35, '...');
            return $item;
        });
    }

    public function getPostAuth($getAuth) 
    {
        return Post::where('author_id',$getAuth->_id)
            ->orderBy('created_at', 'desc')
            ->limit(9)
            ->get();
    }
}
