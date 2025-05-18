@extends('layouts.app')

@section('title', '$data->title' ?? 'Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .btn_like.liked {
            background-color: rgb(248, 189, 198);
            border: 1px solid #f44336;
            color: #f44336;
            transition: all 0.3s ease;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #007bff;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 18px;
            font-weight: bold;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .toc-box {
            background-color: #f0f6fa;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
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

            <!-- mục lục -->
            @php
            preg_match_all('#<h([1-6])[^>]*>(.*?)<\/h[1-6]>#', $data->content, $matches, PREG_OFFSET_CAPTURE);
            $toc = [];
            foreach ($matches[0] as $i => $heading) {
            $level = $matches[1][$i][0]; // cấp heading (1,2,3...)
            $text = strip_tags($matches[2][$i][0]);
            // Lấy id nếu có, nếu không thì tự tạo
            preg_match('/id="([^"]+)"/', $heading[0], $idMatch);
            $id = $idMatch[1] ?? 'toc-' . $i . '-' . \Illuminate\Support\Str::slug($text);
            $toc[] = [
            'id' => $id,
            'text' => $text,
            'level' => $level,
            ];
            // Nếu heading chưa có id thì thêm vào content
            if (empty($idMatch)) {
            $newHeading = preg_replace('/<h([1-6]) /', '<h$1 id="' .$id.'"', $heading[0], 1);
                $data->content = str_replace($heading[0], $newHeading, $data->content);
                }
                }
                @endphp
                <!--  -->

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
                            <span class="like-count">{{$data->likes}}</span>
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
        @if(count($toc))
        <div class="toc-box mb-6 p-4 rounded-lg bg-gray-100">
            <strong class="block mb-2">Mục lục</strong>
            <ul class="pl-0" style="list-style: none; border-left: 2px solid #007bff;">
                @foreach($toc as $item)
                <li style="margin-left: {{ ($item['level']-1)*20 + 10 }}px; margin-bottom: 4px; padding-left: 5px;">
                    <a href="#{{ $item['id'] }}" class="text-black-600 hover:underline">{{ $item['text'] }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="px-6 py-4">
            <div class="prose max-w-none">
                {!! $data->content ?? 'Không có nội dung' !!}
            </div>
        </div>
        <div class="flex justify-between items-center border-t p-6 mt-3">
            <div class="flex gap-2">
                <button onclick="btn_like()" class="btn_like flex items-center gap-1 border border-gray-300 rounded-full px-3 py-1 text-sm text-gray-700">
                    <span>❤️</span>
                    <span class="like-count">{{ $data->likes }}</span>
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

        <h5 class="text-lg font-bold mb-4">Bình luận</h5>
        <div class="flex items-start mb-4">
            @php
            $avatar = Auth::check()
            ? ($author->image_avatar ?? 'default-avatar.png')
            : 'default-avatar.jpg';
            @endphp

            <img src="{{ asset('images_avatar/' . $avatar) }}"
                class="w-10 h-10 rounded-full object-cover mr-3 mx-2"
                alt="Avatar">

            <form action="/comment/{{$category}}/{{$slug}}" method="POST" class="w-full px-3">
                @csrf
                <input type="hidden" name="category" value="{{$category}}">
                <input type="hidden" name="slug" value="{{$slug}}">
                <input type="hidden" name="parent_id" value="0">
                <div class="flex-1">
                    <textarea rows="3" style="width:100%"
                        name="content" class="w-full p-2 mb-2 border border-gray-300 rounded resize-none focus:outline-none focus:ring focus:border-blue-300 user_comment"
                        placeholder="Viết bình luận của bạn..."></textarea>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-600 text-white text-sm px-4 py-1 rounded hover:bg-blue-700 transition submit_user_comment">
                            Gửi
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @include('components.comment', [
        'comments' => $data_comment,
        'data_auth_comment' => $data_auth_comment
        ])

        <div class="text-center mt-4">
            <a href="#" class="text-gray-500 text-sm hover:underline">Xem thêm bình luận...</a>
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

        document.querySelectorAll('.btn_like').forEach(function(btn) {
            if (likedPosts.includes(slug)) {
                btn.classList.add('liked');
            }

            btn.addEventListener('click', function(e) {
                e.preventDefault();
                handleLike(btn);
            });
        });
    });

    function handleLike(button) {
        let likedPosts = JSON.parse(localStorage.getItem("likedPosts") || "[]");
        let isLiked = likedPosts.includes(slug);
        let method = isLiked ? 'DELETE' : 'POST';
        fetch(`/update_like/${slug}`, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === "success") {
                    document.querySelectorAll('.like-count').forEach(span => {
                        span.innerText = data.likes;
                    });
                    if (isLiked) {
                        likedPosts = likedPosts.filter(item => item !== slug);
                        button.classList.remove('liked');
                    } else {
                        likedPosts.push(slug);
                        button.classList.add('liked');
                    }
                    localStorage.setItem("likedPosts", JSON.stringify(likedPosts));
                } else {
                    alert('Đã xảy ra lỗi xử lý dữ liệu!');
                }
            })
            .catch(err => {
                console.error(err);
                if (err.message.includes('Network')) {
                    alert('Kết nối máy chủ thất bại, vui lòng kiểm tra mạng!');
                } else {
                    alert('Bạn cần đăng nhập để thực hiện hành động này!');
                }
            });
    }
</script>