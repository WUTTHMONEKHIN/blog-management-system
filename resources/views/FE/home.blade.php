@extends('FE.master')
@section('title','Home')
@section('content')
    <section>
        <div class="container wow fadeIn">
            <div id="oleezLandingCarousel" class="oleez-landing-carousel carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/FE/assets/images/Banner_1@2x.jpg') }}" alt="First slide" class="w-100">
                        <div class="carousel-caption">
                            <h2 data-animation="animated fadeInRight"><span>Remarkable</span></h2>
                            <h2 data-animation="animated fadeInRight"><span>Digital blog</span></h2>
                        </div>
                    </div>
                    {{-- <div class="carousel-item">
                        <img src="assets/images/Banner_2@2x.jpg" alt="Second slide" class="w-100">
                        <div class="carousel-caption">
                            <h2 data-animation="animated fadeInRight"><span>Remarkable</span></h2>
                            <h2 data-animation="animated fadeInRight"><span>Digital agency</span></h2>
                            <a href="#!" class="carousel-item-link" data-animation="animated fadeInRight">EXPLORE
                                PROJECT</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/Banner_3@2x.jpg" alt="Third slide" class="w-100">
                        <div class="carousel-caption">
                            <h2 data-animation="animated fadeInRight"><span>Remarkable</span></h2>
                            <h2 data-animation="animated fadeInRight"><span>Digital agency</span></h2>
                            <a href="#!" class="carousel-item-link" data-animation="animated fadeInRight">EXPLORE
                                PROJECT</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/Banner_4@2x.jpg" alt="Fourth slide" class="w-100">
                        <div class="carousel-caption">
                            <h2 data-animation="animated fadeInRight"><span>Remarkable</span></h2>
                            <h2 data-animation="animated fadeInRight"><span>Digital agency</span></h2>
                            <a href="#!" class="carousel-item-link" data-animation="animated fadeInRight">EXPLORE
                                PROJECT</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="oleez-landing-section oleez-landing-section-news oleez-landing-section-projects">
        <div class="container">
            <div class="oleez-landing-section-content">
                <h2 class="section-title wow fadeInUp">Recent Blogs<a href="{{ url('blogs') }}"
                        class="all-projects-link">View All</a>
                </h2>
                <div class="row">
                    @foreach ($blogs as $b)
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <div class="news-card news-card-1 wow flipInY">
                                <div class="card-body">
                                    <img class="image-thumbnail w-100 mb-2" alt="{{ $b->title }}"
                                        src="{{ $b->image_url }}">
                                    <div class="author-info media">
                                        <div class="media-body">
                                            {{-- <p class="news-post-date">{{ $b->created_at->format('d F Y') }}</p> --}}
                                            <p class="news-post-date"> {{ $b->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="post-meta">
                                        <h6 class="post-category">{{ $b->title }}</h6>
                                    </div>
                                    <h5 class="post-title">{!! Illuminate\Support\Str::limit(strip_tags($b->description), 50) !!}</h5>
                                    <a href="{{ url('blog/' . $b->slug) }}" class="post-permalink">Read more </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
