@extends('layouts.dashboard')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-md-6">

                <h3>{{ $title }}</h3>

            </div>

            <div class="col-md-6 text-end">

                <a href="{{ route($route.'.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

<section class="section">

    <div class="card">

        <div class="card-header">

            <h5 class="card-title mb-0">

                {{ $title }}

            </h5>

        </div>

        <div class="card-body">

            <form
                action="{{ route($route.'.update', $data->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')

                @include('Master.guru.form')

            </form>

        </div>

    </div>

</section>

@endsection