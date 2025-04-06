@extends('layouts.app')

@section('title', 'Đăng Nhập - NMH03')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Đăng Nhập</h2>
        <form action="/dang-nhap" method="POST" class="space-y-4">
            @csrf
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
            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 text-gray-700">Ghi nhớ đăng nhập</label>
            </div>
            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Đăng Nhập
            </button>
            <a href="{{ route('auth.google') }}" 
    class="w-full inline-block bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-300 text-center">
    Đăng nhập bằng Google
</a>
        </form>
        <!-- Links -->
        <div class="mt-4 text-center">
            <a href="" class="text-blue-600 hover:underline text-sm">Quên mật khẩu?</a>
        </div>
        <div class="mt-2 text-center">
            <span class="text-gray-700 text-sm">Chưa có tài khoản?</span>
            <a href="/dang-ky" class="text-blue-600 hover:underline text-sm">Đăng ký ngay</a>
        </div>
    </div>
</div>
@endsection