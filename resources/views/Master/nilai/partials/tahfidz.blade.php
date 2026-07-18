<div class="card mt-4">

    <div class="card-body">

        <h5>Nilai Tahfidz</h5>

        <form action="{{ route('nilai.tahfidz', $data->id) }}" method="POST">

            @csrf

            <table class="table table-bordered align-middle">

                <thead>

                    <tr>

                        <th width="50">No</th>

                        <th>Tahfidz</th>

                        <th width="160">Nilai</th>

                        <th width="100">Predikat</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse ($tahfidzs as $index => $tahfidz)

                        @php

                            $detail = $nilaiTahfidzs[$tahfidz->id] ?? null;

                        @endphp

                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td>{{ $tahfidz->nama }}</td>

                            <td>

                                <select class="form-select nilai-tahfidz" name="nilai[{{ $tahfidz->id }}]"
                                    data-target="predikat-{{ $tahfidz->id }}">

                                    <option value="">-</option>

                                    @foreach (['A', 'B', 'C', 'D', 'E'] as $huruf)
                                        <option value="{{ $huruf }}"
                                            {{ optional($detail)->nilai == $huruf ? 'selected' : '' }}>

                                            {{ $huruf }}

                                        </option>
                                    @endforeach

                                </select>

                            </td>

                            <td>

                                <span id="predikat-{{ $tahfidz->id }}" class="badge bg-success">

                                    {{ optional($detail)->nilai }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                Belum ada data tahfidz.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="text-end">

                <button class="btn btn-primary">

                    Simpan Nilai Tahfidz

                </button>

            </div>

        </form>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.nilai-tahfidz').forEach(function(select) {

            function update() {

                document.getElementById(select.dataset.target).innerHTML = select.value;

            }

            update();

            select.addEventListener('change', update);

        });

    });
</script>
