<div class="section-title">
    E. ABSENSI
</div>

<table class="nilai-table">

    <tr>

        <th>Sakit</th>

        <th>Izin</th>

        <th>Alpha</th>

    </tr>

    <tr>

        <td class="text-center">

            {{ $absensi->sakit ?? 0 }}

        </td>

        <td class="text-center">

            {{ $absensi->izin ?? 0 }}

        </td>

        <td class="text-center">

            {{ $absensi->alpha ?? 0 }}

        </td>

    </tr>

</table>