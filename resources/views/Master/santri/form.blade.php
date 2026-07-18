<div class="row">

    {{-- Nama --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Nama Santri
            <span class="text-danger">*</span>
        </label>

        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
            value="{{ old('nama', $data->nama ?? '') }}">

        @error('nama')
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

        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">

            <option value="">-- Pilih --</option>

            <option value="Laki-laki" @selected(old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Laki-laki')>
                Laki-laki
            </option>

            <option value="Perempuan" @selected(old('jenis_kelamin', $data->jenis_kelamin ?? '') == 'Perempuan')>
                Perempuan
            </option>

        </select>

        @error('jenis_kelamin')
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

        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror"
            value="{{ old('tempat_lahir', $data->tempat_lahir ?? '') }}">

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

        <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
            value="{{ old('tanggal_lahir', isset($data) && $data->tanggal_lahir ? $data->tanggal_lahir->format('Y-m-d') : '') }}">

        @error('tanggal_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Nama Wali --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Nama Wali
        </label>

        <input type="text" name="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror"
            value="{{ old('nama_wali', $data->nama_wali ?? '') }}">

        @error('nama_wali')
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

        <select name="status" class="form-select">

            <option value="1" @selected(old('status', $data->status ?? 1) == 1)>
                Aktif
            </option>

            <option value="0" @selected(old('status', $data->status ?? 1) == 0)>
                Nonaktif
            </option>

        </select>
    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Kelas
        </label>

        <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">

            <option value="">
                -- Pilih Kelas --
            </option>

            @foreach ($kelas as $item)
                <option value="{{ $item->id }}" @selected(old('kelas_id', $data->kelas_id ?? '') == $item->id)>

                    {{ $item->nama }}

                </option>
            @endforeach

        </select>

        @error('kelas_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Foto --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Foto Santri
        </label>

        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

        @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @isset($data)

            @if ($data->foto)
                <div class="mt-3">

                    <img src="{{ asset('storage/' . $data->foto) }}" class="img-thumbnail" width="150">

                </div>
            @endif

        @endisset

    </div>

    {{-- Alamat --}}
    <div class="col-md-12 mb-4">

        <label class="form-label">
            Alamat
        </label>

        <textarea name="alamat" rows="4" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $data->alamat ?? '') }}</textarea>

        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<hr>

<div class="d-flex justify-content-end">

    <a href="{{ route($route . '.index') }}" class="btn btn-secondary me-2">

        <i class="bi bi-arrow-left"></i>

        Kembali

    </a>

    <button type="submit" class="btn btn-primary">

        <i class="bi bi-save"></i>

        Simpan

    </button>

</div>
