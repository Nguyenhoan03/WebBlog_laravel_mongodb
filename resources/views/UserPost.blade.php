@extends('layouts.app')

@section('title', 'Đăng bài viết')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Đăng bài viết mới</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-100">
        @csrf

        <!-- Tiêu đề -->
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700 mb-2">Tiêu đề</label>
            <input type="text" name="title" id="title"
                   class="w-full border px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Nhập tiêu đề bài viết">
        </div>

        <!-- Hình ảnh -->
        <div class="mb-4">
            <label for="image" class="block font-medium text-gray-700 mb-2">Hình ảnh</label>
            <input type="file" name="image" id="image"
                   class="w-full border px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Nội dung -->
        <div class="mb-6">
            <label for="content" class="block font-medium text-gray-700 mb-2">Nội dung</label>
            <textarea name="content" id="content" rows="10"
                      class="w-full border px-4 py-2 rounded-md focus:outline-none"
                      placeholder="Nhập nội dung bài viết"></textarea>
        </div>

        <!-- Danh mục -->
        <div class="mb-4">
            <label for="category_id" class="block font-medium text-gray-700 mb-2">Danh mục bài viết</label>
            <select name="category_id" id="category_id"
                    class="w-full border px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Chọn danh mục</option>
                @foreach($data_category as $category)
                    <option value="{{ $category->_id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"
                class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-md hover:bg-blue-700">
            Đăng bài
        </button>
    </form>
</div>
@endsection

@section('scripts')
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/donqck5zduws5nsg3v5a4s9qn9jrel9nqssvt42u5x54sdoe/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#content',
    height: 500,
    plugins: 'image link media table code lists',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code',
    language: 'vi',
    images_upload_url: '{{ route('tinymce.upload') }}',
    images_upload_credentials: true,
    setup: function (editor) {
        editor.on('init', function (e) {
            console.log('TinyMCE initialized.');
        });
    },
    images_upload_handler: function (blobInfo, success, failure) {
    return new Promise((resolve, reject) => {
        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        fetch('{{ route('tinymce.upload') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(result => {
            if (result && result.location) {
                success(result.location);
                resolve(result.location);
            } else {
                failure('Upload ảnh thất bại');
                reject('Upload ảnh thất bại');
            }
        })
        .catch(error => {
            console.error('Upload lỗi:', error);
            failure('Upload lỗi: ' + error.message);
            reject(error);
        });
    });
}

});
</script>
@endsection
