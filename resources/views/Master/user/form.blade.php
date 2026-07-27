@csrf

@if (isset($data))
    @method('PUT')
@endif

{{-- ========================= --}}
{{-- Nama & Username --}}
{{-- ========================= --}}
<div class="row">

    <div class="col-md-6">

        <div class="mb-3">
            <label class="form-label">
                Nama Lengkap
            </label>

            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $data->name ?? '') }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

    <div class="col-md-6">

        <div class="mb-3">

            <label class="form-label">
                Username
            </label>

            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                value="{{ old('username', $data->username ?? '') }}">

            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

</div>

{{-- ========================= --}}
{{-- Email & Password --}}
{{-- ========================= --}}
<div class="row">

    <div class="col-md-6">

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $data->email ?? '') }}">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

    <div class="col-md-6">

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            @isset($data)
                <small class="text-muted">
                    Kosongkan password jika tidak ingin mengubahnya.
                </small>
            @endisset

        </div>

    </div>

</div>

{{-- ========================= --}}
{{-- Konfirmasi Password --}}
{{-- ========================= --}}
<div class="row">

    <div class="col-md-6">

        <div class="mb-3">

            <label class="form-label">
                Konfirmasi Password
            </label>

            <input type="password" name="password_confirmation" class="form-control">

        </div>

    </div>

</div>

{{-- ========================= --}}
{{-- Role | Guru | Status --}}
{{-- ========================= --}}
<div class="row">

    <div class="col-md-3">

        <div class="mb-3">

            <label class="form-label">
                Role
            </label>

            <select id="role" name="role" class="form-select @error('role') is-invalid @enderror">

                <option value="admin" @selected(old('role', $data->role ?? '') == 'admin')>
                    Admin
                </option>

                <option value="kepala_madrasah" @selected(old('role', $data->role ?? '') == 'kepala_madrasah')>
                    Kepala Madrasah
                </option>

                <option value="ustadz" @selected(old('role', $data->role ?? '') == 'ustadz')>
                    Ustadz / Ustadzah
                </option>

            </select>

            @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

    <div class="col-md-6" id="guru-field">

        <div class="mb-3">

            <label class="form-label">
                Guru
            </label>

            <select id="guru_id" name="guru_id" class="form-select @error('guru_id') is-invalid @enderror">

                <option value="">
                    -- Pilih Guru --
                </option>

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

    </div>

    <div class="col-md-3">

        <div class="mb-3">

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

</div>

<div class="mt-4">

    <button class="btn btn-primary">
        <i class="bi bi-check-circle"></i>
        Simpan
    </button>

    <a href="{{ route($route . '.index') }}" class="btn btn-secondary">
        Kembali
    </a>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const role = document.getElementById('role');
        const guruField = document.getElementById('guru-field');
        const guruSelect = document.getElementById('guru_id');

        function toggleGuru() {

            if (role.value === 'ustadz') {
                guruField.style.display = '';
            } else {
                guruField.style.display = 'none';
                guruSelect.value = '';
            }

        }

        toggleGuru();

        role.addEventListener('change', toggleGuru);

    });
</script>
