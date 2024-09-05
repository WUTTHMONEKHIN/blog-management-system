@extends('FE.master')
@section('title', 'Blogs')
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
                            <span><i class="{{ $like_counts[$b->id] != 0 ? 'fa-solid' : 'fa-regular' }} fa-heart fa-lg"></i>
                                {{ $like_counts[$b->id] }}</span>
                            <span>
                                <i class="ml-4 mt-2 fa-solid fa-share-nodes fa-lg"
                                    onclick="copyToClipboard('{{ $b->slug }}')" style="cursor: pointer;"></i>
                            </span>
                            <h4 class="mt-3 post-title">{{ $b->title }}</h4>
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
    <script>
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
