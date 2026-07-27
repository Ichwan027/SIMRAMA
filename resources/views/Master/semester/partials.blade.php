<div class="card">

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">

                IMDA

            </label>

            <select name="nama" class="form-select @error('nama') is-invalid @enderror">

                <option value="">-- Pilih Imda --</option>

                <option value="Ganjil" {{ old('nama', $data->nama ?? '') == '1' ? 'selected' : '' }}>

                    1 (Satu)

                </option>

                <option value="Genap" {{ old('nama', $data->nama ?? '') == '2' ? 'selected' : '' }}>

                    2 (Dua)

                </option>

            </select>

            @error('nama')
                <div class="invalid-feedback">

                    {{ $message }}

                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Urutan

            </label>

            <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $data->urutan ?? 1) }}">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Status

            </label>

            <select name="aktif" class="form-select">

                <option value="1" {{ old('aktif', $data->aktif ?? 1) == 1 ? 'selected' : '' }}>

                    Aktif

                </option>

                <option value="0" {{ old('aktif', $data->aktif ?? 1) == 0 ? 'selected' : '' }}>

                    Non Aktif

                </option>

            </select>

        </div>

    </div>

</div>
