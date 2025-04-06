@extends('layouts.app')

@section('title', 'NMH03 - Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</head>

@section('content')
<div class="container mx-auto px-4 py-6">
    @include('components.banner')
    <div class="mt-8">
        <h3 class="text-2xl font-bold mb-4">Most Popular</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="flex-1">
                    <p class="text-xl font-semibold">Obsidian: Hơn cả một ứng dụng ghi chép</p>
                    <p class="text-gray-500">JUN 25, 2024 - TIEN PHAM</p>
                </div>
                <div class="ml-4">
                    <img src="https://substackcdn.com/image/fetch/w_150,h_150,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_center/https%3A%2F%2Fsubstack-post-media.s3.amazonaws.com%2Fpublic%2Fimages%2F2f6ec8a0-af4c-44ba-8136-a17a32f454fb_949x832.png" class="w-16 h-16 rounded-full object-cover" alt="">
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="flex-1">
                    <p class="text-xl font-semibold">Obsidian: Như một công cụ học tập</p>
                    <p class="text-gray-500">JUN 25, 2024 - TIEN PHAM</p>
                </div>
                <div class="ml-4">
                    <img src="https://substackcdn.com/image/fetch/w_150,h_150,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_center/https%3A%2F%2Fsubstack-post-media.s3.amazonaws.com%2Fpublic%2Fimages%2F0c8562e2-f8a8-4bbc-b45b-778912b035a7_1024x1024.webp" class="w-16 h-16 rounded-full object-cover" alt="">
                </div>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 flex items-center">
                <div class="flex-1">
                    <p class="text-xl font-semibold">How to think about your job?</p>
                    <p class="text-gray-500">JUN 25, 2024 - TIEN PHAM</p>
                </div>
                <div class="ml-4">
                    <img src="https://substackcdn.com/image/fetch/w_150,h_150,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_center/https%3A%2F%2Fsubstack-post-media.s3.amazonaws.com%2Fpublic%2Fimages%2F6a3cf6a3-1c26-4095-8d5e-e3a7c4d49a6d_3821x2517.jpeg" class="w-16 h-16 rounded-full object-cover" alt="">
                </div>
            </div>

        </div>
        <p class="mt-6 text-center text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
    </div>

    <div class="mt-8">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-2xl font-bold">Recent posts</h3>
            <p class="text-blue-600 hover:underline cursor-pointer">VIEW ALL</p>
        </div>
        <div class="flex">
        @if (!empty($data['recent_posts']) && $data['recent_posts']->count())

        <div class="w-4/5 h-1/4 flex flex-wrap">

            @foreach ($data['recent_posts'] as $post)
                @include('components.card', ['post' => $post])
            @endforeach
        </div>
        @else
    <p>Không có bài viết nào trong chuyên mục này.</p>
@endif
            <div class="w-1/5">
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
                        <div class="flex items-center mt-4">
                            <img src="https://substackcdn.com/image/fetch/w_80,h_80,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_auto/https%3A%2F%2Fbucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com%2Fpublic%2Fimages%2Fd8eda296-dc41-4c88-8bcb-72364326b6b8_1080x1080.png"
                                class="w-20 h-20 rounded-lg object-cover"
                                alt="">
                            <div class="ml-3">
                                <p class="text-xl font-bold py-1">Title</p>
                                <p>tên tác giả</p>
                            </div>
                        </div>

                        <div class="flex items-center mt-4">
                            <img src="https://substackcdn.com/image/fetch/w_80,h_80,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_auto/https%3A%2F%2Fbucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com%2Fpublic%2Fimages%2Fd8eda296-dc41-4c88-8bcb-72364326b6b8_1080x1080.png" class="w-20 h-20 rounded-lg object-cover" alt="">
                            <div class="ml-3">
                                <p class="text-xl font-bold py-1">Title</p>
                                <p>tên tác giả</p>
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <img src="https://substackcdn.com/image/fetch/w_80,h_80,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_auto/https%3A%2F%2Fbucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com%2Fpublic%2Fimages%2Fd8eda296-dc41-4c88-8bcb-72364326b6b8_1080x1080.png" class="w-20 h-20 rounded-lg object-cover" alt="">
                            <div class="ml-3">
                                <p class="text-xl font-bold py-1">Title</p>
                                <p>tên tác giả</p>
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <img src="https://substackcdn.com/image/fetch/w_80,h_80,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_auto/https%3A%2F%2Fbucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com%2Fpublic%2Fimages%2Fd8eda296-dc41-4c88-8bcb-72364326b6b8_1080x1080.png" class="w-20 h-20 rounded-lg object-cover" alt="">
                            <div class="ml-3">
                                <p class="text-xl font-bold py-1">Title</p>
                                <p>tên tác giả</p>
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <img src="https://substackcdn.com/image/fetch/w_80,h_80,c_fill,f_webp,q_auto:good,fl_progressive:steep,g_auto/https%3A%2F%2Fbucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com%2Fpublic%2Fimages%2Fd8eda296-dc41-4c88-8bcb-72364326b6b8_1080x1080.png" class="w-20 h-20 rounded-lg object-cover" alt="">
                            <div class="ml-3">
                                <p class="text-xl font-bold py-1">Title</p>
                                <p>tên tác giả</p>
                            </div>
                        </div>
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
        @foreach ($data['congnghe_laptrinh']->chunk(4) as $chunk)
            <div class="swiper-slide">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                </div>
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
        @foreach ($data['suckhoe_theduc']->chunk(4) as $chunk)
            <div class="swiper-slide">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                </div>
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

        @foreach ($data['dulich']->chunk(4) as $chunk)
            <div class="swiper-slide">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                </div>
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
        @foreach ($data['taichinh_canhan']->chunk(4) as $chunk)
            <div class="swiper-slide">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                </div>
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
        @foreach ($data['phattrien_banthan']->chunk(4) as $chunk)
            <div class="swiper-slide">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                </div>
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
        @foreach ($data['giaoduc_hoctap']->chunk(4) as $chunk)
            <div class="swiper-slide">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                </div>
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
        @foreach ($data['doisong_giadinh']->chunk(4) as $chunk)
            <div class="swiper-slide">
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                </div>
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

</div>
@endsection

<script src="{{ asset('js/swiper.js') }}"></script>
