<div class="card mt-4">

    <div class="card-body">

        <h5>Absensi</h5>

        <form action="{{ route('nilai.absensi', $data->id) }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <label>Sakit</label>

                    <input type="number" min="0" name="sakit" class="form-control"
                        value="{{ old('sakit', $absensi->sakit) }}">

                </div>

                <div class="col-md-4">

                    <label>Izin</label>

                    <input type="number" min="0" name="izin" class="form-control"
                        value="{{ old('izin', $absensi->izin) }}">

                </div>

                <div class="col-md-4">

                    <label>Alpha</label>

                    <input type="number" min="0" name="alpha" class="form-control"
                        value="{{ old('alpha', $absensi->alpha) }}">

                </div>

            </div>

            <div class="text-end mt-3">

                <button class="btn btn-primary">

                    Simpan Absensi

                </button>

            </div>

        </form>

    </div>

</div>
