<div class="container mx-auto px-4">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">🛠️ {{$title}}</h1>

    <!-- Filter + Search -->
    <div class="flex items-center space-x-4 mb-6">
        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Latest</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Top</button>
        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Discussions</button>
        <div class="ml-auto">
            <input type="text" placeholder="Search" class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper" style="height: 480px">
    <div class="swiper-wrapper">
        @foreach ($data->chunk(3) as $chunk)
            <div class="swiper-slide">
                
                    @foreach ($chunk as $post)
                        @include('components.card', ['post' => $post])
                    @endforeach
                
            </div>
        @endforeach
      
    </div>
    
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
</div>
