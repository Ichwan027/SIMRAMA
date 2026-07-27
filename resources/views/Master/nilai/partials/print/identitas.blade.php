<table class="identitas">

    <tr>

        <td width="18%">NAMA MURID</td>

        <td width="32%">: {{ $data->santri->nama }}</td>

        <td width="18%">NO. INDUK</td>

        <td>: {{ $data->santri->nomor_induk }}</td>

    </tr>

    <tr>

        <td>KELAS</td>

        <td>: {{ $data->santri->kelas->nama }}</td>

        <td>IMDA</td>

        <td>: {{ $data->semester->nama }}</td>

    </tr>

    <tr>

        <td>TAHUN PELAJARAN</td>

        <td>: {{ $data->tahunAjaran->tahun }}</td>

        <td></td>

        <td></td>

    </tr>

</table>
