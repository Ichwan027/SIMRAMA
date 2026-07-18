<div class="card mt-4">

    <div class="card-body">

        <h5 class="mb-3">

            Nilai Kepribadian

        </h5>

        <form action="{{ route('nilai.kepribadian', $data->id) }}" method="POST">

            @csrf

            <table class="table table-bordered align-middle">

                <thead>

                    <tr>

                        <th width="50">No</th>

                        <th>Kepribadian</th>

                        <th width="150">Nilai</th>

                        <th width="100">Predikat</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($kepribadians as $index => $item)

                        @php

                            $detail = $nilaiKepribadians[$item->id] ?? null;

                        @endphp

                        <tr>

                            <td>

                                {{ $index + 1 }}

                            </td>

                            <td>

                                {{ $item->nama }}

                            </td>

                            <td>

                                <select

                                    name="nilai[{{ $item->id }}]"

                                    class="form-select">

                                    <option value="">-</option>

                                    <option value="A"

                                        @selected(optional($detail)->nilai == 'A')>

                                        A

                                    </option>

                                    <option value="B"

                                        @selected(optional($detail)->nilai == 'B')>

                                        B

                                    </option>

                                    <option value="C"

                                        @selected(optional($detail)->nilai == 'C')>

                                        C

                                    </option>

                                    <option value="D"

                                        @selected(optional($detail)->nilai == 'D')>

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

                <button

                    class="btn btn-primary"

                    type="submit">

                    Simpan Nilai Kepribadian

                </button>

            </div>

        </form>

    </div>

</div>