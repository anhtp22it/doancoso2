<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Workplex') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{--    My Css Files --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Themify Icons -->
    <link href="{{ asset('assets/fonts/themify-icons.css') }}" rel="stylesheet" />
    <!-- Lineicons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/lineicons.css') }}" />
    <!-- Font Awaresome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- Slick.js -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Title</title>
</head>

<body>
    <!-- loader -->
    <div class="loader"></div>
    <div class="main-wrapper d-flex">
        @include('admin.layouts.sidebar')
        <main class="main d-block">
            <nav class="main-nav">
                <div class="container py-2">
                    <button class="sidebar-toggle transparent-btn">
                        <i class="fa fa-caret-square-left fs-4" style="color: lightgray"></i>
                    </button>
                </div>
            </nav>

            @yield('content')
        </main>

        <!-- BackToTop Button -->
        <a href="#" id="backToTop" class="top-scroll">
            <span class="ti-arrow-up"></span>
        </a>
    </div>

    {{-- My Js file --}}
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Slick.js -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/admin/js/main.js') }}"></script>

</body>

</html>
