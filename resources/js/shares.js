$(document).ready(function(){
    $('.share').click(function(){
        var postId = $(this).data('id');
        var test = $('#test');
        var post = '';

        $.ajax({
            url: '/share',
            type: 'GET',
            data: {
                post_id: postId,
            },
            success: function(response) {
                console.log(response);
                post = response.get_post;

                test.html(post.id)
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
})