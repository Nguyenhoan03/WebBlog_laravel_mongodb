<footer class="bg-gray-900 text-white py-6 mt-6">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Cột 1: Thông tin -->
        <div>
            <h3 class="text-lg font-semibold mb-3">TÀI NGUYÊN</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-blue-400">Bài Viết</a></li>
                <li><a href="#" class="hover:text-blue-400">Thể Loại</a></li>
                <li><a href="#" class="hover:text-blue-400">Videos</a></li>
                <li><a href="#" class="hover:text-blue-400">Công Cụ</a></li>
            </ul>
        </div>

        <!-- Cột 2: Dịch Vụ -->
        <div>
            <h3 class="text-lg font-semibold mb-3">DỊCH VỤ</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-blue-400">Hướng Dẫn</a></li>
                <li><a href="#" class="hover:text-blue-400">FAQs</a></li>
                <li><a href="#" class="hover:text-blue-400">Liên Hệ</a></li>
            </ul>
        </div>

        <!-- Cột 3: Ứng Dụng -->
        <div>
            <h3 class="text-lg font-semibold mb-3">ỨNG DỤNG DI ĐỘNG</h3>
            <div class="flex space-x-3">
                <img src="{{ asset('images/google-play.png') }}" class="h-12" alt="Google Play">
                <img src="{{ asset('images/app-store.png') }}" class="h-12" alt="App Store">
            </div>
        </div>
    </div>

    <div class="text-center text-gray-400 mt-6">
        © {{ date('Y') }} BLOG. All rights reserved.
    </div>
</footer>
