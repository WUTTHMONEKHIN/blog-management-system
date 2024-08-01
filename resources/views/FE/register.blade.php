<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oleez :: Register</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('assets/BK/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/BK/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/BK/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/BK/images/favicon.png') }}" />
    <style>
        .form {
            background: #000;
            color: #ffffff;
        }

        .auth form .form-group .form-control,
        .auth form .form-group .typeahead,
        .auth form .form-group .tt-query,
        .auth form .form-group .tt-hint {
            background: transparent;
            border-radius: 0;
            font-size: .9375rem;
            color: white;
        }

        .btn-submit {
            padding: 17px 50px;
            background-color: #ffc107;
            border-radius: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .btn-submit:hover {
            background-color: transparent;
            border: 1px solid #ffc107;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="form text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <a href="{{ url('/') }}"><img
                                            src="{{ asset('assets/FE/assets/images/Logo_1.svg') }}" alt="logo"></a>
                                </div>
                                <h4>Hello! let's get started</h4>
                                <h6 class="font-weight-light">Sign up to continue.</h6>
                                <form class="pt-3" action="{{ url('/register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-lg"
                                            id="exampleInputEmail1" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="mt-3 text-center">
                                        <button type="submit"
                                            class="btn btn-block btn-submit text-black btn-lg font-weight-medium auth-form-btn"
                                            href="#">SIGN UP</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Already have an account? <a href="{{ url('login') }}" class="text-primary">Sign
                                            In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('assets/BK/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('assets/BK/js/template.js') }}"></script>
    <!-- endinject -->
</body>

</html>
