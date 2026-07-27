@php

$jumlah = $guruMengajars->sum(function ($item) {

    return $item->nilaiDetail->nilai_angka ?? 0;

});

$rata = $guruMengajars->count()
        ? round($jumlah / $guruMengajars->count(),2)
        : 0;

@endphp

<table class="table-side">

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

        <td>Rata-rata Kelas</td>

        <td class="text-center">

            {{ $data->rata_kelas ?? '-' }}

        </td>

    </tr>

</table>