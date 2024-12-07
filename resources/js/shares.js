$(document).ready(function(){
    $('.share').click(function(){
        var postId = $(this).data('id');

        $.ajax({
            url: '/share',
            type: 'GET',
            data: {
                post_id: postId,
            },
            success: function(response) {
                console.log(response);

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
})