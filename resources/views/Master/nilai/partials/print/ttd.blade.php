@php
    use Carbon\Carbon;

    Carbon::setLocale('id');

    $tanggalCetak = now()->translatedFormat('d F Y');
@endphp

<table class="table-ttd">

    <tr>

        {{-- ORANG TUA --}}
        <td class="ttd">

            <div class="tanggal">&nbsp;</div>

            <div class="jabatan">
                Orang Tua / Wali Santri
            </div>

            <div class="space"></div>

            <div class="garis"></div>

            <div class="nama">
                &nbsp;
            </div>

        </td>

        {{-- WALI KELAS --}}
        <td class="ttd">

            <div class="tanggal">&nbsp;</div>

            <div class="jabatan">
                Wali Kelas
            </div>

            <div class="space"></div>

            <div class="garis"></div>

            <div class="nama">
                {{ $data->santri->kelas->waliGuru->nama ?? '-' }}
            </div>

        </td>

        {{-- KEPALA MADRASAH --}}
        <td class="ttd">

            <div class="tanggal">
                Surabaya, {{ $tanggalCetak }}
            </div>

            <div class="jabatan">
                Kepala Madrasah
            </div>

            <div class="space"></div>

            <div class="garis"></div>

            <div class="nama">
                {{ $pengaturan->kepala_madrasah }}

                @if (!empty($pengaturan->nip_kepala))
                    <br>
                    NIP. {{ $pengaturan->nip_kepala }}
                @endif
            </div>

        </td>

    </tr>

</table>