<div class="row">

    {{-- Nama Guru --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Nama Guru
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="nama"
            class="form-control @error('nama') is-invalid @enderror"
            value="{{ old('nama', $data->nama ?? '') }}"
            placeholder="Masukkan nama guru">

        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Jabatan --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Jabatan
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="jabatan"
            class="form-control @error('jabatan') is-invalid @enderror"
            value="{{ old('jabatan', $data->jabatan ?? '') }}"
            placeholder="Contoh : Kepala Madrasah">

        @error('jabatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Jenis Kelamin --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Jenis Kelamin
            <span class="text-danger">*</span>
        </label>

        <select
            name="jenis_kelamin"
            class="form-select @error('jenis_kelamin') is-invalid @enderror">

            <option value="">-- Pilih Jenis Kelamin --</option>

            <option value="Laki-laki"
                @selected(old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Laki-laki')>
                Laki-laki
            </option>

            <option value="Perempuan"
                @selected(old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Perempuan')>
                Perempuan
            </option>

        </select>

        @error('jenis_kelamin')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Telepon --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Nomor Telepon
        </label>

        <input
            type="text"
            name="telepon"
            class="form-control @error('telepon') is-invalid @enderror"
            value="{{ old('telepon', $data->telepon ?? '') }}"
            placeholder="08xxxxxxxxxx">

        @error('telepon')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Tempat Lahir --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Tempat Lahir
        </label>

        <input
            type="text"
            name="tempat_lahir"
            class="form-control @error('tempat_lahir') is-invalid @enderror"
            value="{{ old('tempat_lahir', $data->tempat_lahir ?? '') }}"
            placeholder="Masukkan tempat lahir">

        @error('tempat_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Tanggal Lahir --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Tanggal Lahir
        </label>

        <input
            type="date"
            name="tanggal_lahir"
            class="form-control @error('tanggal_lahir') is-invalid @enderror"
            value="{{ old('tanggal_lahir', isset($data) && $data->tanggal_lahir ? $data->tanggal_lahir->format('Y-m-d') : '') }}">

        @error('tanggal_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Email --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Email
        </label>

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $data->email ?? '') }}"
            placeholder="guru@email.com">

        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Status --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select">

            <option value="1"
                @selected(old('status', $data->status ?? 1)==1)>
                Aktif
            </option>

            <option value="0"
                @selected(old('status', $data->status ?? 1)==0)>
                Nonaktif
            </option>

        </select>

    </div>

    {{-- Foto --}}
    <div class="col-md-12 mb-3">

        <label class="form-label">
            Foto Guru
        </label>

        <input
            type="file"
            name="foto"
            class="form-control @error('foto') is-invalid @enderror">

        @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @isset($data)

            @if($data->foto)

                <div class="mt-3">

                    <img
                        src="{{ asset('storage/'.$data->foto) }}"
                        class="img-thumbnail"
                        width="180">

                </div>

            @endif

        @endisset

    </div>

    {{-- Alamat --}}
    <div class="col-md-12 mb-4">

        <label class="form-label">
            Alamat
        </label>

        <textarea
            name="alamat"
            rows="5"
            class="form-control @error('alamat') is-invalid @enderror"
            placeholder="Masukkan alamat lengkap">{{ old('alamat', $data->alamat ?? '') }}</textarea>

        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<hr>

<div class="d-flex justify-content-end">

    <a
        href="{{ route($route.'.index') }}"
        class="btn btn-secondary me-2">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        <i class="bi bi-save"></i>

        Simpan

    </button>

</div>