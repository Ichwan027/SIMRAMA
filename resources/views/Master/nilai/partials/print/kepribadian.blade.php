<table class="table-side">
    <thead>
        <tr>
            <th colspan="2">
                PERILAKU MURID
            </th>

        </tr>
 <tr>
            <th colspan="2" class="table-side-spacer"></th>
        </tr>
    </thead>

    <tbody>

        @foreach ($kepribadians as $item)
            <tr>

                <td width="75%">

                    {{ $loop->iteration }}.
                    {{ $item->nama }}

                </td>

                <td class="text-center" width="25%">

                    {{ $nilaiKepribadians[$item->id]->predikat ?? '-' }}

                </td>

            </tr>
        @endforeach
    </tbody>
</table>
