@extends('layouts.dashboard')

@section('content')

<div class="page-heading d-flex justify-content-between align-items-center mb-3">

    <h3>Detail Santri</h3>

    <div>

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

<div class="card">

    <div class="card-body">

        <div class="row">

            <div class="col-md-3 text-center">

                @if($data->foto)

                    <img src="{{ asset('storage/'.$data->foto) }}"
                         class="img-fluid rounded shadow"
                         width="220">

                @else

                    <img src="https://placehold.co/220x220?text=Foto"
                         class="img-fluid rounded">

                @endif

            </div>

            <div class="col-md-9">

                <table class="table table-bordered">

                    <tr>
                        <th width="220">Nama</th>
                        <td>{{ $data->nama }}</td>
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
                        <th>Nama Wali</th>
                        <td>{{ $data->nama_wali }}</td>
                    </tr>

                    <tr>
                        <th>Telepon</th>
                        <td>{{ $data->telepon }}</td>
                    </tr>

                    <tr>
                        <th>Kelas</th>
                        <td>{{ $data->kelas?->nama }}</td>
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

@endsection