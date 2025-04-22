@extends('layouts.app')

@section('title', 'NMH03 - Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h1 class="text-4xl font-bold mb-6">#life-design</h1>

    <div class="flex items-center justify-between">
        <div class="flex space-x-4 mb-6 border-b pb-2">
            <button class="px-3 py-1 text-sm font-semibold text-white bg-black rounded">Latest</button>
            <button class="px-3 py-1 text-sm font-semibold text-gray-600 hover:text-black">Top</button>
            <button class="px-3 py-1 text-sm font-semibold text-gray-600 hover:text-black">Discussions</button>
        </div>
        <div class="flex justify-end mb-6 relative w-1/3 ml-auto">
            <input
                type="text"
                placeholder="Search..."
                class="border px-4 py-2 pr-20 rounded w-full">
            <button
                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-black text-white px-3 py-1 rounded text-sm">
                Tìm kiếm
            </button>
        </div>

    </div>
    @foreach($post as $dt)
    @include('components.cardCategory',['post'=>$dt])
    @endforeach
</div>
@endsection