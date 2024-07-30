@extends('BK.master')
@section('title', 'Admin Dashboard')
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
                <div class="line-chart-row-title">MY BLOGS</div>
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
                <div class="line-chart-row-title">Categories</div>
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
                <div class="line-chart-row-title">TAGS</div>
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
                <div class="line-chart-row-title">Users</div>
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
                <div class="line-chart-row-title">Admins</div>
            </div>
        </div>
    </div>
@endsection
