@extends('layouts.dashboard')

@section('content')
    <div class="card">

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="250">
                        Nama Semester
                    </th>

                    <td>
                        {{ $data->nama }}
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

                        {!! $data->aktif
                            ? '<span class="badge bg-success">Aktif</span>'
                            : '<span class="badge bg-danger">Non Aktif</span>' !!}

                    </td>

                </tr>

            </table>

        </div>

    </div>
@endsection
