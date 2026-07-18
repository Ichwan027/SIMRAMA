<div class="row">

    {{-- Nama Kelas --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Nama Kelas
            <span class="text-danger">*</span>
        </label>

        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
            value="{{ old('nama', $data->nama ?? '') }}" placeholder="Contoh : Kelas 1">

        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Kode Kelas

            <span class="text-danger">*</span>

        </label>

        <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
            value="{{ old('kode', $data->kode ?? '') }}" placeholder="Contoh : KLS1">

        @error('kode')
            <div class="invalid-feedback">

                {{ $message }}

            </div>
        @enderror

    </div>

    {{-- Wali Kelas --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Wali Kelas
        </label>

        <select name="wali_guru_id" class="form-select @error('wali_guru_id') is-invalid @enderror">

            <option value="">
                -- Pilih Wali Kelas --
            </option>

            @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}" @selected(old('wali_guru_id', $data->wali_guru_id ?? '') == $guru->id)>

                    {{ $guru->nama }}

                </option>
            @endforeach

        </select>

        @error('wali_guru_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Urutan --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Urutan
            <span class="text-danger">*</span>
        </label>

        <input type="number" name="urutan" min="1" class="form-control @error('urutan') is-invalid @enderror"
            value="{{ old('urutan', $data->urutan ?? '') }}">

        @error('urutan')
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

        <select name="status" class="form-select @error('status') is-invalid @enderror">

            <option value="1" @selected(old('status', $data->status ?? 1) == 1)>
                Aktif
            </option>

            <option value="0" @selected(old('status', $data->status ?? 1) == 0)>
                Nonaktif
            </option>

        </select>

        @error('status')
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
