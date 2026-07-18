<div class="section-title">
    D. NILAI TAHFIDZ
</div>

<table class="nilai-table">

    <thead>

        <tr>

            <th width="5%">No</th>

            <th>Tahfidz</th>

            <th width="15%">Nilai</th>

        </tr>

    </thead>

    <tbody>

        @foreach($tahfidzs as $item)

            <tr>

                <td class="text-center">

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $item->nama }}

                </td>

                <td class="text-center">

                    {{ $nilaiTahfidzs[$item->id]->nilai ?? '-' }}

                </td>

            </tr>

        @endforeach

    </tbody>

</table>