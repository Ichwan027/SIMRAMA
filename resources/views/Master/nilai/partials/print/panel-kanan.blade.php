@php
    $jumlah = $guruMengajars->sum(fn($item) => $item->nilaiDetail->nilai_angka ?? 0);

    $rata = $guruMengajars->count()
        ? round($jumlah / $guruMengajars->count(), 2)
        : 0;
@endphp

<table class="table-side">

    <tr>
        <th colspan="2">PERILAKU MURID</th>
    </tr>

    @foreach($kepribadians as $item)
    <tr class="perilaku-row">
        <td>{{ $item->nama }}</td>
        <td class="text-center">
            {{ $nilaiKepribadians[$item->id]->nilai ?? '-' }}
        </td>
    </tr>
    @endforeach

    <tr>
        <th colspan="2">KETIDAKHADIRAN</th>
    </tr>

    <tr class="absensi-row">
        <td>Sakit</td>
        <td class="text-center">{{ $absensi->sakit ?? 0 }}</td>
    </tr>

    <tr class="absensi-row">
        <td>Izin</td>
        <td class="text-center">{{ $absensi->izin ?? 0 }}</td>
    </tr>

    <tr class="absensi-row">
        <td>Alpha</td>
        <td class="text-center">{{ $absensi->alpha ?? 0 }}</td>
    </tr>

    <tr>
        <th colspan="2">NILAI KESELURUHAN</th>
    </tr>

    <tr class="nilai-row">
        <td>Jumlah Nilai</td>
        <td class="text-center">{{ $jumlah }}</td>
    </tr>

    <tr class="nilai-row">
        <td>Rata-rata</td>
        <td class="text-center">{{ $rata }}</td>
    </tr>

    <tr class="nilai-row">
        <td>Peringkat</td>
        <td class="text-center">{{ $data->peringkat ?? '-' }}</td>
    </tr>

</table>