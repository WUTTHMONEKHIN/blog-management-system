@extends('FE.master')
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
                <div class="oleez-landing-section-verticals wow fadeIn">
                    <span class="number">01</span> <img src="{{ asset('assets/FE/assets/images/Logo_2.svg') }}"
                        alt="ollez" height="12px">
                </div>
                <h2 class="section-title wow fadeInUp">Recent Blogs<a href="#!" class="all-projects-link">View All</a>
                </h2>
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="news-card news-card-1 wow fadeInUp">
                            <div class="card-body">
                                <div class="author-info media">
                                    <img src="assets/images/Team_1_Copy_2@2x.jpg" alt="author" class="author-avatar">
                                    <div class="media-body">
                                        <h6 class="author-name">Posted by Colabrio</h6>
                                        <p class="news-post-date">July 5, 2019</p>
                                    </div>
                                </div>
                                <div class="post-meta">
                                    <span class="post-category">Digital Strategy</span> 4 min read
                                </div>
                                <h5 class="post-title">The Ultimate Guide to Make Your WordPress Journal.</h5>
                                <a href="#!" class="post-permalink">Read more </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="news-card news-card-2 wow fadeInUp">
                            <div class="card-body">
                                <div class="author-info media">
                                    <img src="assets/images/Team_2_Copy_2@2x.jpg" alt="author" class="author-avatar">
                                    <div class="media-body">
                                        <h6 class="author-name">Posted by Stormie</h6>
                                        <p class="news-post-date">July 5, 2019</p>
                                    </div>
                                </div>
                                <div class="post-meta">
                                    <span class="post-category">Personal</span> 4 min read
                                </div>
                                <h5 class="post-title">The Highly Contemporary UI/UX Design from a london.</h5>
                                <a href="#!" class="post-permalink">Read more </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="news-card news-card-3 wow fadeInUp">
                            <div class="card-body">
                                <div class="author-info media">
                                    <img src="assets/images/Team_3_Copy_2@2x.jpg" alt="author" class="author-avatar">
                                    <div class="media-body">
                                        <h6 class="author-name">Posted by Angela</h6>
                                        <p class="news-post-date">July 5, 2019</p>
                                    </div>
                                </div>
                                <div class="post-meta">
                                    <span class="post-category">Personal</span> 4 min read
                                </div>
                                <h5 class="post-title">A Color Exercise for our Brand’s Illustration </h5>
                                <a href="#!" class="post-permalink">Read more </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
