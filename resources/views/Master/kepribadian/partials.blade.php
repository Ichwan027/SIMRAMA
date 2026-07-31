<div class="card">

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">

                Kepribadian

            </label>

            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama', $data->nama ?? '') }}" required>

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

            <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $data->urutan ?? 1) }}"
                required>

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

                    Nonaktif

                </option>

            </select>

        </div>

    </div>

</div>
