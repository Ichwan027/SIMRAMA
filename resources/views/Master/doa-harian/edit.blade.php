@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">

        <h3>{{ $title }}</h3>

    </div>

    <form action="{{ route($route . '.update', $data->id) }}" method="POST">

        @csrf

        @method('PUT')

        @include('Master.doa-harian.partials')

        <button class="btn btn-warning">

            Update

        </button>

        <a href="{{ route($route . '.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>
@endsection
