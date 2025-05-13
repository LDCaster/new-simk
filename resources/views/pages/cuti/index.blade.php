@extends('../maincms')

@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <h3>Data Cuti</h3>
                        <a href="{{ route('cuti.create') }}" class="btn btn-success mb-3">Ajukan Cuti</a>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>

                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Tanggal Cuti</th>
                                            <th>Alasan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuti as $index => $c)
                                            <tr>
                                                <td>{{ $index + 1 }}</td> <!-- Menambahkan Nomor Urut -->
                                                <td>{{ $c->karyawan->nama ?? '-' }}</td>
                                                <td>{{ $c->tanggal_cuti }}</td>
                                                <td>{{ $c->alasan }}</td>
                                                <td>{{ $c->status_pengajuan }}</td>
                                                <td>
                                                    <form action="{{ route('cuti.updateStatus', $c->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        <select name="status_pengajuan" onchange="this.form.submit()"
                                                            class="form-control 
                                                    @if ($c->status_pengajuan == 'DIAJUKAN') bg-light 
                                                    @elseif($c->status_pengajuan == 'DISETUJUI_PENGAWAS') bg-success 
                                                    @elseif($c->status_pengajuan == 'DISETUJUI_HRD') bg-primary 
                                                    @elseif($c->status_pengajuan == 'DISETUJUI_PJO') bg-warning 
                                                    @elseif($c->status_pengajuan == 'DITOLAK') bg-danger @endif">
                                                            <option value="DIAJUKAN"
                                                                {{ $c->status_pengajuan == 'DIAJUKAN' ? 'selected' : '' }}>
                                                                Diajukan</option>
                                                            <option value="DISETUJUI_PENGAWAS"
                                                                {{ $c->status_pengajuan == 'DISETUJUI_PENGAWAS' ? 'selected' : '' }}>
                                                                Disetujui Pengawas</option>
                                                            <option value="DISETUJUI_HRD"
                                                                {{ $c->status_pengajuan == 'DISETUJUI_HRD' ? 'selected' : '' }}>
                                                                Disetujui HRD</option>
                                                            <option value="DISETUJUI_PJO"
                                                                {{ $c->status_pengajuan == 'DISETUJUI_PJO' ? 'selected' : '' }}>
                                                                Disetujui PJO</option>
                                                            <option value="DITOLAK"
                                                                {{ $c->status_pengajuan == 'DITOLAK' ? 'selected' : '' }}>
                                                                Ditolak</option>
                                                        </select>
                                                    </form>

                                                    <!-- Tombol Hapus untuk Superadmin, HRD, atau Karyawan jika belum disetujui pengawas -->
                                                    @if (auth()->user()->role == 'superadmin' ||
                                                            auth()->user()->role == 'hrd' ||
                                                            ($c->status_pengajuan == 'DIAJUKAN' && auth()->user()->role == 'karyawan'))
                                                        <form action="{{ route('cuti.destroy', $c->id) }}" method="POST"
                                                            style="display: inline;"
                                                            onsubmit="return confirm('Yakin ingin menghapus pengajuan cuti?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"> <i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Lobibox.notify('success', {
                    msg: "{{ session('success') }}"
                });
            });
        </script>
    @endif
@endsection
