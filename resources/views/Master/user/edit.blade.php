@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>

    <div class="card">

        <div class="card-body">

            <form action="{{ route($route . '.update', $data->id) }}" method="POST">

                @include('Master.user.form')

            </form>

        </div>

    </div>
@endsection
