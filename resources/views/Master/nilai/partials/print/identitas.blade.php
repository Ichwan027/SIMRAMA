<table class="table-identitas">
    <tr>
        <td width="18%">Nama</td>
        <td width="2%">:</td>
        <td width="30%">{{ $data->santri->nama }}</td>

        <td width="18%">Semester</td>
        <td width="2%">:</td>
        <td width="30%">
            {{ $data->semester->nama }}
        </td>
    </tr>

    <tr>
        <td>Kelas / Jilid</td>
        <td>:</td>
        <td>
            {{ $data->santri->kelas->nama }}
        </td>

        <td>Tahun Ajaran</td>
        <td>:</td>
        <td>
            {{ $data->tahunAjaran->tahun }}
        </td>
    </tr>
</table>