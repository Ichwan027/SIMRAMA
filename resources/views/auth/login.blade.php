@extends('layouts.auth')

@section('content')

<div class="card shadow">

    <div class="card-header text-center">

        <h3>Login SIMRAMA</h3>

        <p class="text-muted">
            Sistem Informasi Raport Madrasah
        </p>

    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required
                    autofocus>

                @error('email')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required>

                @error('password')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <button
                class="btn btn-primary w-100">

                Login

            </button>

        </form>

    </div>

</div>

@endsection