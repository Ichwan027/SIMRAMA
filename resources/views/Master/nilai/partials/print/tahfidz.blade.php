@php
    $kiri = $nilaiTahfidzs->take(20)->values();
    $kanan = $nilaiTahfidzs->slice(20)->values();
@endphp

<table class="table-tahfidz">

    <thead>

        <tr>

            <th rowspan="2" width="35">NO</th>

            <th rowspan="2">MATERI JUZ 30<br>NAMA SURAT</th>

            <th rowspan="2" width="70">PREDIKAT</th>

            <th rowspan="2">NAMA SURAT</th>

            <th rowspan="2" width="70">PREDIKAT</th>

        </tr>

    </thead>

    <tbody>

        @for($i = 0; $i < 20; $i++)

            <tr>

                {{-- kiri --}}
                <td class="text-center">
                    {{ $i + 1 }}
                </td>

                <td>

                    {{ $kiri[$i]->tahfidz->nama ?? '' }}

                </td>

                <td class="text-center">

                    {{ $kiri[$i]->nilai ?? '' }}

                </td>

                {{-- kanan --}}
                <td>

                    @if(isset($kanan[$i]))

                        {{ $i + 21 }}.
                        {{ $kanan[$i]->tahfidz->nama }}

                    @endif

                </td>

                <td class="text-center">

                    {{ $kanan[$i]->nilai ?? '' }}

                </td>

            </tr>

        @endfor

    </tbody>

</table>