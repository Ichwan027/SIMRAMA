@extends('layouts.dashboard')

@section('content')

<div class="page-heading">

    <h3>Detail Guru Mengajar</h3>

</div>

<div class="card">

    <div class="card-body">

        <table class="table">

            <tr>

                <th width="220">Guru</th>

                <td>{{ $data->guru->nama }}</td>

            </tr>

            <tr>

                <th>Kelas</th>

                <td>{{ $data->kelas->nama }}</td>

            </tr>

            <tr>

                <th>Mapel</th>

                <td>{{ $data->mapel->nama }}</td>

            </tr>

            <tr>

                <th>Tahun Ajaran</th>

                <td>{{ $data->tahunAjaran->nama }}</td>

            </tr>

            <tr>

                <th>Semester</th>

                <td>{{ $data->semester->nama }}</td>

            </tr>

        </table>

        <a href="{{ route($route.'.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@endsection