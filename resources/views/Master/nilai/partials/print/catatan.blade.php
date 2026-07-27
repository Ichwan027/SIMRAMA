<table class="table-catatan">

    <thead>

        <tr>

            <th colspan="3">
                CATATAN WALI KELAS
            </th>

        </tr>

        <tr>

            <th width="72%">
                SARAN DAN PETUNJUK
            </th>

            <th width="14%">
                NILAI
            </th>

            <th width="14%">
                CENTANG
            </th>

        </tr>

    </thead>

    <tbody>

        @foreach ($masterCatatan as $catatan)
            @php

                $aktif = $nilaiCatatan >= $catatan['nilai_min'] && $nilaiCatatan <= $catatan['nilai_max'];

            @endphp

            <tr>

                <td>

                    {{ $catatan['catatan'] }}

                </td>

                <td class="text-center">

                    {{ $aktif ? $nilaiCatatan : '' }}

                </td>

                <td class="text-center">

                    {{ $aktif ? '✓' : '' }}

                </td>

            </tr>
        @endforeach

    </tbody>

</table>
