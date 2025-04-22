@extends('layouts.app')

@section('title', 'Đăng bài viết')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Đăng bài viết mới</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 bg-gray-100" >
        @csrf

        <!-- Tiêu đề -->
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700 mb-2">Tiêu đề</label>
            <input type="text" name="title" id="title"
                   class="w-full border px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Nhập tiêu đề bài viết">
        </div>
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700 mb-2">Hình ảnh</label>
            <input type="file" name="image" id="title"
                   class="w-full border px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Nhập tiêu đề bài viết">
        </div>
       
        <!-- Nội dung -->
        <div class="mb-6">
            <label for="content" class="block font-medium text-gray-700 mb-2">Nội dung</label>
            <textarea name="content" id="editor" rows="10"
          class="w-full border px-4 py-2 rounded-md focus:outline-none"
          placeholder="Nhập nội dung bài viết"></textarea>
        </div>
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700 mb-2">Danh mục bài viết</label>
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


<!-- CKEditor 5 Full Featured Build CDN -->
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    class MyUploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        upload() {
            return this.loader.file
                .then(file => new Promise((resolve, reject) => {
                    const data = new FormData();
                    data.append('upload', file);
                    data.append('_token', '{{ csrf_token() }}'); // Laravel CSRF

                    fetch('{{ route('ckeditor.upload') }}', {
                        method: 'POST',
                        body: data
                    })
                    .then(response => response.json())
                    .then(res => {
                        if (res.url) {
                            resolve({ default: res.url });
                        } else {
                            reject('Upload failed');
                        }
                    })
                    .catch(() => reject('Upload error'));
                }));
        }

        abort() {}
    }

    function MyCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader);
        };
    }

    ClassicEditor
        .create(document.querySelector('#editor'), {
            extraPlugins: [ MyCustomUploadAdapterPlugin ],
            language: 'vi',
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'bulletedList', 'numberedList', '|',
                'link', 'blockQuote', 'insertTable', 'imageUpload', '|',
                'undo', 'redo'
            ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection


