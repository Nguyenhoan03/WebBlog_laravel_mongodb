@extends('layouts.app')

@section('title', 'NMH03 - Blog Khoa Học & Nghệ Thuật Sống')

@section('content')
<div class="container mx-auto px-6 py-16 space-y-24 text-gray-800">

    <!-- Section 1 -->
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <!-- <img src="/images/nmh03-logo.png" class="w-24 h-24 mx-auto" alt="NMH03 Logo"> -->
        <h1 class="text-4xl font-bold">NMH03 – Blog Khoa Học Hành Vi, Tâm Lý Học Ứng Dụng & Nghệ Thuật Sống</h1>
        <p class="text-lg text-gray-600">
            Kết nối khoa học với đời sống. Nuôi dưỡng hiểu biết, hạnh phúc và sự sáng tạo mỗi ngày.
        </p>
    </div>

    <!-- Section 2 -->
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <div class="md:order-2">
            <img src="{{asset('/images/undraw_software-engineer_xv60.png')}}" alt="Brain Science" class="rounded-xl shadow-xl w-full">
        </div>
        <div>
            <h2 class="text-2xl font-semibold mb-4">🔍 Vì sao NMH03 ra đời?</h2>
            <p>
                Trong thế giới hiện đại, việc hiểu chính mình và thấu cảm người khác trở nên quan trọng hơn bao giờ hết.
                NMH03 ra đời như một cầu nối giữa khoa học và đời sống, giúp bạn tiếp cận <strong>khoa học hành vi</strong>,
                <strong>thần kinh học</strong> và <strong>tâm lý học ứng dụng</strong> một cách đơn giản, thực tế và gần gũi.
            </p>
        </div>
    </div>

    <!-- Section 3 -->
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <div>
            <img src="{{asset('/images/undraw_personal-trainer_bqkg.png')}}" alt="Mental Health" class="rounded-xl shadow-xl w-full">
        </div>
        <div>
            <h2 class="text-2xl font-semibold mb-4">🧠 NMH03 chia sẻ điều gì?</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>📌 Hiểu sâu hơn về <strong>não bộ, hành vi và cảm xúc</strong></li>
                <li>📈 Xây dựng <strong>thói quen tích cực và sức khỏe tinh thần</strong></li>
                <li>💬 Cải thiện <strong>giao tiếp, mối quan hệ</strong> và thấu cảm</li>
                <li>🎨 Khơi nguồn <strong>sáng tạo & tư duy phản biện</strong></li>
            </ul>
        </div>
    </div>

    <!-- Section 4 -->
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <div class="md:order-2">
            <img src="{{asset('/images/undraw_visual-data_3ghp.png')}}" alt="Self Growth" class="rounded-xl shadow-xl w-full">
        </div>
        <div>
            <h2 class="text-2xl font-semibold mb-4">🚀 Hành trình phát triển bản thân bắt đầu từ hiểu biết</h2>
            <p>
                Chúng tôi tin rằng <strong>tri thức đúng đắn</strong> là nền tảng của một cuộc sống có chiều sâu và ý nghĩa.
                NMH03 không chỉ là nơi khám phá bản thân, mà còn là người bạn đồng hành trên hành trình <em>sống với phiên bản tốt hơn mỗi ngày</em>.
            </p>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-16">
        <h3 class="text-xl font-semibold mb-3">🌟 Hãy bắt đầu hành trình của bạn cùng NMH03!</h3>
        <a href="/" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition shadow-md">
            Khám phá các bài viết
        </a>
    </div>
</div>
@endsection
