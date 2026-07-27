<div class="nilai-section">

    <!-- =======================
         TABEL AKADEMIK (KIRI)
    ======================== -->
    <div class="nilai-left">

        <table class="table-akademik">

            <thead>

                <tr>

                    <th rowspan="2" style="width:8%">NO</th>

                    <th rowspan="2" style="width:52%">
                        MATA PELAJARAN
                    </th>

                    <th colspan="2">
                        NILAI
                    </th>

                </tr>

                <tr>

                    <th style="width:12%">
                        ANGKA
                    </th>

                    <th style="width:28%">
                        HURUF
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach ($guruMengajars as $item)
                    <tr>

                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="text-left">
                            {{ $item->mapel->nama }}
                        </td>

                        <td class="text-center">
                            {{ $item->nilaiDetail->nilai_angka ?? '-' }}
                        </td>

                        <td class="text-center">
                            {{ $item->huruf }}
                        </td>

                    </tr>
                @endforeach

                @for ($i = $guruMengajars->count(); $i < 15; $i++)
                    <tr>

                        <td class="text-center">
                            {{ $i + 1 }}
                        </td>

                        <td></td>

                        <td></td>

                        <td></td>

                    </tr>
                @endfor

            </tbody>

        </table>

    </div>

    <!-- =======================
         PANEL KANAN
    ======================== -->

    <div class="nilai-right">

        @include('Master.nilai.partials.print.panel-kanan')

    </div>

</div>

{{-- <div class="mt-2">

    @include('Master.nilai.partials.print.kenaikan')

</div> --}}

<div class="mt-2">

    @include('Master.nilai.partials.print.catatan')

</div>
