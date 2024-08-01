@extends('BK.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-success font-weight-bold">{{ $blogs }}</h2>
                        <i class="mdi mdi-blogger mdi-18px text-dark"></i>
                    </div>
                </div>
                <canvas id="newClient"></canvas>
                <div class="line-chart-row-title"><a class="hh" href="{{ url('admin/blogs') }}"
                        style="color: #000; text-decoration: unset">MY BLOGS</a></div>
            </div>
        </div>
        <div class="col-lg-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-danger font-weight-bold">{{ $categories }}</h2>
                        <i class="mdi mdi-apple-keyboard-command mdi-18px text-dark"></i>
                    </div>
                </div>
                <canvas id="allProducts"></canvas>
                <div class="line-chart-row-title"><a class="hh" href="{{ url('admin/categories') }}"
                        style="color: #000; text-decoration: unset">Categories</a></div>
            </div>
        </div>
        <div class="col-lg-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-dark font-weight-bold">{{ $tags }}</h2>
                        <i class="mdi mdi-tag-multiple text-dark mdi-18px"></i>
                    </div>
                </div>
                <canvas id="transactions"></canvas>
                <div class="line-chart-row-title"><a class="hh" href="{{ url('admin/tags') }}"
                        style="color: #000; text-decoration: unset">TAGS</a></div>
            </div>
        </div>
        <div class="col-lg-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-info font-weight-bold">{{ $users }}</h2>
                        <i class="mdi mdi-account-multiple mdi-18px text-dark"></i>
                    </div>
                </div>
                <canvas id="invoices"></canvas>
                <div class="line-chart-row-title"><a class="hh" href="{{ url('admin/users') }}"
                        style="color: #000; text-decoration: unset">Users</a></div>
            </div>
        </div>
        <div class="col-lg-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-warning font-weight-bold">{{ $admins }}</h2>
                        <i class="mdi mdi-account-key mdi-18px text-dark"></i>
                    </div>
                </div>
                <canvas id="projects"></canvas>
                <div class="line-chart-row-title"><a class="hh" href="{{ url('admin/admins') }}"
                        style="color: #000; text-decoration: unset">Admins</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 grid-margin stretch-card">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="text-secondary font-weight-bold">{{ $subscribes }}</h2>
                        <i class="mdi mdi-bell-ring mdi-18px text-dark"></i>
                    </div>
                </div>
                <canvas id="orderRecieved"></canvas>
                <div class="line-chart-row-title"><a class="hh" href="{{ url('admin/subscribers') }}"
                        style="color: #000; text-decoration: unset">Subscribers</a></div>
            </div>
        </div>
    </div>
@endsection
