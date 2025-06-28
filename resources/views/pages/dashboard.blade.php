@extends('../maincms')

@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">

            {{-- Jika Super Admin, tampilkan statistik --}}
            @if (Auth::user()->role === 'super admin')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sparkline13-list text-center p-3 bg-light">
                            <h5>Total Karyawan</h5>
                            <h3>{{ $totalKaryawan }}</h3>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sparkline13-list text-center p-3 bg-light">
                            <h5>Total Resign</h5>
                            <h3>{{ $totalResign }}</h3>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sparkline13-list text-center p-3 bg-light">
                            <h5>Total Pengguna Aplikasi</h5>
                            <h3>{{ $totalPengguna }}</h3>
                        </div>
                    </div>
                </div>
                <hr>
            @endif

            {{-- Kalau ada data karyawan --}}
            @if ($karyawan)
                <div class="row">
                    <div class="col-lg-12">
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

                            <h4>Pengajuan Cuti</h4>
                            @if ($cuti)
                                <p>Tanggal Cuti: {{ \Carbon\Carbon::parse($cuti->tanggal_cuti)->format('d-m-Y') }}</p>
                                <p>Alasan: {{ $cuti->alasan }}</p>
                                <p>Status:
                                    @if ($cuti->status_pengajuan === 'diterima')
                                        <span class="badge badge-success">Diterima</span>
                                    @elseif ($cuti->status_pengajuan === 'ditolak')
                                        <span class="badge badge-danger">Ditolak</span>
                                    @else
                                        <span class="badge badge-warning">Menunggu</span>
                                    @endif
                                </p>
                            @else
                                <p>Belum ada pengajuan cuti.</p>
                            @endif

                            @if (!$cuti || $cuti->status_pengajuan != 'DIAJUKAN')
                                <a href="{{ route('cuti.create') }}" class="btn btn-primary">Ajukan Cuti</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
