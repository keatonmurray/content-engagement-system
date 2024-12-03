$(document).ready(function() {
    
    $('.comment-post').click(function() {
        var comment = $(this).closest('.comment-area').find('.comment').val();
        var postId = $(this).data('id'); 
        var commentTextArea = $('.comment'); 

        $.ajax({
            url: '/comment', 
            type: 'POST',   
            data: {
                comment: comment, 
                post_id: postId,
                _token: $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                console.log(response);

                fetchComments(postId);  
                fetchCommentCount(postId);

                commentTextArea.val('');

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    
    function fetchComments(postId) {
        var displayComments = $('.comments-section-' + postId);

        $.ajax({
            url: '/show-comment', 
            type: 'GET',
            data: {
                post_id: postId,  
            },
            success: function(response) {
                console.log(response); 

                var commentsHtml = ''; 
              
                response.forEach(function(comment) {
                    commentsHtml += '<div class="comment-list my-3 w-100">';
                    commentsHtml += '  <div class="d-flex">';
                    commentsHtml += '    <div class="profile">';
                    commentsHtml += '      <img src="images/user.png" class="rounded-circle user-profile" style="width: 50px; height: 50px; object-fit: cover;">';
                    commentsHtml += '    </div>';
                    commentsHtml += '    <div class="comments-section-' + postId + ' ms-3 d-flex flex-column" data-id="' + postId + '">';
                    commentsHtml += '      <p style="font-weight:600">' + comment.user.first_name + ' ' + comment.user.last_name + '</p>'; 
                    commentsHtml += '      <p style="margin-top: -18px">' + comment.comment + '</p>';  
                    commentsHtml += '    </div>';
                    commentsHtml += '  </div>';
                    commentsHtml += '</div>';
                });

                displayComments.html(commentsHtml); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function fetchCommentCount(postId) {
        var commentCountElement = $('.comment-icon[data-id="' + postId + '"] .comment-count');

        $.ajax({
            url: '/show-comment-count', 
            type: 'GET',
            data: {
                post_id: postId, 
            },
            success: function(response) {
                console.log(response);
                
                var updatedCommentCount = response.comment_count;
                console.log(updatedCommentCount);
                commentCountElement.text(updatedCommentCount); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $('.comment-icon').each(function() {
        var postId = $(this).data('id');
        fetchComments(postId); 
    });

    $('.comment-icon').each(function() {
        var postId = $(this).data('id'); 
        fetchCommentCount(postId);
    });

});
