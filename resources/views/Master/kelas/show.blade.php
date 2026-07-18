@extends('layouts.dashboard')

@section('content')

<div class="page-heading">

    <div class="page-title">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h3>{{ $title }}</h3>

            </div>

            <div class="col-md-6 text-end">

                <a href="{{ route($route.'.index') }}"
                    class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>

                    Kembali

                </a>

                <a href="{{ route($route.'.edit', $data->id) }}"
                    class="btn btn-warning">

                    <i class="bi bi-pencil"></i>

                    Edit

                </a>

            </div>

        </div>

    </div>

</div>

<section class="section">

    <div class="card">

        <div class="card-body">

            <div class="row">

                <div class="col-md-3 text-center">

                    @if($data->waliGuru?->foto)

                        <img
                            src="{{ asset('storage/'.$data->waliGuru->foto) }}"
                            class="img-fluid rounded shadow"
                            width="220">

                    @else

                        <img
                            src="{{ asset('images/default-user.png') }}"
                            class="img-fluid rounded shadow"
                            width="220">

                    @endif

                </div>

                <div class="col-md-9">

                    <table class="table table-bordered">

                        <tr>

                            <th width="220">
                                Nama Kelas
                            </th>

                            <td>

                                {{ $data->nama }}

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Wali Kelas
                            </th>

                            <td>

                                {{ $data->waliGuru?->nama ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Urutan
                            </th>

                            <td>

                                {{ $data->urutan }}

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Status
                            </th>

                            <td>

                                @if($data->status)

                                    <span class="badge bg-success">

                                        Aktif

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Nonaktif

                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Dibuat
                            </th>

                            <td>

                                {{ $data->created_at->translatedFormat('d F Y H:i') }}

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Terakhir Diubah
                            </th>

                            <td>

                                {{ $data->updated_at->translatedFormat('d F Y H:i') }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection