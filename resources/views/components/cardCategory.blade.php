
    <div class="flex items-start justify-between space-x-6 mb-4 border-b pb-4">
        <div class="flex-1">
            <a href="{{ url(optional($post->category)->slug . '/' . $post->slug) }}" class="text-xl font-semibold hover:underline">
                {{ $post->title }}
            </a>
            <p class="text-gray-600 mt-1">{{ $post->tags ?? '' }}</p>
            <p class="text-sm text-gray-400 mt-2 uppercase">
                {{ $post->created_at ? $post->created_at->format('M d, Y') : 'Ngày đăng' }} • TIEN PHAM
            </p>
        </div>

        <a href="#" class="block w-52 h-24 flex-shrink-0">
            @php
                $isExternalImage = Str::startsWith($post->image, ['http://', 'https://']);
                $imageUrl = $isExternalImage
                    ? $post->image
                    : asset('upload/images/' . $post->image);
            @endphp
            <img src="{{ $imageUrl }}"
                 onerror="this.onerror=null;this.src='{{ asset('images/default.webp') }}';"
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover rounded-md shadow">
        </a>
    </div>
