<!-- component card -->
<div class="ml-3 component_card" style="width: {{ $imageWidth ?? 300 }}px;">
<a href="{{ url(($post->category->slug ?? 'uncategorized') . '/' . $post->slug) }}">

        @php
            $isExternalImage = Str::startsWith($post->image, ['http://', 'https://']);
            $imageUrl = $isExternalImage
                ? $post->image
                : asset('upload/images/' . $post->image);
        @endphp

        <img
            src="{{ $imageUrl }}"
            style="height: 170px"
            alt="{{ $post->title ?? 'Không có tiêu đề' }}"
            onerror="this.onerror=null;this.src='{{ asset('images/default.webp') }}';"
            class="w-full h-[245px] object-cover rounded-xl shadow-md hover:shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out"
        />

        <div class="p-4">
            <h2 class="text-2xl font-bold">{{ $post->title ?? 'Chưa có tiêu đề' }}</h2>
            <p class="text-gray-500 mt-2 content-fixed-height">
                {{ $post->content ?? 'Không có nội dung' }}
            </p>

            <div class="flex justify-between items-center gap-6 text-gray-500 text-sm mt-3 icon_card space-beetwen">
                <div class="flex items-center gap-1">
                    <span>❤️</span>
                    <span>{{ $post->likes ?? 0 }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <span>💬</span>
                    <span>{{ $post->comments_count ?? 0 }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <span>🔁</span>
                    <span>{{ $post->likes ?? 15 }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <span>⬇️</span>
                    <span>{{ $post->likes ?? 15 }}</span>
                </div>
               
            </div>

        </div>
    </a>
</div>
