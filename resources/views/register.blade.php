@extends('layouts.app')

@section('title', 'Đăng Ký - NMH03')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Đăng Ký</h2>
        <form action="/dang-ky" method="POST" class="space-y-4">
            @csrf
            <!-- Name Input -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Họ và Tên</label>
                <input type="text" id="name" name="name" placeholder="Nhập họ và tên của bạn" 
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn" 
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Password Input -->
            <div>
                <label for="password" class="block text-gray-700 font-medium mb-1">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn" 
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Confirm Password Input -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Xác nhận mật khẩu</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu của bạn" 
                    class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Đăng Ký
            </button>
        </form>
        <!-- Links -->
        <div class="mt-4 text-center">
            <span class="text-gray-700 text-sm">Đã có tài khoản?</span>
            <a href="/dang-nhap" class="text-blue-600 hover:underline text-sm">Đăng nhập ngay</a>
        </div>
    </div>
</div>
@endsection