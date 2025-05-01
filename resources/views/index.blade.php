@extends('layouts.app')

@section('title', 'NMH03 - Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
</head>

@section('content') 
<div class="container mx-auto mt-3">
    @include('components.banner')
    <div class="mt-8">
        <h3 class="text-2xl font-bold mb-4">Most Popular</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($data['most_popular'] as $post)
            <a href="{{ url(optional($post->category)->slug . '/' . $post->slug) }}">
                <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                    <div class="flex-1">
                        <p class="text-xl font-semibold">{{ $post->title }}</p>
                        <p class="text-gray-500 text-sm">
                            {{ $post->created_at ? $post->created_at->format('M d, Y') : 'Ngày đăng' }}
                        </p>
                    </div>
                    <div class="ml-4">
                        @php
                        $isExternalImage = Str::startsWith($post->image, ['http://', 'https://']);
                        $imageUrl = $isExternalImage ? $post->image : asset('upload/images/' . $post->image);
                        @endphp
                        <img
                            src="{{ $imageUrl }}"
                            alt="{{ $post->title ?? 'Không có tiêu đề' }}"
                            onerror="this.onerror=null;this.src='{{ asset('images/default.webp') }}';"
                            class="w-16 h-16 rounded-full object-cover" />
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <p class="mt-6 text-center text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="mt-8">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-2xl font-bold">Recent posts</h3>
            <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
        </div>
        <div class="flex recent-posts">
            @if (!empty($data['recent_posts']) && $data['recent_posts']->count())

            <div class="w-4/5 h-1/4 flex flex-wrap recent-posts-left">

                @foreach ($data['recent_posts'] as $post)
                @include('components.card', ['post' => $post,'imageWidth' => 275])
                @endforeach
            </div>
            @else
            <p>Không có bài viết nào trong chuyên mục này.</p>
            @endif
            <div class="w-1/5 recent-posts-right">
                <div class="">
                    <h3 class="font-bold text-xl">NMH03 Blog</h3>
                    <p>Kiến thức khoa học hành vi, khoa học thần kinh, và tâm lý học ứng dụng, giúp bạn thiết kế một cuộc đời hạnh phúc, ý nghĩa, và sáng tạo. Bắt đầu từ hôm nay.</p>
                    <div class="relative w-full mt-4">
                        <input type="text" placeholder="Type your email..." class="border border-gray-300 px-4 py-2 rounded-lg w-full pr-20">
                        <button class="absolute top-0 right-0 h-full bg-blue-400 text-white px-4 py-2 rounded-r-lg">Subscribe</button>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="font-bold text-xl">Recommendations</h3>
                    <div class="">
                        @foreach($data['recommendations'] as $recommendation)
                        @if($recommendation->user)
                        <div class="flex items-center mt-4">
                        <img src="{{ asset('images_avatar/' . ($recommendation->user->image_avatar ?? 'default-avatar.png')) }}" alt="Avatar" style="width:80px;height:80px">
                            <div class="ml-3">
                                <p class="text-xl font-bold ">{{ $recommendation->user->name }}</p>
                                <p>{{ $recommendation->user->email }}</p>
                                <p><small>{{ $recommendation->total_posts }} bài viết</small></p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<div class="mt-5 border-t border-gray-300">
    <div class="flex justify-between items-center py-4">
        <h2 class="font-bold text-3xl mt-3">Công nghệ và lập trình</h2>
        <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="swiper mySwiper" style="height: 480px">
        <div class="swiper-wrapper">
            @if (!empty($data['congnghe_laptrinh']) && $data['congnghe_laptrinh']->count())
            @foreach ($data['congnghe_laptrinh'] as $post)
            <div class="swiper-slide">
                @include('components.card', ['post' => $post])
            </div>
            @endforeach
            @else
            <p>Không có bài viết nào trong chuyên mục này.</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>



<div class="mt-5 border-t border-gray-300">
    <div class="flex justify-between items-center py-4">
        <h2 class="font-bold text-3xl mt-3">Sức khỏe và thể dục</h2>
        <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="swiper mySwiper" style="height: 480px">
        <div class="swiper-wrapper">
            @if (!empty($data['suckhoe_theduc']) && $data['suckhoe_theduc']->count())
            @foreach ($data['suckhoe_theduc'] as $post)
            <div class="swiper-slide">
                @include('components.card', ['post' => $post])
            </div>
            @endforeach
            @else
            <p>Không có bài viết nào trong chuyên mục này.</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</div>



<div class="mt-5 border-t border-gray-300">
    <div class="flex justify-between items-center py-4">
        <h2 class="font-bold text-3xl mt-3">Du lịch</h2>
        <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="swiper mySwiper" style="height: 480px">
        <div class="swiper-wrapper">
            @if (!empty($data['dulich']) && $data['dulich']->count())

            @foreach ($data['dulich'] as $post)
            <div class="swiper-slide">
                @include('components.card', ['post' => $post])
            </div>
            @endforeach
            @else
            <p>Không có bài viết nào trong chuyên mục này.</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</div>



<div class="mt-5 border-t border-gray-300">
    <div class="flex justify-between items-center py-4">
        <h2 class="font-bold text-3xl mt-3">Tài chính cá nhân</h2>
        <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="swiper mySwiper" style="height: 480px">
        <div class="swiper-wrapper">
            @if (!empty($data['taichinh_canhan']) && $data['taichinh_canhan']->count())
            @foreach ($data['taichinh_canhan'] as $post)
            <div class="swiper-slide">
                @include('components.card', ['post' => $post])
            </div>
            @endforeach
            @else
            <p>Không có bài viết nào trong chuyên mục này.</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</div>


<div class="mt-5 border-t border-gray-300">
    <div class="flex justify-between items-center py-4">
        <h2 class="font-bold text-3xl mt-3">Phát triển bản thân</h2>
        <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="swiper mySwiper" style="height: 480px">
        <div class="swiper-wrapper">
            @if (!empty($data['phattrien_banthan']) && $data['phattrien_banthan']->count())
            @foreach ($data['phattrien_banthan'] as $post)
            <div class="swiper-slide">
                @include('components.card', ['post' => $post])
            </div>
            @endforeach
            @else
            <p>Không có bài viết nào trong chuyên mục này.</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>


<div class="mt-5 border-t border-gray-300">
    <div class="flex justify-between items-center py-4">
        <h2 class="font-bold text-3xl mt-3">Giáo dục và học tập</h2>
        <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="swiper mySwiper" style="height: 480px">
        <div class="swiper-wrapper">
            @if (!empty($data['giaoduc_hoctap']) && $data['giaoduc_hoctap']->count())
            @foreach ($data['giaoduc_hoctap'] as $post)
            <div class="swiper-slide">
                @include('components.card', ['post' => $post])
            </div>
            @endforeach
            @else
            <p>Không có bài viết nào trong chuyên mục này.</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</div>


<div class="mt-5 border-t border-gray-300">
    <div class="flex justify-between items-center py-4">
        <h2 class="font-bold text-3xl mt-3">Đời sống và gia đình</h2>
        <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="swiper mySwiper" style="height: 480px">
        <div class="swiper-wrapper">
            @if (!empty($data['doisong_giadinh']) && $data['doisong_giadinh']->count())
            @foreach ($data['doisong_giadinh'] as $post)
            <div class="swiper-slide">
                @include('components.card', ['post' => $post])
            </div>
            @endforeach

            @else
            <p>Không có bài viết Đời sống và gia đình nào trong chuyên mục này.</p>
            @endif
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</div>

</div>
@endsection

<script src="{{ asset('js/swiper.js') }}"></script>