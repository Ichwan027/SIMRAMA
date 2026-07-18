<div class="card mt-4">

    <div class="card-body">

        <h5>Catatan Wali Kelas</h5>

        <form action="{{ route('nilai.catatan', $data->id) }}" method="POST">

            @csrf

            <textarea
                name="catatan"
                rows="5"
                class="form-control"
                placeholder="Masukkan catatan wali kelas..."
            >{{ old('catatan', $data->catatan) }}</textarea>

            <div class="text-end mt-3">

                <button class="btn btn-primary">

                    Simpan Catatan

                </button>

            </div>

        </form>

    </div>

</div>