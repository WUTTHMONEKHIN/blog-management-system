<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin :: @yield('title')</title>
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
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/toastify.min.css') }}">
    @yield('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            @include('BK.navebar')
            @include('BK.horizontal-navber')
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('BK.footer') <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('assets/BK/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('assets/BK/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="{{ asset('assets/BK/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/BK/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/BK/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ asset('assets/BK/vendors/justgage/raphael-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/BK/vendors/justgage/justgage.js') }}"></script>
    <script src="{{ asset('assets/BK/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/BK/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('datatable/dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('datatable/toastify-js.js') }}"></script>
    <script>
        new DataTable('#datatable', {
            paging: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            language: {
                search: '',
                searchPlaceholder: 'Search Records'
            },
            // dom: 'Bfrtip',
            // buttons: [{
            //     extend: 'excelHtml5',
            //     text: 'Export to Excel',
            // }],
        });
    </script>
    <script>
        @if (session()->has('error'))
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "left", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)", // Red gradient for errors
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endif
        @if ($errors->any())
            Toastify({
                text: "{{ $errors->first() }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "left", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #ff5f6d, #ffc371)", // Red gradient for errors
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endif
        @if (session()->has('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "left", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endif
    </script>
    @yield('script')

</body>

</html>
