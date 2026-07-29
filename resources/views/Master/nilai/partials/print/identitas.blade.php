<div class="identitas">

    <table>

        <tr>

            <td class="label">Nama Santri</td>
            <td class="titik">:</td>
            <td class="isi">{{ $data->santri->nama }}</td>

            <td class="label-kanan">Nomor Induk</td>
            <td class="titik">:</td>
            <td class="isi-kanan">{{ $data->santri->nomor_induk }}</td>

        </tr>

        <tr>

            <td class="label">Kelas</td>
            <td class="titik">:</td>
            <td class="isi">{{ $data->santri->kelas->nama }}</td>

            <td class="label-kanan">IMDA</td>
            <td class="titik">:</td>
            <td class="isi-kanan">{{ $data->semester->nama ?? '-' }}</td>

        </tr>

        <tr>

            <td class="label">Tahun Pelajaran</td>
            <td class="titik">:</td>
            <td class="isi">{{ $data->tahunAjaran->tahun }}</td>

            <td class="label-kanan"></td>
            <td class="titik"></td>
            <td class="isi-kanan"></td>

        </tr>

    </table>

</div>