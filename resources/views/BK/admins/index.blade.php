@extends('BK.master')
@section('title', 'Admins')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All Admins</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Admins</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div>
                <a href={{ route('admin.admins.create') }} class="btn btn-dark mb-3">Create</a>
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
                                        <table class="table display" style="width:100%" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th> No </th>
                                                    <th> Name </th>
                                                    <th> Photo </th>
                                                    <th> Email </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $u)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $u->name }}</td>
                                                        <td><img class="rounded-circle" width="50px" height="50px"
                                                                src="{{ $u->image_url }}" alt="{{ $u->name }}"></td>
                                                        <td>{{ $u->email }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.admins.show', $u->id) }}"
                                                                class="btn btn-sm btn-inverse-primary">Show</a>
                                                            <form action="{{ route('admin.admins.destroy', $u->id) }}"
                                                                class="d-inline" method="POST">
                                                                @method('DELETE')@csrf
                                                                <input type="submit" value="Delete"
                                                                    class="btn btn-sm btn-inverse-danger">
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
