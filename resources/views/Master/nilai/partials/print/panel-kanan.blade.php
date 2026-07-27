@php

    $jumlah = $guruMengajars->sum(function ($item) {
        return $item->nilaiDetail->nilai_angka ?? 0;
    });

    $rata = $guruMengajars->count() ? round($jumlah / $guruMengajars->count(), 2) : 0;

@endphp

<table class="table-side">

    <thead>

        <tr>

            <th colspan="2">
                PERILAKU MURID
            </th>

        </tr>

    </thead>

    <tbody>

        @foreach ($kepribadians as $item)
            <tr>

                <td width="75%">

                    {{ $loop->iteration }}.
                    {{ $item->nama }}

                </td>

                <td width="25%" class="text-center">

                    {{ $nilaiKepribadians[$item->id]->predikat ?? '-' }}

                </td>

            </tr>
        @endforeach

        <tr>

            <th colspan="2">

                KETIDAKHADIRAN

            </th>

        </tr>

        <tr>

            <td>Sakit</td>

            <td class="text-center">

                {{ $absensi->sakit ?? 0 }}

            </td>

        </tr>

        <tr>

            <td>Izin</td>

            <td class="text-center">

                {{ $absensi->izin ?? 0 }}

            </td>

        </tr>

        <tr>

            <td>Alpha</td>

            <td class="text-center">

                {{ $absensi->alpha ?? 0 }}

            </td>

        </tr>

        <tr>

            <th colspan="2">

                NILAI KESELURUHAN

            </th>

        </tr>

        <tr>

            <td>Jumlah Nilai</td>

            <td class="text-center">

                {{ $jumlah }}

            </td>

        </tr>

        <tr>

            <td>Rata-rata</td>

            <td class="text-center">

                {{ $rata }}

            </td>

        </tr>

        <tr>

            <td>Peringkat</td>

            <td class="text-center">

                {{ $data->peringkat ?? '-' }}

            </td>

        </tr>


    </tbody>

</table>
