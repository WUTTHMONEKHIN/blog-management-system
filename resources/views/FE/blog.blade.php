@extends('FE.master')
@section('content')
    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">Blog</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="post-featured-image">
                        <p class="post-date">{{ $blog->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="post-content wow fadeInUp">
                        <h4>{{ $blog->title }}</h4>
                        <p>{!! $blog->description !!}</p>
                    </div>
                    <div class="post-tags wow fadeInUp">
                        <a href="#!" class="post-tag">{{ $blog->category->name }}</a>
                        <a href="#!" class="post-tag">{{ $blog->tag->name }}</a>
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
                            <form action="POST" class="oleez-comment-form">
                                <div class="row">
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
                                <a href="#!" class="post-tag">{{ $t->name }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Categories</h5>
                        <div class="widget-content">
                            @foreach ($categories as $c)
                                <a href="#!" class="post-tag">{{ $c->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
