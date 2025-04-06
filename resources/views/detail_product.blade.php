@extends('layouts.app')

@section('title', 'NMH03 - Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <div class="text-sm text-gray-500 uppercase font-bold">
                post->category->name ?? 'Danh mục' }}
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mt-2">
                post->title ?? 'Tiêu đề bài viết' }}
            </h1>
            <div class="flex items-center mt-4">
                <img src="post->author->avatar ?? asset('default-avatar.png') }}" alt="Author Avatar" class="w-10 h-10 rounded-full">
                <div class="ml-3">
                    <p class="text-gray-700 font-semibold">post->author->name ?? 'Tác giả' }}</p>
                    <p class="text-gray-500 text-sm">post->created_at->format('M d, Y') ?? 'Ngày đăng' }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-start gap-2 my-3">
        <span class="reaction-icon">❤️ 8</span>
        <span class="reaction-icon">🔄 1</span>
        <button class="share-btn">Share</button>
    </div>


        </div>
        <div class="px-6 py-4">
            <div class="prose max-w-none">
                {post->content ?? 'Không có nội dung' !!}
            </div>
        </div>
        <div class="px-6 py-4 border-t">
            <div class="flex items-center">
                <span class="text-gray-600 mr-4"><i class="fas fa-heart"></i> post->likes ?? 0 }}</span>
                <span class="text-gray-600 mr-4"><i class="fas fa-comment"></i> post->comments_count ?? 0 }}</span>
                <a href="#" class="text-blue-600 hover:underline">Share</a>
            </div>
        </div>
        <div class="comment-section">
        <h4>Bình luận</h4>
        <form>
            <div class="mb-3">
                <label for="comment" class="form-label">Viết bình luận của bạn:</label>
                <textarea class="form-control" id="comment" rows="3" placeholder="Nhập bình luận..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
    </div>
</div>
@endsection