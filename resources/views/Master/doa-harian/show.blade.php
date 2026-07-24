@extends('layouts.dashboard')

@section('content')
    <div class="card">

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="250">

                        Doa Harian

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

                        @if ($data->aktif)
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

            </table>

        </div>

    </div>
@endsection
