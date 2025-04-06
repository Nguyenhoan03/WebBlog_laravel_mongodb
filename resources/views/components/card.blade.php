<!-- component card  -->
<div class="ml-3" style="width: 23rem">
<a href="{{ url(optional($post->category)->slug . '/' . $post->slug) }}">
    <img src="{{ $post->image ?? 'NMH03 Blogs' }}" alt="" class="w-full h-auto">
    <div class="p-4">
        <h2 class="text-2xl font-bold">{{ $post->title ?? 'Chưa có tiêu đề' }}</h2>
        <p class="text-gray-500 mt-2 content-fixed-height">{{ $post->content ?? 'Không có nội dung' }}</p>
        <a href="{{ url(optional($post->category)->slug . '/' . $post->slug) }}" class="block text-blue-600 hover:underline mt-4">Xem chi tiết</a>
       </div>
</a>
</div>