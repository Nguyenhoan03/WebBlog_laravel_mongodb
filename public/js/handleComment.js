function handle_comment(button) {
    const container = button.closest('.flex-1');
    const commentTextarea = container.querySelector('.user_comment');

    const commentContent = commentTextarea.value;
    const category = button.getAttribute('data-category');
    const slug = button.getAttribute('data-slug');
    const parentId = button.getAttribute('data-parent_id');
    if (!commentContent.trim()) {
        alert('Vui lòng nhập nội dung bình luận.');
        return;
    }

    fetch(`/comment/${category}/${slug}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            content: commentContent,
            parent_comment_id: parentId
        }),
        redirect: 'follow'
    })
        .then(async response => {
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                const data = await response.json();
                if (data.success == true) {
                    alert(data.message);
                    commentTextarea.value = '';
                } else {
                    alert('Có lỗi xảy ra: ' + (data.message || 'Không xác định'));
                }
            } else {
                alert('Có lỗi kết nối server.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi kết nối server.');
        });
    
}
