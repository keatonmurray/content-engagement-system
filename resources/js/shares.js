$(document).ready(function(){
    $('.share').click(function(){
        var postId = $(this).data('id');
        var caption = $('#body').val();
        $.ajax({
            url: '/share',
            type: 'GET',
            data: {
                post_id: postId,
                body: caption,
            },
            success: function(response) {
                console.log(response);
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Post shared!",
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    location.reload();
                });

                caption.val('');

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
})