@php

    $konversi = [
        'A' => ['angka' => 90, 'huruf' => 'Sembilan Puluh'],
        'B' => ['angka' => 80, 'huruf' => 'Delapan Puluh'],
        'C' => ['angka' => 70, 'huruf' => 'Tujuh Puluh'],
        'D' => ['angka' => 60, 'huruf' => 'Enam Puluh'],
        'E' => ['angka' => 50, 'huruf' => 'Lima Puluh'],
    ];

@endphp

<table class="table-tilawati">

    <thead>

        <tr>

            <th rowspan="2" width="35">NO</th>

            <th rowspan="2">MATERI POKOK TILAWATI</th>

            <th colspan="2" width="220">NILAI</th>

            <th rowspan="2" width="95">KETERANGAN</th>

        </tr>

        <tr>

            <th width="70">ANGKA</th>

            <th width="150">HURUF</th>

        </tr>

    </thead>

    <tbody>

        @forelse($nilaiTilawatis as $item)

            @php

                $nilai = $konversi[$item->nilai] ?? [
                    'angka' => '-',
                    'huruf' => '-'
                ];

            @endphp

            <tr>

                <td class="text-center">

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ strtoupper($item->tilawati->nama) }}

                </td>

                <td class="text-center">

                    {{ $nilai['angka'] }}

                </td>

                <td>

                    {{ $nilai['huruf'] }}

                </td>

                <td class="text-center">

                    {{ $item->nilai }}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center">

                    BELUM ADA DATA NILAI TILAWATI

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

<br>