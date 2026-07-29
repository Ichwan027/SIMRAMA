@php

    $jumlah = $guruMengajars->sum(function ($item) {
        return $item->nilaiDetail->nilai_angka ?? 0;
    });

    $rata = $guruMengajars->count()
        ? round($jumlah / $guruMengajars->count(), 2)
        : 0;

@endphp

<div class="nilai-section">
    <div class="nilai-left">
        <table class="table-akademik">
            <thead>
                <tr>
                    <th rowspan="2" class="col-no">
                        NO
                    </th>
                    <th rowspan="2" class="col-mapel">
                        MATA PELAJARAN
                    </th>
                    <th colspan="2">
                        NILAI
                    </th>
                </tr>
                <tr>
                    <th class="col-angka">
                        ANGKA
                    </th>
                    <th class="col-huruf">
                        HURUF
                    </th>
                </tr>
            </thead>
            <tbody>
                @for($i = 1; $i <= 15; $i++)
                    @php
                        $item = $guruMengajars[$i - 1] ?? null;
                    @endphp
                    <tr>
                        <td class="text-center">
                            {{ $i }}
                        </td>
                        <td class="mapel">
                            {{ $item->mapel->nama ?? '' }}
                        </td>
                        <td class="text-center">
                            {{ $item->nilaiDetail->nilai_angka ?? '' }}
                        </td>
                        <td class="text-center">
                            {{ $item->huruf ?? '' }}
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="nilai-right">
        @include('Master.nilai.partials.print.panel-kanan')
    </div>
</div>

<div class="mt-2">
    @include('Master.nilai.partials.print.catatan')
</div>