@extends('FE.master')
@section('title',"Blog's Category")
@section('content')
    <main class="blog-standard">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">Blogs</h1>
            <div class="row">
                <div class="col-md-8">
                    @foreach ($blogs as $b)
                        <article class="blog-post wow fadeInUp">
                            <img src="{{ $b->image_url }}" alt="{{ $b->title }}" class="post-thumbnail">
                            <p class="post-date">{{ $b->created_at->diffForHumans() }}</p>
                            <h4 class="post-title">{{ $b->title }}</h4>
                            <p class="post-excerpt">{!! $b->description !!}</p>
                            <a href="{{ url('blog/' . $b->slug) }}" class="post-permalink">READ MORE</a>
                        </article>
                    @endforeach
                    <div class="sidebar-widget wow fadeInUp">
                        {{ $blogs->links() }}
                    </div>
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
@endsection
