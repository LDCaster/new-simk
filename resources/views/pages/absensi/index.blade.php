@extends('../maincms')

@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <h3>Absensi Bulan {{ $bulan }} Tahun {{ $tahun }}</h3>

                        <form method="GET" action="{{ route('absensi.index') }}" class="form-inline mb-3">
                            <select name="bulan" class="form-control mr-2">
                                @foreach (range(1, 12) as $b)
                                    <option value="{{ $b }}" {{ $b == $bulan ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $b)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="tahun" class="form-control mr-2">
                                @for ($t = date('Y') - 5; $t <= date('Y') + 1; $t++)
                                    <option value="{{ $t }}" {{ $t == $tahun ? 'selected' : '' }}>
                                        {{ $t }}
                                    </option>
                                @endfor
                            </select>
                            <button class="btn btn-primary" type="submit">Tampilkan</button>
                        </form>

                        <form method="POST" action="{{ route('absensi.bulk-update') }}">
                            @csrf
                            <div class="table-responsive">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead class="text-center bg-dark text-white">
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Dep</th>
                                            <th>Action</th>
                                            @foreach ($tanggalArray as $tanggal)
                                                <th>{{ \Carbon\Carbon::parse($tanggal)->format('d') }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawans as $karyawan)
                                            <tr>
                                                <td>{{ $karyawan->nama }}</td>
                                                <td>{{ $karyawan->nip }}</td>
                                                <td>{{ $karyawan->dept }}</td>
                                                <td>
                                                    <!-- View button to trigger modal -->
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#absensiModal"
                                                        data-karyawan="{{ json_encode($karyawan) }}"
                                                        data-tanggal="{{ json_encode($tanggalArray) }}">
                                                        View
                                                    </button>

                                                </td>
                                                @foreach ($tanggalArray as $tanggal)
                                                    @php
                                                        $absen = $karyawan->absensis->firstWhere('tanggal', $tanggal);
                                                        $status = $absen ? $absen->status_kehadiran : '';
                                                    @endphp
                                                    <td>
                                                        @if (auth()->user()->role !== 'karyawan')
                                                            <select
                                                                name="absensi[{{ $karyawan->id }}][{{ $tanggal }}]"
                                                                class="form-control form-control-sm">
                                                                <option value="">-</option>
                                                                <option value="HADIR"
                                                                    {{ $status == 'HADIR' ? 'selected' : '' }}>H</option>
                                                                <option value="IZIN"
                                                                    {{ $status == 'IZIN' ? 'selected' : '' }}>I</option>
                                                                <option value="SAKIT"
                                                                    {{ $status == 'SAKIT' ? 'selected' : '' }}>S</option>
                                                                <option value="ALPA"
                                                                    {{ $status == 'ALPA' ? 'selected' : '' }}>A</option>
                                                            </select>
                                                        @else
                                                            <input type="text" readonly
                                                                class="form-control form-control-sm text-center bg-light"
                                                                value="{{ substr($status, 0, 1) ?? '-' }}">
                                                        @endif

                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if (auth()->user()->role !== 'karyawan')
                                <div class="text-right mt-3">
                                    <button class="btn btn-success">Simpan Perubahan</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for viewing attendance -->
    <div class="modal fade" id="absensiModal" tabindex="-1" role="dialog" aria-labelledby="absensiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="absensiModalLabel">Detail Absensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="absensiDetails"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Lobibox.notify('success', {
                    msg: "{{ session('success') }}"
                });
            });
        </script>
    @endif

    <!-- Script to populate modal with attendance data -->
    <script>
        $('#absensiModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var karyawan = button.data('karyawan');
            var tanggalArray = button.data('tanggal');

            var modal = $(this);
            var absensiDetails = '<ul>';

            for (var i = 0; i < tanggalArray.length; i++) {
                var status = '';
                var absen = karyawan.absensis.find(function(a) {
                    return a.tanggal === tanggalArray[i];
                });
                if (absen) {
                    status = absen.status_kehadiran;
                }
                absensiDetails += '<li>' + tanggalArray[i] + ': ' + (status || '-') + '</li>';
            }

            absensiDetails += '</ul>';

            modal.find('#absensiDetails').html(absensiDetails);
        });
    </script>
@endsection
