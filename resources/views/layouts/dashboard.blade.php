

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Mazer -->
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/iconly/iconly.css') }}">

    @stack('styles')

</head>

<body>

    <div id="app">

        @include('partials.sidebar')

        <div id="main">

            @include('partials.navbar')

            <div class="page-content">

                @include('partials.flash')

                @include('partials.breadcrumb')

                @yield('content')

            </div>

            @include('partials.footer')

        </div>

    </div>

    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('components.alert')

    @stack('scripts')

</body>

</html>
