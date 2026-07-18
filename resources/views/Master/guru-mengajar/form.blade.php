<div class="row">

    {{-- Guru --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Guru
            <span class="text-danger">*</span>
        </label>

        <select name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">

            <option value="">-- Pilih Guru --</option>

            @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}" @selected(old('guru_id', $data->guru_id ?? '') == $guru->id)>

                    {{ $guru->nama }}

                </option>
            @endforeach

        </select>

        @error('guru_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Kelas --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Kelas
            <span class="text-danger">*</span>
        </label>

        <select name="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror">

            <option value="">-- Pilih Kelas --</option>

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

    {{-- Mapel --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Mata Pelajaran
            <span class="text-danger">*</span>
        </label>

        <select name="mapel_id" class="form-select @error('mapel_id') is-invalid @enderror">

            <option value="">-- Pilih Mapel --</option>

            @foreach ($mapels as $mapel)
                <option value="{{ $mapel->id }}" @selected(old('mapel_id', $data->mapel_id ?? '') == $mapel->id)>

                    {{ $mapel->nama }}

                </option>
            @endforeach

        </select>

        @error('mapel_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Tahun Ajaran --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Tahun Ajaran
            <span class="text-danger">*</span>
        </label>

        <select name="tahun_ajaran_id" class="form-select @error('tahun_ajaran_id') is-invalid @enderror">

            <option value="">-- Pilih Tahun Ajaran --</option>

            @foreach ($tahunAjarans as $tahun)
                <option value="{{ $tahun->id }}" @selected(old('tahun_ajaran_id', $data->tahun_ajaran_id ?? '') == $tahun->id)>

                    {{ $tahun->tahun }}

                </option>
            @endforeach

        </select>

        @error('tahun_ajaran_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Semester --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Semester
            <span class="text-danger">*</span>
        </label>

        <select name="semester_id" class="form-select @error('semester_id') is-invalid @enderror">

            <option value="">-- Pilih Semester --</option>

            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}" @selected(old('semester_id', $data->semester_id ?? '') == $semester->id)>

                    {{ $semester->nama }}

                </option>
            @endforeach

        </select>

        @error('semester_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<hr>

<div class="d-flex justify-content-end gap-2">

    <a href="{{ route($route . '.index') }}" class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

    <button class="btn btn-primary">

        <i class="bi bi-save"></i>
        Simpan

    </button>

</div>
