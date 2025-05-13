@extends('../maincms')

@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <h3>Data Diri Karyawan</h3>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td>{{ $karyawan->nama }}</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>{{ $karyawan->nip }}</td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td>{{ $karyawan->nik }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>{{ $karyawan->tempat_lahir }}, {{ $karyawan->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $karyawan->alamat_rumah }}</td>
                            </tr>
                            <tr>
                                <th>BPJS Kesehatan</th>
                                <td>{{ $karyawan->no_bpjs_kesehatan }}</td>
                            </tr>
                            <tr>
                                <th>BPJS Ketenagakerjaan</th>
                                <td>{{ $karyawan->no_bpjs_ketenagakerjaan }}</td>
                            </tr>
                            <tr>
                                <th>Jadwal Next Cuti</th>
                                <td>{{ $nextCuti }}</td>
                            </tr>
                        </table>

                        <h4>Absensi</h4>
                        @if ($absensi)
                            <p>Presensi terakhir: {{ $absensi->created_at->format('d-m-Y') }}</p>
                            <p>Status: {{ $absensi->status }}</p>
                        @else
                            <p>Belum ada data absensi.</p>
                        @endif

                        <a href="{{ route('cuti.create') }}" class="btn btn-primary">Ajukan Cuti</a>

                        {{-- @if (strtolower($karyawan->bagian) === 'driver')
            <hr>
            <h4>Update Tonase</h4>
            <form action="{{ route('tonase.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tonase">Tonase Hari Ini (Kg):</label>
                    <input type="number" name="tonase" class="form-control" required>
                </div>
                <button class="btn btn-success">Simpan</button>
            </form>
        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
