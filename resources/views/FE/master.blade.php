<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oleez :: @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/FE/assets/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FE/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FE/assets/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FE/assets/vendors/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/FE/assets/vendors/slick-carousel/slick-theme.css') }}">
    <script src="{{ asset('assets/FE/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/FE/assets/js/loader.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('datatable/toastify.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/BK/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.6.0-web/css/all.min.css') }}">
    <style>
        .post-info {
            display: flex;
            justify-content: space-between;
            /* Space between the date and likes */
            align-items: center;
            /* Center items vertically */
        }

        .badge {
            position: absolute;
            top: -25px;
            right: -52px;
            background-color: #ff5733;
            color: #fff;
            padding: 0.5rem 1rem;
            transform: rotate(45deg);
            transform-origin: 0 0;
            font-size: 0.75rem;
            white-space: nowrap;
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="oleez-loader"></div>
    @include('FE.header')
    <main>
        @yield('content')
    </main>
    @include('FE.footer')
    <div id="searchModal" class="search-modal">
        <button type="button" class="close" aria-label="Close" data-dismiss="searchModal">
            <span aria-hidden="true">&times;</span>
        </button>
        <form action="index.html" method="get" class="oleez-overlay-search-form">
            <label for="search" class="sr-only">Search</label>
            <input type="search" class="oleez-overlay-search-input" id="search" name="search"
                placeholder="Search here">
        </form>
    </div>
    <script src="{{ asset('assets/FE/assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome-free-6.6.0-web/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/FE/assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/FE/assets/vendors/wowjs/wow.min.js') }}"></script>
    <script src="{{ asset('assets/FE/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/FE/assets/vendors/slick-carousel/slick.min.js') }}"></script>
    <script src="{{ asset('assets/FE/assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/FE/assets/js/landing.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <script src="{{ asset('datatable/toastify-js.js') }}"></script>
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
</body>

</html>
