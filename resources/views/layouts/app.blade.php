<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
       
        .swiper-button-next, .swiper-button-prev {
            color: #007bff;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
        .swiper-button-next::after, .swiper-button-prev::after {
            font-size: 18px;
            font-weight: bold;
        }
    /* Add this CSS to your stylesheet */
.group:hover .group-hover\:block {
    display: block;
}

.group-hover\:block {
    display: none;
}
.content-fixed-height {
    height: 70px; /* Chiều cao cố định */
    overflow: hidden; /* Ẩn phần nội dung vượt quá */
    text-overflow: ellipsis; /* Thêm dấu ba chấm nếu nội dung bị cắt */
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Số dòng tối đa */
    -webkit-box-orient: vertical;
}

.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
    width: auto !important; 
    height: auto !important;
}

    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('components.header')

    <div class="container mx-auto mt-5">
        @yield('content')  
    </div>

    @include('components.footer')
</body>
</html>

