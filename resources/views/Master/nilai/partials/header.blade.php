<div class="card shadow-sm mb-4">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="mb-0 fw-bold">

                <i class="bi bi-person-vcard me-2"></i>

                Identitas Santri

            </h5>

            <a href="{{ route('nilai.cetak', $data->id) }}" target="_blank" class="btn btn-danger">

                <i class="bi bi-printer"></i>

                Cetak Raport

            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="fw-bold text-muted">
                    Nama Santri
                </label>

                <div class="fs-5">
                    {{ $data->santri->nama }}
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="fw-bold text-muted">
                    Semester
                </label>

                <div class="fs-5">
                    {{ $data->semester->nama }}
                </div>

            </div>

            <div class="col-md-6">

                <label class="fw-bold text-muted">
                    Kelas
                </label>

                <div class="fs-5">
                    {{ $data->santri->kelas->nama }}
                </div>

            </div>

            <div class="col-md-6">

                <label class="fw-bold text-muted">
                    Tahun Ajaran
                </label>

                <div class="fs-5">
                    {{ $data->tahunAjaran->tahun }}
                </div>

            </div>

        </div>

    </div>

</div>
