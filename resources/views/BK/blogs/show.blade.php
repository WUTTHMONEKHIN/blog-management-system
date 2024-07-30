@extends('BK.master')
@section('title', 'Blog')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All blogs</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">blogs</li>
                <li class="breadcrumb-item active">{{ $blog->name }}</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div>
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark mb-3">All blogs</a>
            </div>
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{ $blog->name }}</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-5">
                            <img alt="{{ $blog->name }}" class="image-thumbnail w-100" src="{{ $blog->image_url }}">
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Name</label>
                            <input readonly type="text" value="{{ $blog->title }}" class="form-control" name="name"
                                placeholder="Your Product Name" id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Tag</label>
                            <select readonly name="tag_id" id="inputState" class="form-select">
                                <option>{{ $blog->tag->name }}</option>
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Category</label>
                            <select readonly name="category_id" id="inputState" class="form-select">
                                <option>{{ $blog->category->name }}</option>
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Description</label>
                            <textarea name="description" id="mytextarea">{{ $blog->description }}</textarea>
                        </div>
                        <div class="text-center">
                            {{-- <button type="submit" class="btn btn-dark">Create</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.tiny.cloud/1/nw5s2ugafmzvdhmvt6zw4ewe8whqrub4od45ina5pos30805/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'placeholder',
            readonly: true,
            setup: function(editor) {
                editor.on('init', function() {
                    editor.getContainer().querySelector('.tox-editor-container').style.minHeight =
                        '200px';
                });
            },
            placeholder: 'Enter your content here...'
        });
    </script>
@endsection
