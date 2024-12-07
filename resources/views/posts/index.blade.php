@extends('layout.head')
@section('content')
<section id="posts" class="d-flex justify-content-center vh-100 px-5 py-5">
    <div class="row">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex flex-column align-items-start">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <h6 class="text-muted mb-0">Recommendations</h6>
                        <img src="{{asset('images/dots.png')}}" alt="More" class="dots">
                    </div>
        
                    <ul class="list-unstyled mt-3 px-2 py-4 w-100">
                        <li class="mb-2 py-2 recommendation-list">
                            <a href="#" class="recommendation-item text-decoration-none text-dark hover-underline">
                                <img src="{{asset('images/post.png')}}" alt="icon" class="icon me-4">
                                Posts
                            </a>
                        </li>
                        <li class="mb-2 py-2 recommendation-list">
                            <a href="#" class="recommendation-item text-decoration-none text-dark hover-underline">
                                <img src="{{asset('images/video-sharing.png')}}" alt="icon" class="icon me-4">
                                Reels
                            </a>
                        </li>
                        <li class="mb-2 py-2 recommendation-list">
                            <a href="#" class="recommendation-item text-decoration-none text-dark hover-underline">
                                <img src="{{asset('images/reels.png')}}" alt="icon" class="icon me-4">
                                Content
                            </a>
                        </li>
                        <li class="mb-2 py-2 recommendation-list">
                            <a href="#" class="recommendation-item text-decoration-none text-dark hover-underline">
                                <img src="{{asset('images/computer-game.png')}}" alt="icon" class="icon me-4">
                                Games
                            </a>
                        </li>
                        <li class="mb-2 py-2 recommendation-list">
                            <a href="#" class="recommendation-item text-decoration-none text-dark hover-underline">
                                <img src="{{asset('images/running.png')}}" alt="icon" class="icon me-4">
                                Sports
                            </a>
                        </li>
                        <li class="mb-2 py-2 recommendation-list">
                            <a href="#" class="recommendation-item text-decoration-none text-dark hover-underline">
                                <img src="{{asset('images/instagram-live.png')}}" alt="icon" class="icon me-4">
                                Live Streaming
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-8">
            <div class="card">
                <form action="{{route('post_status')}}" method="POST">
                    @csrf
                    <div class="card-body shadow-sm">
                        <div class="d-flex gap-4 mb-3">
                            <ul class="nav list-unstyled d-flex gap-3 mb-0">
                                <li class="status">
                                    <a href="#" class="text-decoration-none text-dark">Status</a>
                                </li>
                                <li class="status">
                                    <a href="#" class="text-decoration-none text-dark">Photos</a>
                                </li>
                                <li class="status">
                                    <a href="#" class="text-decoration-none text-dark">Videos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mt-3">
                            <img src="{{asset('images/user.png')}}" alt="Profile" class="user">
                            <textarea class="form-control mb-3 status-textarea" rows="3" name="body" placeholder="What's on your mind?"></textarea>
                        </div>
                        <hr>
                
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-3">
                                <button class="btn btn-action-custom btn-sm">
                                    <img src="{{asset('images/group.png')}}" alt="Action" class="action me-2">
                                    People
                                </button>
                                <button class="btn btn-action-custom btn-sm">
                                    <img src="{{asset('images/location.png')}}" alt="Action" class="action me-2">
                                    Check In
                                </button>
                                <button class="btn btn-action-custom btn-sm">
                                    <img src="{{asset('images/happy.png')}}" alt="Action" class="action me-2"> 
                                    Mood
                                </button>
                            </div>
                            <button class="btn btn-custom btn-sm" type="submit">
                                <i class="fa-solid fa-share me-1"></i>
                                Share
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if($shared_posts)
                @foreach($shared_posts as $post)
                    <div class="card my-5 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div class="d-flex align-items-center">
                                    <div class="profile">
                                        <img src="{{asset('images/user.png')}}" alt="Profile Picture" class="rounded-circle user-profile">
                                    </div>
                                    <div class="profile-info ms-2">
                                        <h6 class="profile-name mb-0">{{$post->user->first_name}} {{$post->user->last_name}} <small class="activity">shared a <a href="">photo</a></small></h6>
                                        <p class="text-muted mb-0 small" style="font-size:12px">6 hours ago</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="{{asset('images/dots.png')}}" alt="More" class="dots">
                                </div>
                            </div>
                            <div class="post-content my-4">
                                <p class="content-body-font">
                                    {{$post->body}}
                                </p>
                                <figure class="d-flex align-items-center justify-content-center my-3">
                                    <img src="{{ asset('images/beach.jpg') }}" class="img-fluid post-image" alt="Photo">
                                </figure>
                                <div class="d-flex my-2">
                                    <div class="d-flex share-post-heart heart-icon" data-id="{{ $post->fk_post_id }}">
                                        <img src="{{asset('images/heart.png')}}" alt="" class="action-icon me-1">
                                        <p class="text-small like-count">{{ $post->likes->first()->like_count ?? 0 }}</p>
                                    </div>
                                    <div class="d-flex comment comment-icon" data-id="{{ $post->id }}">
                                        <img src="{{asset('images/chat-bubble.png')}}" alt="" class="action-icon me-1 ms-3">
                                        <p class="text-small comment-count"></p>
                                    </div>
                                    <div class="d-flex share-post-modal share-icon" data-bs-toggle="modal" data-bs-target="#display-share-post-modal">
                                        <img src="{{ asset('images/share.png') }}" class="action-icon me-1 ms-3">
                                        <p class="text-small">3</p>
                                    </div>
                                    
                                    <div class="modal fade" id="display-share-post-modal" tabindex="-1" aria-labelledby="display-share-post-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="display-share-post-modalLabel">Share Post</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="d-flex mt-3">
                                                    <img src="{{asset('images/user.png')}}" alt="Profile" class="user">
                                                    <textarea class="form-control mb-3 status-textarea" id="body" name="body" rows="3" placeholder="What do you think about this post?"></textarea>
                                                </div>
                                                <hr>
                                        
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex gap-3">
                                                        <button class="btn btn-action-custom btn-sm">
                                                            <img src="{{asset('images/group.png')}}" alt="Action" class="action me-2">
                                                            People
                                                        </button>
                                                        <button class="btn btn-action-custom btn-sm">
                                                            <img src="{{asset('images/location.png')}}" alt="Action" class="action me-2">
                                                            Check In
                                                        </button>
                                                        <button class="btn btn-action-custom btn-sm">
                                                            <img src="{{asset('images/happy.png')}}" alt="Action" class="action me-2"> 
                                                            Mood
                                                        </button>
                                                    </div>
                                                    <button class="btn btn-custom btn-sm share" data-id= {{$post->fk_post_id}}>
                                                        <i class="fa-solid fa-share me-1"></i>
                                                        Share
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                           <div class="comments-section-{{$post->id}}" data-id="{{ $post->id }}"></div>
                            <div class="comment-area">
                                <div class="d-flex my-3 w-100">
                                    <div class="d-flex align-items-center w-100">
                                        <div class="profile">
                                            <img src="{{ asset('images/user.png') }}" alt="User Profile Picture" class="rounded-circle user-profile"style="width: 35px; height: 35px; object-fit: cover;">
                                        </div>
                                        <div class="comment-field ms-3 flex-grow-1">
                                            <textarea class="form-control comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="comment-post float-end btn btn-sm btn-custom" data-id="{{ $post->id }}">
                                    <i class="fa-regular fa-paper-plane me-2"></i>
                                    Post
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            @if($posts)
                @foreach($posts as $post)
                    <div class="card my-5 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div class="d-flex align-items-center">
                                    <div class="profile">
                                        <img src="{{asset('images/user.png')}}" alt="Profile Picture" class="rounded-circle user-profile">
                                    </div>
                                    <div class="profile-info ms-2">
                                        <h6 class="profile-name mb-0">{{$post->user->first_name}} {{$post->user->last_name}} <small class="activity">shared a <a href="">photo</a></small></h6>
                                        <p class="text-muted mb-0 small" style="font-size:12px">6 hours ago</p>
                                    </div>
                                </div>
                                <div>
                                    <img src="{{asset('images/dots.png')}}" alt="More" class="dots">
                                </div>
                            </div>
                            <div class="post-content my-4">
                                <p class="content-body-font">
                                    {{$post->body}}
                                </p>
                                <figure class="d-flex align-items-center justify-content-center my-3">
                                    <img src="{{ asset('images/beach.jpg') }}" class="img-fluid post-image" alt="Photo">
                                </figure>
                                <div class="d-flex my-2">
                                    <div class="d-flex heart heart-icon" data-id="{{ $post->id }}">
                                        <img src="{{asset('images/heart.png')}}" alt="" class="action-icon me-1">
                                        <p class="text-small like-count">{{ $post->likes->first()->like_count ?? 0 }}</p>
                                    </div>
                                    <div class="d-flex comment comment-icon" data-id="{{ $post->id }}">
                                        <img src="{{asset('images/chat-bubble.png')}}" alt="" class="action-icon me-1 ms-3">
                                        <p class="text-small comment-count"></p>
                                    </div>
                                    
                                    <div class="d-flex share-post-modal share-icon" data-bs-toggle="modal" data-bs-target="#display-share-post-modal">
                                        <img src="{{ asset('images/share.png') }}" class="action-icon me-1 ms-3">
                                        <p class="text-small">3</p>
                                    </div>
                                    
                                    <div class="modal fade" id="display-share-post-modal" tabindex="-1" aria-labelledby="display-share-post-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="display-share-post-modalLabel">Share Post</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="d-flex mt-3">
                                                    <img src="{{asset('images/user.png')}}" alt="Profile" class="user">
                                                    <textarea class="form-control mb-3 status-textarea" id="body" rows="3" placeholder="What do you think about this post?"></textarea>
                                                </div>
                                                <hr>
                                        
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex gap-3">
                                                        <button class="btn btn-action-custom btn-sm">
                                                            <img src="{{asset('images/group.png')}}" alt="Action" class="action me-2">
                                                            People
                                                        </button>
                                                        <button class="btn btn-action-custom btn-sm">
                                                            <img src="{{asset('images/location.png')}}" alt="Action" class="action me-2">
                                                            Check In
                                                        </button>
                                                        <button class="btn btn-action-custom btn-sm">
                                                            <img src="{{asset('images/happy.png')}}" alt="Action" class="action me-2"> 
                                                            Mood
                                                        </button>
                                                    </div>
                                                    <button class="btn btn-custom btn-sm share" data-id= {{$post->id}}>
                                                        <i class="fa-solid fa-share me-1"></i>
                                                        Share
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                           <div class="comments-section-{{$post->id}}" data-id="{{ $post->id }}"></div>
                            <div class="comment-area">
                                <div class="d-flex my-3 w-100">
                                    <div class="d-flex align-items-center w-100">
                                        <div class="profile">
                                            <img src="{{ asset('images/user.png') }}" alt="User Profile Picture" class="rounded-circle user-profile"style="width: 35px; height: 35px; object-fit: cover;">
                                        </div>
                                        <div class="comment-field ms-3 flex-grow-1">
                                            <textarea class="form-control comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="comment-post float-end btn btn-sm btn-custom" data-id="{{ $post->id }}">
                                    <i class="fa-regular fa-paper-plane me-2"></i>
                                    Post
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@endsection