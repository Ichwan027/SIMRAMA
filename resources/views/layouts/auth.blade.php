<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>Login SIMRAMA</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo-pondok.png') }}?v={{ time() }}">
    <link rel="shortcut icon" href="{{ asset('images/logo-pondok.png') }}?v={{ time() }}">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<div
    class="container">

    <div
        class="row justify-content-center align-items-center"
        style="min-height:100vh;">

        <div class="col-md-5">

            @yield('content')

        </div>

    </div>

</div>

</body>

</html>