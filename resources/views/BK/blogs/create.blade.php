@extends('BK.master')
@section('title', 'Create Blog')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Admins</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">blogs</li>
                <li class="breadcrumb-item active">Create</li>
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

                    <h5 class="card-title">Create New Blog</h5>

                    <form method="POST" class="row g-3 needs-validation" novalidate
                        action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="inputNumber" class="col-sm-2 col-form-label">Blog Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" type="file"
                                accept="image/jpeg,image/png,image/jpg,image/gif" required>
                            <div class="invalid-feedback">Please upload your blog image.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Your Blog Name"
                                id="name" required>
                            <div class="invalid-feedback">Please enter your blog name.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Tag</label>
                            <select name="tag_id" id="inputState" class="form-select">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Category</label>
                            <select name="category_id" id="inputState" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please enter your price.</div>
                        </div>
                        <div class="col-md-12 mb-3 form-group has-validation">
                            <label for="exampleInputUsername1" class="text-dark">Blog Description</label>
                            <textarea name="description" id="mytextarea"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Create</button>
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
            placeholder: 'Enter your package description here ...'
        });
    </script>
@endsection
