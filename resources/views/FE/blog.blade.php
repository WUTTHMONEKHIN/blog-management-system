@extends('FE.master')
@section('title', 'Blog')
@section('content')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">Blog</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="post-featured-image">
                        <div class="post-info">
                            <p class="post-date">{{ $blog->created_at->diffForHumans() }}</p>
                            @php
                                $userLiked = $blog->likes()->where('user_id', auth()->id())->exists();
                            @endphp
                            <div class="post-likes">
                                <i class="{{ $userLiked ? 'fa-solid' : 'fa-regular' }} fa-heart fa-lg"
                                    id="like-icon-{{ $blog->slug }}" onclick="likeBlog('{{ $blog->slug }}', this)"
                                    style="cursor: pointer;"></i>
                                <span id="like-count-{{ $blog->slug }}">{{ $like_count }}</span>
                                <i class="ml-4 fa-solid fa-share-nodes fa-lg"
                                    onclick="copyToClipboard('{{ $blog->slug }}')" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="post-content wow fadeInUp">
                        <h4>{{ $blog->title }}</h4>
                        <p>{!! $blog->description !!}</p>
                    </div>
                    <div class="post-tags wow fadeInUp">
                        <a href="{{ url('blogs/category/' . $blog->category->slug) }}"
                            class="post-tag">{{ $blog->category->name }}</a>
                        <a href="{{ url('blogs/tag/' . $blog->tag->slug) }}" class="post-tag">{{ $blog->tag->name }}</a>
                    </div>
                    <section class="oleez-landing-section-testimonials">
                        <div class="container">
                            <div class="oleez-landing-section-content">

                                <div class="d-md-flex justify-content-between wow fadeInUp">
                                    <div class="testimonial-section-content">
                                        <h2 class="section-title">What our clients say</h2>
                                    </div>
                                    <div class="testimonial-carousel-navbtn-wrapper"></div>
                                </div>
                                <div class="landing-testimonial-carousel wow fadeInUp">
                                    @foreach ($comments as $c)
                                        <div class="landing-testimonial-card">
                                            <div class="media">
                                                <img src="{{ $c->user->image_url }}" alt="{{ $c->user->name }}"
                                                    class="testimonial-card-img">
                                                <div class="media-body">
                                                    <small
                                                        style="color: #f7b500">{{ $c->created_at->diffForHumans() }}</small>
                                                    <p class="testimonial-card-content">
                                                        {{ $c->comment }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    @auth
                        <div class="comment-section wow fadeInUp">
                            <h5 class="section-title">Leave a comment</h5>
                            <form action="{{ route('storeComment') }}" method="POST" class="oleez-comment-form">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="slug" id="slug" value="{{ $blog->slug }}">
                                    <div class="form-group col-12">
                                        <label for="comment">*Message</label>
                                        <textarea name="comment" id="comment" rows="10" class="oleez-textarea" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endauth
                </div>
                <div class="col-md-4">
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Tags</h5>
                        <div class="widget-content">
                            @foreach ($tags as $t)
                                <a href="{{ url('blogs/tag/' . $t->slug) }}" class="post-tag">{{ $t->name }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Categories</h5>
                        <div class="widget-content">
                            @foreach ($categories as $c)
                                <a href="{{ url('blogs/category/' . $c->slug) }}" class="post-tag">{{ $c->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function likeBlog(blogSlug, iconElement) {
            let likeCountElement = document.getElementById('like-count-' + blogSlug);
            let likeIcon = iconElement;
            axios.post('/blog/' + blogSlug + '/like')
                .then(function(response) {
                    likeCountElement.innerText = response.data.like_count;

                    if (response.data.liked) {
                        likeIcon.classList.remove('fa-regular');
                        likeIcon.classList.add('fa-solid');

                        Toastify({
                            text: "Liked the blog!",
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function() {}
                        }).showToast();
                    } else {
                        likeIcon.classList.remove('fa-solid');
                        likeIcon.classList.add('fa-regular');
                        Toastify({
                            text: "Unliked the blog!",
                            duration: 3000,
                            newWindow: true,
                            close: true,
                            gravity: "top",
                            position: "left",
                            stopOnFocus: true,
                            style: {
                                background: "linear-gradient(to right, #ff5f6d, #ffc371)",
                            },
                            onClick: function() {}
                        }).showToast();
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        }

        function copyToClipboard(slug) {
            const url = window.location.origin + '/blog/' + slug;

            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            Toastify({
                text: "Copied",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "left",
                stopOnFocus: true,
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {}
            }).showToast();
        }
    </script>
@endsection
