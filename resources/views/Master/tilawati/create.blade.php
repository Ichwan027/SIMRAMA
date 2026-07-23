@extends('layouts.dashboard')

@section('content')

<div class="page-heading">

    <h3>{{ $title }}</h3>

</div>

<form
    action="{{ route($route.'.store') }}"
    method="POST">

    @csrf

    @include('Master.tilawati.form')

</form>

@endsection