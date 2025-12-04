<x-layout>
    <x-slot:title>{{ $post->title . ' - Writely' }}</x-slot:title>
    <style>
        .show-post .card img {
            border-radius: 20px
        }
        
        .author-section img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        @media (min-width:768px) {
            .author-and-comments-section {
                position: sticky;
                top: 83px;
            }
            
            .author-section {
                margin-bottom: 10px
            }
            
            .comments-section .card-body {
                max-height: 450px;
                /* Sesuaikan tinggi maksimal */
                overflow-y: auto;
                /* Aktifkan scroll vertikal */
            }
            
            .show-post .card {
                margin-bottom: 0
            }
        }
    </style>
    <div class="row">
        <div class="col-lg-8">
            <div class="show-post">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span class="">
                                <h2 class="">{{ $post->title }}</h2>
                                <h6 class="badge text-bg-info" style="color: white">
                                    {{ $post->category->name }}
                                </h6>
                                {{-- <a href="{{ route('profile', $post->user->username) }}" class="d-flex">
                                    <span>
                                        <div
                                        class="profile me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                        @if ($post->user->profile_picture && file_exists(public_path('img/profilePicture/' . $post->user->profile_picture)))
                                        <img src="{{ asset('img/profilePicture/' . $post->user->profile_picture) }}"
                                        alt=""
                                        class="rounded-circle border-4 border-white-color-40">
                                        @endif
                                    </div>
                                </span>
                                <span class="my-auto ms-1">
                                    <h5 class="mt-0 mb-0">{{ $post->user->name }}</h5>
                                    <p class="mb-0 mt-0 text-body" style="text-decoration: none">
                                        {{ '@' . $post->user->username }}</p>
                                    </span>
                                </a> --}}
                            </span>
                            <span class="" align="right">
                                @if (Auth::check())
                                <button class="btn btn-outline-primary mb-1">
                                    <i class="bi bi-star"></i>
                                </button>
                                {{-- <button class="btn btn-outline-primary mb-1 like-btn" data-post-id="{{ $post->id }}">
                                    <span class="like-text">{{ $post->isLikedByUser() ? 'Unlike' : 'Like' }}</span>
                                </button> --}}
                                <button class="btn btn-outline-primary mb-1 like-btn" data-post-id="{{ $post->id }}">
                                    <i class="bi {{ $post->isLikedByUser() ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up' }} like-icon"></i>
                                </button>
                                @endif
                                @if (Auth::check() && Auth::user()->id == $post->user_id)
                                <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-outline-primary">Edit</a>
                                @endif
                                <div align="right" class="mt-3">
                                    <div class="d-flex gap-3">
                                        <i class="bi bi-hand-thumbs-up "></i>
                                        <span class="like-count">{{ $post->likes->count() }}</span>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($post->thumbnail && file_exists(public_path('img/postThumbnail/' . $post->thumbnail)))
                        <img src="{{ asset('img/postThumbnail/' . $post->thumbnail) }}" class="w-100 mb-4"
                        alt="...">
                        @endif
                        <div class="ckeditor-container">{!! str_replace("\n", '<br>', e($post->content)) !!}
                        </div>
                    </div>
                    <div class="card-footer" align="center">
                        <p>Created at: {{ $post->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-lg-4">
            <div class="author-and-comments-section">
                <div class="card author-section shadow">
                    <div class="card-header">
                        <h5>Author</h5>
                    </div>
                    <div class="card-body">
                        @php
                        $user = $post->user;
                        @endphp
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('profile', $user->username) }}" style="color: inherit; text-decoration: none;">
                                <span class="d-flex">
                                    <span>
                                        <div class="me-2">
                                            <img src="{{ asset('img/profilePicture/' . ($user->profile_picture && file_exists(public_path('img/profilePicture/' . $user->profile_picture)) ? $user->profile_picture : 'default.jpg')) }}"
                                            alt="" class="rounded-circle  border-4 border-white-color-40">
                                        </div>
                                    </span>
                                    <span class="my-auto">
                                        <h6 class="mt-0 mb-0">{{ $user->name }}</h6>
                                        <p class="mb-0 mt-0 text-body" style="text-decoration: none">
                                            {{ '@' . $user->username }}
                                        </p>
                                    </span>
                                </span>
                            </a>
                            <span class="my-auto">
                                <div align="right">
                                    @if (Auth::check() && Auth::id() !== $user->id)
                                    <button class="btn btn-outline-primary follow-btn" data-user-id="{{ $user->id }}">
                                        <span
                                        class="follow-text">{{ $user->isFollowedByUser() ? 'Unfollow' : 'Follow' }}</span>
                                    </button>
                                    @elseif (Auth::check() && Auth::id() === $user->id)
                                    <p class="my-auto text-muted">You</p>
                                    @endif
                                </div>
                                <div class="mt-1" align="right">
                                    <i>
                                        <span class="follower-count">{{ count($user->followers) }}</span>
                                        follower
                                    </i>
                                </div>
                            </span>
                        </div>
                    </div>
                    
                    {{-- <x-cards.user :user="$user" /> --}}
                </div>
                {{-- comment --}}
                <!-- Input Komentar -->
                <div class="card comments-section shadow">
                    <div class="card-header">
                        <h5>Comments</h5>
                    </div>
                    <div class="card-body">
                        <x-comments :post="$post" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- like toggle --}}
    {{-- <script>
        $(document).ready(function() {
        $('.like-btn').on('click', function() {
        let button = $(this);
        let postId = button.data('post-id');
        
        let likeCountSpan = button.closest('.card').find('.like-count');
        
        $.ajax({
        url: "{{ route('like.toggle') }}",
        method: "POST",
        data: {
        post_id: postId,
        _token: "{{ csrf_token() }}"
        },
        success: function(response) {
        button.find('.like-text').text(response.status === 'liked' ? 'Unlike' : 'Like');
        likeCountSpan.text(response.likes);
        },
        error: function(xhr) {
        if (xhr.status === 401) {
        // Redirect ke halaman login jika belum login
        window.location.href = "{{ route('login') }}";
        }
        }
        });
        });
        });
    </script> --}}
    
    <script>
        $(document).ready(function() {
            $('.like-btn').on('click', function() {
                let button = $(this);
                let postId = button.data('post-id');
                let likeCountSpan = button.closest('.card').find('.like-count');
                let icon = button.find('.like-icon'); // Ambil elemen icon
                
                $.ajax({
                    url: "{{ route('like.toggle') }}",
                    method: "POST",
                    data: {
                        post_id: postId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Ubah icon berdasarkan status like
                        if (response.status === 'liked') {
                            icon.removeClass('bi-hand-thumbs-up').addClass('bi-hand-thumbs-up-fill');
                        } else {
                            icon.removeClass('bi-hand-thumbs-up-fill').addClass('bi-hand-thumbs-up');
                        }
                        likeCountSpan.text(response.likes);
                    },
                    error: function(xhr) {
                        if (xhr.status === 401) {
                            window.location.href = "{{ route('login') }}";
                        }
                    }
                });
            });
        });
    </script>
</x-layout>
