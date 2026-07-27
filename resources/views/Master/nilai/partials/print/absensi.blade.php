<table class="table-side">

    <tr>
        <th colspan="2">
            KETIDAKHADIRAN
        </th>
    </tr>

    <tr>

        <td>Sakit</td>

        <td class="text-center">
            {{ $absensi->sakit ?? 0 }}
        </td>

    </tr>

    <tr>

        <td>Izin</td>

        <td class="text-center">
            {{ $absensi->izin ?? 0 }}
        </td>

    </tr>

    <tr>

        <td>Alpha</td>

        <td class="text-center">
            {{ $absensi->alpha ?? 0 }}
        </td>

    </tr>

</table>