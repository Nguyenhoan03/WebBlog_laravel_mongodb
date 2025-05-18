<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class PostController extends Controller
{
    public function create()
    {
        $data_category = Category::all();

        return view('UserPost', compact('data_category'));
    }

    public function store(Request $request, $status)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('upload/images'), $imageName);
        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = Auth::user()->id;
        $validated['category_id'] = $request->input('category_id');
        $validated['image'] = $imageName;
        $validated['status'] = $status;
        $validated['views'] = 0;
        $validated['likes'] = 0;
        $validated['comments_count'] = 0;


        Post::create($validated);

        return redirect()->back()->with('success', 'Đăng bài thành công!');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('ckeditor_img'), $fileName);

            $url = asset('ckeditor_img/' . $fileName); 

            return response()->json([
                'url' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
    public function tinymceUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public'); 
            $url = asset('storage/' . $path);

            Log::info('File uploaded: ' . $url);
            return response()->json(['location' => $url]);
        }
        return response()->json(['error' => 'Không có file'], 400);
    }
}
