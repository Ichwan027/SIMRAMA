<table class="table-kenaikan">

    <tr>

        <td width="55%">

            <strong>

                NAIK / TIDAK NAIK KELAS :

            </strong>

            {{ $data->status_naik ?? '' }}

        </td>

        <td width="45%">

            <strong>

                PERINGKAT KE :

            </strong>

            {{ $data->peringkat ?? '-' }}

        </td>

    </tr>

</table>