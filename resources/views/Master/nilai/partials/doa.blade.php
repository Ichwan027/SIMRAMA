<div class="card mt-4">

    <div class="card-body">

        <h5>Nilai Doa</h5>

        <form action="{{ route('nilai.doa.store', $data->id) }}" method="POST">

            @csrf

            <table class="table table-bordered align-middle">

                <thead>

                    <tr>

                        <th width="60">No</th>

                        <th>Doa</th>

                        <th width="180">Nilai</th>

                        <th width="120">Predikat</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($doaHarians as $index => $doa)
                        @php

                            $detail = $nilaiDoas[$doa->id] ?? null;

                        @endphp

                        <tr>

                            <td>

                                {{ $index + 1 }}

                            </td>

                            <td>

                                {{ $doa->nama }}

                            </td>

                            <td>

                                <select name="nilai[{{ $doa->id }}]" class="form-select">

                                    <option value="">-</option>

                                    <option value="A" @selected(optional($detail)->nilai == 'A')>

                                        A

                                    </option>

                                    <option value="B" @selected(optional($detail)->nilai == 'B')>

                                        B

                                    </option>

                                    <option value="C" @selected(optional($detail)->nilai == 'C')>

                                        C

                                    </option>

                                    <option value="D" @selected(optional($detail)->nilai == 'D')>

                                        D

                                    </option>

                                </select>

                            </td>

                            <td>

                                @if ($detail)
                                    <span class="badge bg-success">

                                        {{ $detail->nilai }}

                                    </span>
                                @endif

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

            <div class="text-end">

                <button class="btn btn-primary">

                    Simpan Nilai Doa

                </button>

            </div>

        </form>

    </div>

</div>
