<div class="section-title">
    B. NILAI DOA HARIAN
</div>

<table class="nilai-table">

    <thead>

        <tr>

            <th width="5%">No</th>

            <th>Doa</th>

            <th width="15%">Nilai</th>

        </tr>

    </thead>

    <tbody>

        @foreach($doaHarians as $item)

            <tr>

                <td class="text-center">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->nama }}
                </td>

                <td class="text-center">
                    {{ $nilaiDoas[$item->id]->nilai ?? '-' }}
                </td>

            </tr>

        @endforeach

    </tbody>

</table>