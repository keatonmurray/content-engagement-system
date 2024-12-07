$(document).ready(function(){
    $('.share').click(function(){
        var postId = $(this).data('id');
        var getPost = '';
        var sharedPost = '';

        $.ajax({
            url: '/share',
            type: 'GET',
            data: {
                post_id: postId,
            },
            success: function(response) {
                console.log(response);
                getPost = response.data;

                sharedPost = `
                <div class="card my-5 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex align-items-center">
                                <div class="profile">
                                    <img src="/images/user.png" alt="Profile Picture" class="rounded-circle user-profile">
                                </div>
                                <div class="profile-info ms-2">
                                    <h6 class="profile-name mb-0">${getPost.fk_user_id} <small class="activity">shared a <a href="#">photo</a></small></h6>
                                    <p class="text-muted mb-0 small" style="font-size:12px">${new Date(getPost.created_at).toLocaleString()}</p>
                                </div>
                            </div>
                            <div>
                                <img src="/images/dots.png" alt="More" class="dots">
                            </div>
                        </div>
                        <div class="post-content my-4">
                            <p class="content-body-font">
                                ${getPost.body}
                            </p>
                            ${
                                getPost.image
                                    ? `<figure class="d-flex align-items-center justify-content-center my-3">
                                        <img src="${getPost.image}" class="img-fluid post-image" alt="Photo">
                                       </figure>`
                                    : ''
                            }
                            <div class="d-flex my-2">
                                <div class="d-flex heart heart-icon" data-id="${getPost.id}">
                                    <img src="/images/heart.png" alt="" class="action-icon me-1">
                                    <p class="text-small like-count">0</p>
                                </div>
                                <div class="d-flex comment comment-icon" data-id="${getPost.id}">
                                    <img src="/images/chat-bubble.png" alt="" class="action-icon me-1 ms-3">
                                    <p class="text-small comment-count"></p>
                                </div>
                                <div class="d-flex share share-icon" data-id="${getPost.id}">
                                    <img src="/images/share.png" alt="" class="action-icon me-1 ms-3">
                                    <p class="text-small">3</p>
                                </div>
                            </div>
                        </div>
                        <div class="comments-section-${getPost.id}" data-id="${getPost.id}"></div>
                        <div class="comment-area">
                            <div class="d-flex my-3 w-100">
                                <div class="d-flex align-items-center w-100">
                                    <div class="profile">
                                        <img src="/images/user.png" alt="User Profile Picture" class="rounded-circle user-profile" style="width: 35px; height: 35px; object-fit: cover;">
                                    </div>
                                    <div class="comment-field ms-3 flex-grow-1">
                                        <textarea class="form-control comment"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="comment-post float-end btn btn-sm btn-custom" data-id="${getPost.id}">
                                <i class="fa-regular fa-paper-plane me-2"></i>
                                Post
                            </button>
                        </div>
                    </div>
                </div>
            `;

            // $('#test').html(sharedPost);

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
})