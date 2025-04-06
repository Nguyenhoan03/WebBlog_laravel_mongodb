@extends('layouts.app')

@section('title', 'NMH03 - Cộng đồng chia sẻ kiến thức về mọi lĩnh vực')

@section('content')
<div class="container mx-auto px-4 py-6">
   @include('components.categoryBlogs')
</div>
@endsection