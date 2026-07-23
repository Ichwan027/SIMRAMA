<table class="table-akademik">

    <thead>

        <tr>

            <th width="6%">NO.</th>

            <th width="23%">MATA PELAJARAN</th>

            <th width="10%">
                NILAI
                <br>
                ANGKA
            </th>

            <th width="31%">
                HURUF
            </th>

            <th width="12%">
                PREDIKAT
            </th>

        </tr>

    </thead>

    <tbody>

        @foreach ($guruMengajars as $item)
            <tr>

                <td align="center">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->mapel->nama }}
                </td>

                <td align="center">
                    {{ $item->nilaiDetail->nilai_angka ?? '-' }}
                </td>

                <td align="center">
                    {{ $item->huruf }}
                </td>

                <td align="center">

                    {{ $item->nilaiDetail?->predikat?->predikat ?? '-' }}

                </td>

            </tr>
        @endforeach

        <tr>
            @php
                $jumlah = $guruMengajars->sum(function ($item) {
                    return $item->nilaiDetail->nilai_angka ?? 0;
                });
            @endphp

        <tr>
            <td></td>

            <td align="center">
                <b>Jumlah</b>
            </td>

            <td align="center">
                <b>{{ $jumlah }}</b>
            </td>

            <td align="center">
                <b>{{ terbilang($jumlah) }}</b>
            </td>

            <td></td>
        </tr>
        </tr>

        <tr>


        <tr>
            <td colspan="2" class="text-center">
                <strong>Peringkat</strong>
            </td>

            <td style="text-align:center; vertical-align:middle;">
                <strong>{{ $data->peringkat ?? '-' }}</strong>
            </td>

            <td colspan="2"></td>
        </tr>

        </tr>

    </tbody>

</table>
