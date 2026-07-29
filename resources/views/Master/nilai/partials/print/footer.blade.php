<table class="footer-table">

    {{-- Tanggal --}}
    <tr>

        <td></td>

        <td></td>

        <td class="text-center">
            Jember,
            {{ \Carbon\Carbon::parse($data->tanggal_raport ?? now())->translatedFormat('d F Y') }}
        </td>

    </tr>

    {{-- Jabatan Atas --}}
    <tr>

        <td class="text-center jabatan">
            Orang Tua / Wali Santri
        </td>

        <td></td>

        <td class="text-center jabatan">
            Wali Kelas
        </td>

    </tr>

    {{-- Ruang TTD --}}
    <tr>

        <td class="ttd-space"></td>

        <td></td>

        <td class="ttd-space"></td>

    </tr>

    {{-- Nama --}}
    <tr>

        <td class="text-center">

            (................................)

        </td>

        <td></td>

        <td class="text-center footer-bold">

            {{ $data->santri->kelas->waliGuru->nama ?? '(Belum Ada Wali Kelas)' }}

        </td>

    </tr>

    {{-- Jarak --}}
    <tr>

        <td colspan="3" style="height:18px;"></td>

    </tr>

    {{-- Jabatan Bawah --}}
    <tr>

        <td class="text-center jabatan">

            Pengasuh

        </td>

        <td class="text-center jabatan">

            Mengetahui,

        </td>

        <td class="text-center jabatan">

            Kepala Madrasah

        </td>

    </tr>

    {{-- Ruang TTD --}}
    <tr>

        <td class="ttd-space"></td>

        <td></td>

        <td class="ttd-space"></td>

    </tr>

    {{-- Nama --}}
    <tr>

        <td class="text-center footer-bold">

            KH. ABDUL HAMID AHMAD

        </td>

        <td></td>

        <td class="text-center footer-bold">

            M. FIRMAN MAULANA

        </td>

    </tr>

</table>
