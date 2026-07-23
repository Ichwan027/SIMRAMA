<div class="row">

    {{-- Nama Tilawati --}}
    <div class="col-md-8 mb-3">

        <label class="form-label">
            Nama Tilawati
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="nama"
            class="form-control @error('nama') is-invalid @enderror"
            value="{{ old('nama', $data->nama ?? '') }}"
            placeholder="Contoh : Fashohah">

        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Urutan --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Urutan
            <span class="text-danger">*</span>
        </label>

        <input
            type="number"
            min="1"
            name="urutan"
            class="form-control @error('urutan') is-invalid @enderror"
            value="{{ old('urutan', $data->urutan ?? '') }}">

        @error('urutan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Status --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select @error('status') is-invalid @enderror">

            <option value="1"
                @selected(old('status', $data->status ?? 1) == 1)>
                Aktif
            </option>

            <option value="0"
                @selected(old('status', $data->status ?? 1) == 0)>
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