<form action="{{ route('nilai-akademik.store', $data->id) }}" method="POST">

    @csrf

    <div class="card mt-4">

        <div class="card-body">
            <h5>Nilai Akademik</h5>

            <table class="table table-bordered align-middle mb-0">

                <thead>

                    <tr>

                        <th width="5%">No</th>

                        <th>Mata Pelajaran</th>

                        <th>Guru</th>

                        <th width="10%">KKM</th>

                        <th width="10%">Nilai</th>

                        <th width="10%">Predikat</th>

                        <th>Deskripsi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($guruMengajars as $item)
                        <tr>

                            <td>
                                {{ $loop->iteration }}

                                <input type="hidden" name="guru_mengajar_id[]" value="{{ $item->id }}">
                            </td>

                            <td>
                                {{ $item->mapel->nama }}
                            </td>

                            <td>
                                {{ $item->guru?->nama }}
                            </td>

                            <td>

                                <input type="number" name="kkm[]" class="form-control"
                                    value="{{ old('kkm.' . $loop->index, $item->nilaiDetail->kkm ?? 75) }}">

                            </td>

                            <td>

                                <input type="number" name="nilai_angka[]" class="form-control" min="0"
                                    max="100"
                                    value="{{ old('nilai_angka.' . $loop->index, $item->nilaiDetail->nilai_angka ?? '') }}">

                            </td>

                            <td>

                                @if ($item->nilaiDetail && $item->nilaiDetail->predikat)
                                    <span class="badge bg-success">

                                        {{ $item->nilaiDetail?->predikat?->predikat ?? '-' }}

                                    </span>
                                @else
                                    <span class="badge bg-secondary">

                                        Otomatis

                                    </span>
                                @endif

                            </td>

                            <td>

                                <textarea name="deskripsi[]" rows="2" class="form-control">{{ old('deskripsi.' . $loop->index, $item->nilaiDetail->deskripsi ?? '') }}</textarea>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center">

                                Tidak ada mata pelajaran.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="row align-items-end mt-3">

            <div class="col-md-2">

                <label class="form-label fw-bold">
                    Peringkat
                </label>

                <input type="number" class="form-control" name="peringkat" min="1"
                    value="{{ old('peringkat', $data->peringkat) }}" placeholder="1">

            </div>

        </div>

        <div class="card-footer text-end">

            <button class="btn btn-primary">

                Simpan Nilai Akademik

            </button>

        </div>



    </div>

</form>
