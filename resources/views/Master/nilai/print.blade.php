<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Raport Santri</title>

    <link rel="stylesheet" href="{{ asset('assets/css/raport.css') }}">
</head>

<body>

    @include('Master.nilai.partials.print.header')

    @include('Master.nilai.partials.print.identitas')

    @include('Master.nilai.partials.print.akademik')

    @include('Master.nilai.partials.print.doa_kepribadian')

    @include('Master.nilai.partials.print.catatan')

    @include('Master.nilai.partials.print.ttd')

</body>

</html>
