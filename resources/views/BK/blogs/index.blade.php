@extends('BK.master')
@section('title', 'Blogs')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All blogs</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>

                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">blogs</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div>
                <a href={{ route('admin.blogs.create') }} class="btn btn-dark mb-3">Create</a>
            </div>
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="card-body">
                                        <!-- Table with stripped rows -->
                                        <table class="table table-striped" style="width:100%" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th> No </th>
                                                    <th> Image </th>
                                                    <th> Title </th>
                                                    <th> Description </th>
                                                    <th> Tag Name </th>
                                                    <th> Category Name </th>
                                                    <th> Like Count </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blogs as $p)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img alt="{{ $p->title }}" src="{{ $p->image_url }}">
                                                        </td>
                                                        <td>{{ $p->title }}</td>

                                                        <td>{!! Illuminate\Support\Str::limit(strip_tags($p->description), 150) !!}</td>
                                                        <td>{{ $p->tag->name }}</td>
                                                        <td>{{ $p->category->name }}</td>
                                                        <td>{{ $p->likes_count }}</td>
                                                        <td> <a href="{{ route('admin.blogs.edit', $p->id) }}"
                                                                class="btn btn-sm mt-1  btn-inverse-info">Edit</a>
                                                            <a href="{{ route('admin.blogs.show', $p->id) }}"
                                                                class="btn btn-sm mt-1  btn-inverse-primary">Show</a>
                                                            <form action="{{ route('admin.blogs.destroy', $p->id) }}"
                                                                class="d-inline" method="POST">
                                                                @method('DELETE')@csrf
                                                                <input type="submit" value="Delete"
                                                                    class="btn btn-sm mt-1 btn-inverse-danger">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
