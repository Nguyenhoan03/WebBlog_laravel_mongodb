<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/">
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/50" alt="Logo" class="w-10 h-10">
                <span class="text-xl font-bold text-blue-600">NMH03 BLOG</span>
            </div>
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-6">
            <a href="#" class="text-gray-700 hover:text-blue-600">Bài Viết</a>
            <div class="relative group">
                <a href="#" class="text-gray-700 hover:text-blue-600">Thể Loại</a>
                <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-md w-64 z-50">
                    <a href="/the-loai/cong-nghe-va-lap-trinh" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Công nghệ và lập trình</a>
                    <a href="/the-loai/suc-khoe-va-the-duc" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Sức khỏe và thể dục</a>
                    <a href="/the-loai/du-lich" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Du lịch</a>
                    <a href="/the-loai/tai-chinh-ca-nhan" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Tài chính cá nhân</a>
                    <a href="/the-loai/phat-trien-ban-than" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Phát triển bản thân</a>
                    <a href="/the-loai/giao-duc-va-hoc-tap" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Giáo dục và học tập</a>
                    <a href="/the-loai/doi-song-va-gia-dinh" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Đời sống và gia đình</a>
                </div>
            </div>
            <a href="#" class="text-gray-700 hover:text-blue-600">Giới Thiệu</a>
            <a href="#" class="text-gray-700 hover:text-blue-600">Liên Hệ</a>
        </nav>

        <!-- Right section -->
        <div class="flex items-center space-x-4">
            <input type="text" placeholder="Tìm kiếm..." class="px-4 py-2 border rounded-md text-sm">

            @if(Auth::check())
                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-blue-600 focus:outline-none">
                        Xin chào, {{ Auth::user()->name }} 
                    </button>
                    <div class="absolute right-0 w-48 bg-white rounded-md shadow-lg hidden group-hover:block z-50">
                        <a href="/thong-tin-tai-khoan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 hover:text-blue-600">Thông tin tài khoản</a>
                        <form method="POST" action="/dang-xuat">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-100 hover:text-blue-600">Đăng xuất</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/dang-nhap" class="text-blue-600 hover:underline">Đăng Nhập</a>
            @endif
        </div>
    </div>
</header>
