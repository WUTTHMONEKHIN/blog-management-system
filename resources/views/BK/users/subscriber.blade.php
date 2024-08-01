@extends('BK.master')
@section('title', 'Subscribers')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">All subscribers</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">subscribers</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <section class="section dashboard">
        <div class="row">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subscribers as $u)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $u->user->name }}</td>
                                                        <td><img class="rounded-circle" width="50px" height="50px"
                                                                src="{{ $u->user->image_url }}" alt="{{ $u->user->name }}">
                                                        </td>
                                                        <td>{{ $u->user->email }}</td>
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
