$(document).ready(function() {
    $('.heart').click(function() {
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

    $('.share-post-heart').click(function() {
        var fkLikeId = $(this).data('id');
        var likeCountElement = $(this).find('.like-count');
        
        $.ajax({
            url: '/like',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                fk_like_id: fkLikeId 
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
