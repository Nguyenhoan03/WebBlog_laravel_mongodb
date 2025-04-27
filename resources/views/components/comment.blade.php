<div class="p-4 bg-gray-100 rounded-lg shadow">
    @foreach ($comments->where('parent_comment_id', $parentId ?? '0') as $comment)
    @php
    $user = $data_auth_comment[$comment->user_id] ?? null;
    @endphp

    <div class="flex items-start mb-4">
    <img src="{{ $user?->image_avatar ? asset('images_avatar/' . $user->image_avatar) : asset('images_avatar/avatar.jpg') }}" class="w-10 h-10 rounded-full mr-3" alt="Avatar">
    <div class="flex-1">
        <div class="bg-white p-3 rounded border border-gray-200">
            <div class="flex justify-between items-center mb-1">
                <span class="font-semibold">{{ $user?->name ?? 'Ẩn danh' }}</span>
                <span class="text-sm text-gray-500">{{ $comment->created_at->format('d/m/Y') }}</span>
            </div>
            <p class="text-sm mb-2">{{ $comment->content }}</p>
            <div class="flex justify-between items-center gap-4 text-sm text-gray-500">
                <div class="flex gap-4">
                    <span>❤️ Thích (1)</span>
                    <button
                        type="button"
                        class="hover:underline reply-btn text-sm text-gray-500"
                        data-is-parent="{{ $comment->parent_comment_id == '0' }}">
                        Trả lời
                    </button>
                    <a href="#" class="hover:underline">Chia sẻ</a>
                </div>
            </div>
        </div>

        <!-- reply form đúng chỗ -->
        <div class="reply-form hidden mt-2 pl-4">
            <form action="/comment/{{$category}}/{{$slug}}" method="POST">
                @csrf
                <input type="hidden" name="category" value="{{$category}}">
                <input type="hidden" name="slug" value="{{$slug}}">
                <input type="hidden" name="parent_id" value="{{$comment->_id}}">
                <div class="flex items-start">
                    <img src="{{ $user?->image_avatar ? asset('images_avatar/' . $user->image_avatar) : asset('images_avatar/default-avatar.jpg') }}" class="w-9 h-9 rounded-full mr-3" alt="Avatar">
                    <div class="flex-1">
                        <textarea rows="2"
                            name="content"
                            class="w-full p-2 mb-2 border border-gray-300 rounded resize-none focus:outline-none focus:ring focus:border-blue-300 user_comment"
                            placeholder="Viết bình luận của bạn..."></textarea>
                        <div class="text-right">
                            <button type="submit"
                                class="bg-blue-600 text-white text-sm px-4 py-1 rounded hover:bg-blue-700 transition submit_user_comment">
                                Gửi
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- reply con -->
        @if ($comments->where('parent_comment_id', $comment->_id)->count() > 0)
            <div class="pl-6 mt-2 border-l border-gray-200">
                @include('components.comment', [
                    'comments' => $comments,
                    'data_auth_comment' => $data_auth_comment,
                    'parentId' => $comment->_id
                ])
            </div>
        @endif

    </div>
</div>

    @endforeach
</div>


<script>
   document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.reply-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const parent = this.closest('.bg-white')?.parentElement;
            if (!parent) return;

            const replyForm = parent.querySelector('.reply-form');
            if (replyForm) {
                replyForm.classList.toggle('hidden');
            }
        });
    });
});

</script>