<table class="table-doaharian">
    <thead>
        <tr>
            <th width="6%">NO.</th>
            <th width="34%">DO'A-DO'A HARIAN</th>
            <th width="10%">PREDIKAT</th>
            <th width="34%">Kepribadian</th>
            <th width="16%">Predikat</th>
        </tr>
    </thead>

    <tbody>

        @php
            $jumlahDoa = count($doaHarians);
            $jumlahKepribadian = count($kepribadians);
            $jumlahBaris = max($jumlahDoa, 8);
        @endphp

        @for ($i = 0; $i < $jumlahBaris; $i++)

            <tr>

                {{-- NO --}}
                <td align="center">
                    {{ $i + 1 }}.
                </td>

                {{-- DOA --}}
                <td>
                    {{ $doaHarians[$i]->nama ?? '' }}
                </td>

                <td align="center">
                    @if (isset($doaHarians[$i]))
                        {{ $nilaiDoas[$doaHarians[$i]->id]->nilai ?? '-' }}
                    @endif
                </td>


                {{-- KEPRIBADIAN --}}
                @if ($i < 4)
                    <td>
                        {{ $i + 1 }}.
                        {{ $kepribadians[$i]->nama ?? '' }}
                    </td>

                    <td align="center">
                        @if (isset($kepribadians[$i]))
                            {{ $nilaiKepribadians[$kepribadians[$i]->id]->nilai ?? '-' }}
                        @endif
                    </td>
                @elseif($i == 4)
                    <td align="center">
                        <b>Absensi</b>
                    </td>

                    <td align="center">
                        <b>Jumlah</b>
                    </td>
                @elseif($i == 5)
                    <td>1. Sakit</td>

                    <td align="center">
                        {{ $absensi->sakit ?? '-' }}
                    </td>
                @elseif($i == 6)
                    <td>2. Izin</td>

                    <td align="center">
                        {{ $absensi->izin ?? '-' }}
                    </td>
                @elseif($i == 7)
                    <td>3. Alpha</td>

                    <td align="center">
                        {{ $absensi->alpha ?? '-' }}
                    </td>
                @else
                    <td></td>
                    <td></td>
                @endif

            </tr>

        @endfor


        {{-- CATATAN --}}
        <tr>
            <td colspan="6" class="catatan">

                <div style="text-align:center; font-weight:bold; margin-bottom:4px;">
                    CATATAN UNTUK SANTRI :
                </div>

                <div style="min-height:45px; text-align:left; padding:0 8px;">

                    {{ $data->catatan ?? '-' }}

                </div>

            </td>
        </tr>

    </tbody>

</table>
