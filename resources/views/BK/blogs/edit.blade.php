@extends('BK.master')
@section('title', 'Edit Blog')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All blogs</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>


                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">blogs</li>
                <li class="breadcrumb-item active">Edit {{ $blog->name }}</li>
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

                    <h5 class="card-title">Edit Product</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label for="inputNumber" class="col-sm-2 col-form-label text-dark">Blog Image</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="image" type="file"
                                accept="image/jpeg,image/png,image/jpg,image/gif">
                            <div class="invalid-feedback">Please upload your product image.</div>
                        </div>
                        <div class="col-sm-5">
                            <img alt="{{ $blog->name }}" class="image-thumbnail w-100" src="{{ $blog->image_url }}">
                        </div>

                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $blog->title }}"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your product name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Tag</label>
                            <select name="tag_id" id="inputState" class="form-select">
                                @foreach ($tags as $tag)
                                    <option {{ $tag->id == $blog->tag_id ? 'selected' : '' }} value="{{ $tag->id }}">
                                        {{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Category</label>
                            <select name="category_id" id="inputState" class="form-select">
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $blog->category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>

                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Description</label>
                            <textarea name="description" id="mytextarea">{{ $blog->description }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Update</button>
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
