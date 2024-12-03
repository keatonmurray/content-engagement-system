$(document).ready(function() {
    $('.heart-icon').click(function() {
        var postId = $(this).data('id'); 
        var likeCountElement = $(this).find('.like-count');
        
        $.ajax({
            url: '/like',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                post_id: postId 
            },
            success: function(response) {
                likeCountElement.text(response.like_count);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
