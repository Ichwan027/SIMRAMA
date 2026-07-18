<div class="section-title">
    C. NILAI KEPRIBADIAN
</div>

<table class="nilai-table">

    <thead>

        <tr>

            <th width="5%">No</th>

            <th>Kepribadian</th>

            <th width="15%">Nilai</th>

        </tr>

    </thead>

    <tbody>

        @foreach($kepribadians as $item)

            <tr>

                <td class="text-center">

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $item->nama }}

                </td>

                <td class="text-center">

                    {{ $nilaiKepribadians[$item->id]->nilai ?? '-' }}

                </td>

            </tr>

        @endforeach

    </tbody>

</table>