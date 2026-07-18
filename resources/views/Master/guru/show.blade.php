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

                <a href="{{ route($route.'.edit',$data->id) }}"
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

        <div class="card-header">

            <h5 class="mb-0">

                Detail Guru

            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-3 text-center">

                    @if($data->foto)

                        <img
                            src="{{ asset('storage/'.$data->foto) }}"
                            class="img-thumbnail rounded"
                            width="220">

                    @else

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode($data->nama) }}&background=0D6EFD&color=fff"
                            class="img-thumbnail rounded"
                            width="220">

                    @endif

                </div>

                <div class="col-md-9">

                    <table class="table table-bordered">

                        <tr>
                            <th width="220">Nama</th>
                            <td>{{ $data->nama }}</td>
                        </tr>

                        <tr>
                            <th>Jabatan</th>
                            <td>{{ $data->jabatan }}</td>
                        </tr>

                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $data->jenis_kelamin }}</td>
                        </tr>

                        <tr>
                            <th>Tempat Lahir</th>
                            <td>{{ $data->tempat_lahir }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $data->tanggal_lahir->translatedFormat('d F Y') }}</td>
                        </tr>

                        <tr>
                            <th>Telepon</th>
                            <td>{{ $data->telepon }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $data->email }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
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
                            <th>Alamat</th>
                            <td>{{ $data->alamat }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection