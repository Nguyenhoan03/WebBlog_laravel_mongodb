@extends('layouts.app')

@section('title', 'NMH03 - Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <style>
        .btn_like.liked {
            background-color: rgb(248, 189, 198);
            /* màu nền nhẹ */
            border: 1px solid #f44336;
            color: #f44336;
            transition: all 0.3s ease;
        }
    </style>
</head>
@section('content')
<div class="container mx-auto">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <div class="text-sm text-gray-500 uppercase font-bold">
                {{ $data->category->name ?? 'Danh mục' }}
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mt-2">
                {{ $data->title ?? 'Tiêu đề bài viết' }}
            </h1>
            <div class="flex items-center mt-4">
                <img src="{{ asset('/images_avatar/' . ($author->image_avatar ?? 'default-avatar.jpg')) }}" alt="Author Avatar" class="w-10 h-10 rounded-full">
                <div class="ml-3">
                    <p class="text-gray-700 font-semibold">{{ $author->name ?? 'Tác giả' }}</p>
                    <p class="text-gray-500 text-sm">{{ $data->created_at ? $data->created_at->format('M d, Y') : 'Ngày đăng' }}</p>
                </div>
            </div>

            <div class="flex justify-between items-center border-t p-6 mt-3">
                <div class="flex gap-2">
                    <button onclick="btn_like()" class="btn_like flex items-center gap-1 border border-gray-300 rounded-full px-3 py-1 text-sm text-gray-700">
                        <span>❤️</span>
                        <span id="like-count">{{ $data->likes }}</span>
                    </button>
                    <button class="flex items-center gap-1 border border-gray-300 rounded-full px-3 py-1 text-sm text-gray-700">
                        <span>💬</span>
                        <span>{{$data->comments_count}}</span>
                    </button>
                    <button class="flex items-center gap-1 border border-gray-300 rounded-full px-3 py-1 text-sm text-gray-700">
                        <span>🔁</span>
                        <span>1</span>
                    </button>
                </div>
                <button class="border border-gray-300 rounded-full px-4 py-1 text-sm text-gray-700">
                    Share
                </button>
            </div>

        </div>

        <div class="px-6 py-4">
            <div class="prose max-w-none">
                {!! $data->content ?? 'Không có nội dung' !!}
            </div>
        </div>

        <div class="flex justify-between items-center border-t p-6 mt-3">
                <div class="flex gap-2">
                    <button onclick="btn_like()" class="btn_like flex items-center gap-1 border border-gray-300 rounded-full px-3 py-1 text-sm text-gray-700">
                        <span>❤️</span>
                        <span id="like-count">{{ $data->likes }}</span>
                    </button>
                    <button class="flex items-center gap-1 border border-gray-300 rounded-full px-3 py-1 text-sm text-gray-700">
                        <span>💬</span>
                        <span>{{$data->comments_count}}</span>
                    </button>
                    <button class="flex items-center gap-1 border border-gray-300 rounded-full px-3 py-1 text-sm text-gray-700">
                        <span>🔁</span>
                        <span>1</span>
                    </button>
                </div>
                <button class="border border-gray-300 rounded-full px-4 py-1 text-sm text-gray-700">
                    Share
                </button>
            </div>


        <div class="p-4 bg-gray-100 rounded-lg shadow">

            <h5 class="text-lg font-bold mb-4">Bình luận</h5>

            <!-- Form bình luận -->
            <div class="flex items-start mb-4">
                @php
                $avatar = Auth::check()
                ? ($author->image_avatar ?? 'default-avatar.png')
                : 'default-avatar.jpg';
                @endphp

                <img src="{{ asset('images_avatar/' . $avatar) }}"
                    class="w-10 h-10 rounded-full object-cover mr-3"
                    alt="Avatar">

                <div class="flex-1">
                    <textarea rows="2"
                        class="w-full p-2 mb-2 border border-gray-300 rounded resize-none focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Viết bình luận của bạn..."></textarea>
                    <div class="text-right">
                        <button class="bg-blue-600 text-white text-sm px-4 py-1 rounded hover:bg-blue-700 transition">
                            Gửi
                        </button>
                    </div>
                </div>
            </div>

            <!-- Một bình luận cha -->
            <div class="flex items-start mb-4">
    <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-full mr-3" alt="Avatar">
    <div class="flex-1">
        <div class="bg-white p-3 rounded border border-gray-200">
            <div class="flex justify-between items-center mb-1">
                <span class="font-semibold">Quang Nguyen</span>
                <span class="text-sm text-gray-500">30 Tháng 9</span>
            </div>
            <p class="text-sm mb-2">Bài hay và bổ ích! Cho mình hỏi Readwise app là bạn có trả phí tầm 10 USD/tháng đúng không?</p>
            <div class="flex gap-4 text-sm text-gray-500">
                <span>❤️ Thích (1)</span>
                <button class="hover:underline reply-btn text-sm text-gray-500">Trả lời</button>
                <a href="#" class="hover:underline">Chia sẻ</a>
            </div>
        </div>

        <div class="reply-form hidden mt-2 pl-4">
            <form action="#" method="POST" class="flex items-start gap-2">
                <img src="https://via.placeholder.com/35" class="w-9 h-9 rounded-full" alt="Avatar">
                <div class="flex-1">
                    <textarea name="reply" rows="2" placeholder="Viết phản hồi..." class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                    <div class="flex justify-end mt-1">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-1 rounded">Gửi</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-3 pl-4 border-l-2 border-gray-200">
            <div class="flex items-start mb-3">
                <img src="https://via.placeholder.com/35" class="w-9 h-9 rounded-full mr-2" alt="Avatar">
                <div class="flex-1">
                    <div class="bg-white p-2 rounded border border-gray-200">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-semibold text-sm">Tien Pham</span>
                            <span class="text-xs text-gray-500">1 ngày trước</span>
                        </div>
                        <p class="text-sm mb-1">Mình dùng bản trả phí đúng rồi bạn, có thêm nhiều tính năng rất tiện!</p>
                        <div class="flex gap-4 text-xs text-gray-500">
                            <span>❤️ Thích</span>
                            <button class="hover:underline reply-btn text-xs text-gray-500">Trả lời</button>
                        </div>
                    </div>

                    <div class="reply-form hidden mt-2">
                        <form action="#" method="POST" class="flex items-start gap-2">
                            <img src="https://via.placeholder.com/35" class="w-9 h-9 rounded-full" alt="Avatar">
                            <div class="flex-1">
                                <textarea name="reply" rows="2" placeholder="Viết phản hồi..." class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                                <div class="flex justify-end mt-1">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-1 rounded">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex items-start mb-2">
                <img src="https://via.placeholder.com/35" class="w-9 h-9 rounded-full mr-2" alt="Avatar">
                <div class="flex-1">
                    <div class="bg-white p-2 rounded border border-gray-200">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-semibold text-sm">Người dùng khác</span>
                            <span class="text-xs text-gray-500">2 ngày trước</span>
                        </div>
                        <p class="text-sm mb-1">Mình đang dùng bản free, cũng khá ổn nha.</p>
                        <div class="flex gap-4 text-xs text-gray-500">
                            <span>👍 Thích</span>
                            <button class="hover:underline reply-btn text-xs text-gray-500">Trả lời</button>
                        </div>
                    </div>

                    <div class="reply-form hidden mt-2">
                        <form action="#" method="POST" class="flex items-start gap-2">
                            <img src="https://via.placeholder.com/35" class="w-9 h-9 rounded-full" alt="Avatar">
                            <div class="flex-1">
                                <textarea name="reply" rows="2" placeholder="Viết phản hồi..." class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 resize-none"></textarea>
                                <div class="flex justify-end mt-1">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-1 rounded">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="text-gray-500 text-sm mt-2 pl-1">3 phản hồi từ Tien Pham và người khác</div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.reply-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const parent = btn.closest('.flex-1');
            const form = parent.querySelector('.reply-form');
            if (form) {
                form.classList.toggle('hidden');
            }
        });
    });
</script>


            <!-- Load more -->
            <div class="text-center mt-4">
                <a href="#" class="text-gray-500 text-sm hover:underline">Xem thêm bình luận...</a>
            </div>
        </div>


        @include('components.categoryBlogs', [
        'title' => 'Các bài đăng liên quan',
        'data' => $data_category_relate
        ])

        @include('components.categoryBlogs', [
        'title' => 'Các bài viết từ ' . $author->name,
        'data' => $post_user_other
        ])

    </div>
</div>

@endsection
<script src="{{ asset('js/swiper.js') }}"></script>
<script>
    var slug = "{{ $data->slug }}";

    document.addEventListener("DOMContentLoaded", function() {
        let likedPosts = JSON.parse(localStorage.getItem("likedPosts") || "[]");
        if (likedPosts.includes(slug)) {
            document.querySelector('.btn_like').classList.add('liked');
        }
    });

    function btn_like() {
        let likedPosts = JSON.parse(localStorage.getItem("likedPosts") || "[]");
        let isLiked = likedPosts.includes(slug);
        let method = isLiked ? 'DELETE' : 'POST';

        fetch(`/update_like/${slug}`, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById('like-count').innerText = data.likes;

                    const btn = document.querySelector('.btn_like');

                    if (isLiked) {
                        likedPosts = likedPosts.filter(item => item !== slug);
                        btn.classList.remove('liked');
                    } else {
                        likedPosts.push(slug);
                        btn.classList.add('liked');
                    }

                    localStorage.setItem("likedPosts", JSON.stringify(likedPosts));
                } else {
                    alert('Đã xảy ra lỗi, vui lòng thử lại sau!');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Lỗi kết nối đến máy chủ!');
            });
    }
</script>

<!-- xử lý comment -->
 <script>
    
 </script>