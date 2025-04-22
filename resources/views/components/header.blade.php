<link rel="stylesheet" href="{{asset('css/header.css')}}">
<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-3">
            <img src="{{asset('/images/Logo.png')}}" alt="Logo" class="w-10 h-12">
            <span class="text-xl font-bold text-blue-600">NMH03 BLOG</span>
        </a>

        <!-- Hamburger button for mobile -->
        <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Navigation -->
        <nav id="main-menu" class="hidden flex-col md:flex md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-6 absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent z-50 shadow-md md:shadow-none px-4 py-4 md:py-0">
            <a href="#" class="text-gray-700 hover:text-blue-600 transition">Bài Viết</a>

            <!-- Dropdown Thể Loại -->
            <div class="relative group">
                <a href="#" class="text-gray-700 hover:text-blue-600 transition inline-flex items-center">
                    Thể Loại
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <!-- Dropdown items -->
                <div class="absolute left-0 hidden group-hover:block bg-white shadow-lg rounded-md w-64 z-50">
                    <a href="/the-loai/cong-nghe-va-lap-trinh" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Công nghệ và lập trình</a>
                    <a href="/the-loai/suc-khoe-va-the-duc" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Sức khỏe và thể dục</a>
                    <a href="/the-loai/du-lich" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Du lịch</a>
                    <a href="/the-loai/tai-chinh-ca-nhan" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Tài chính cá nhân</a>
                    <a href="/the-loai/phat-trien-ban-than" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Phát triển bản thân</a>
                    <a href="/the-loai/giao-duc-va-hoc-tap" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Giáo dục và học tập</a>
                    <a href="/the-loai/doi-song-va-gia-dinh" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Đời sống và gia đình</a>
                </div>
            </div>

            <a href="/gioi-thieu" class="text-gray-700 hover:text-blue-600 transition">Giới Thiệu</a>
            <a href="#" class="text-gray-700 hover:text-blue-600 transition">Liên Hệ</a>

            <!-- Mobile Only Extra Section -->
            <div class="md:hidden border-t pt-4 space-y-3">
                <a href="/publish/post" class="block w-full text-center bg-blue-600 text-white py-2 rounded-md">📝 Đăng bài</a>

                <input type="text" placeholder="Tìm kiếm..." class="w-full px-4 py-2 border rounded-md text-sm">

                @if(Auth::check())
                <div class="text-sm text-gray-700 mt-2">Xin chào, {{ Auth::user()->name }}</div>
                <a href="/thong-tin-tai-khoan" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Thông tin tài khoản</a>
                <form method="POST" action="/dang-xuat">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-100">Đăng xuất</button>
                </form>
                @else
                <a href="/dang-nhap" class="block w-full text-center text-blue-600 hover:underline">🔐 Đăng Nhập</a>
                @endif
            </div>
        </nav>


        <!-- Right section -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="/publish/post">
                <button class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    📝 Đăng bài
                </button>
            </a>
            <input type="text" placeholder="Tìm kiếm..." class="px-3 py-2 border rounded-md text-sm">

            @if(Auth::check())
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
            <a href="/dang-nhap" class="flex items-center gap-1 text-blue-600 hover:underline text-sm">🔐 Đăng Nhập</a>
            @endif
        </div>
    </div>
</header>

<!-- Script toggle menu -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('main-menu');
        menu.classList.toggle('hidden');
    });
</script>