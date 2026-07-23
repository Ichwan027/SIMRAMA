@extends('layouts.dashboard')

@section('content')

<div class="page-heading">

    <h3>{{ $title }}</h3>

</div>

<form
    action="{{ route($route.'.update',$data->id) }}"
    method="POST">

    @csrf

    @method('PUT')

    @include('Master.tilawati.form')

</form>

@endsection