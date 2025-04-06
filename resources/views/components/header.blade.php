@extends('layouts.app')

@section('title', 'NMH03 - Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Header Section -->
        <div class="px-6 py-4 border-b">
            <div class="text-sm text-gray-500 uppercase font-bold">
                {{ $post->category->name ?? 'Danh mục' }}
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mt-2">
                {{ $post->title ?? 'Tiêu đề bài viết' }}
            </h1>
            <div class="flex items-center mt-4">
                <img src="{{ $post->author->avatar ?? asset('default-avatar.png') }}" alt="Author Avatar" class="w-12 h-12 rounded-full">
                <div class="ml-3">
                    <p class="text-gray-700 font-semibold">{{ $post->author->name ?? 'Tác giả' }}</p>
                    <p class="text-gray-500 text-sm">{{ $post->created_at->format('M d, Y') ?? 'Ngày đăng' }}</p>
                </div>
            </div>
        </div>

        <!-- Reaction Section -->
        <div class="px-6 py-4 flex items-center gap-4 border-b">
            <span class="text-red-500 text-lg flex items-center gap-1">
                ❤️ <span>{{ $post->likes ?? 0 }}</span>
            </span>
            <span class="text-blue-500 text-lg flex items-center gap-1">
                🔄 <span>{{ $post->shares ?? 0 }}</span>
            </span>
            <button class="text-blue-600 hover:underline font-semibold">Share</button>
        </div>

        <!-- Content Section -->
        <div class="px-6 py-4">
            <div class="prose max-w-none">
                {!! $post->content ?? 'Không có nội dung' !!}
            </div>
        </div>

        <!-- Comments Section -->
        <div class="px-6 py-4 border-t">
            <h4 class="text-lg font-bold mb-4">Bình luận</h4>
            <form>
                <div class="mb-4">
                    <textarea class="w-full border rounded-lg p-3" id="comment" rows="3" placeholder="Nhập bình luận..."></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Gửi</button>
            </form>
            <div class="mt-6">
                <p class="text-gray-600"><i class="fas fa-comment"></i> {{ $post->comments_count ?? 0 }} bình luận</p>
            </div>
        </div>
    </div>
</div>
@endsection