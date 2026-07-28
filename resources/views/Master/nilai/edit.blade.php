@extends('layouts.dashboard')

@section('content')
    <div class="row">

        <div class="col-12">

            @include('Master.nilai.partials.header')

            @include('Master.nilai.partials.akademik')

            {{-- @include('Master.nilai.partials.doa') --}}

            @include('Master.nilai.partials.kepribadian')

            {{-- @include('Master.nilai.partials.tilawati')  --}}

            {{-- @include('Master.nilai.partials.tahfidz') --}}

            @include('Master.nilai.partials.absensi')

            @include('Master.nilai.partials.catatan')

        </div>

    </div>
@endsection
