@extends('../maincms')

@section('content')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Data <span class="table-project-n">Kontrak Kerja</span> </h1>
                            </div>
                            <div class="modal-area-button" style="margin-left: -5px;">
                                <a class="Information Information-color mg-b-10" href="#" data-toggle="modal"
                                    data-target="#InformationproModalalert"><i class="fa fa-info-circle"
                                        aria-hidden="true"></i> Log</a>
                            </div>
                            <div id="InformationproModalalert"
                                class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header header-color-modal bg-color-2">
                                            <h4 class="modal-title">Log Kontrak Kerja </h4>
                                        </div>
                                        <div class="modal-body">
                                            <span class="educate-icon educate-info modal-check-pro information-icon-pro">
                                            </span>
                                            <table id="logTable" class="table" data-toggle="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kontrak</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Awal</th>
                                                        <th>Tanggal Akhir</th>
                                                        <th>Aksi</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($log_kontrak as $index => $log)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $log->karyawan->nama }}</td>
                                                            <td>{{ $log->jenis_kontrak }}</td>
                                                            <td>{{ $log->status_kontrak_lanjutan }}</td>
                                                            <td>{{ $log->tanggal_awal_kontrak_lanjutan }}</td>
                                                            <td>{{ $log->tanggal_akhir_kontrak_lanjutan }}</td>
                                                            <td>{{ $log->aksi }}</td>
                                                            <td>{{ $log->created_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


                                        </div>
                                        <div class="modal-footer info-md">
                                            <a data-dismiss="modal" href="#">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">No</th>
                                            <th data-field="nama" data-editable="false">Nama</th>
                                            <th data-field="jenis_kontrak" data-editable="false">Jenis Kontrak</th>
                                            <th data-field="status_kontrak_lanjutan" data-editable="false">Status Kontrak
                                            </th>
                                            <th data-field="tanggal_awal_kontrak_lanjutan" data-editable="false">Tanggal
                                                Awal Kontrak Lanjutan</th>
                                            <th data-field="tanggal_akhir_kontrak_lanjutan" data-editable="false">Tanggal
                                                Akhir Kontrak Lanjutan</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kontrak_kerja as $index => $k)
                                            <tr>
                                                <td></td>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $k->karyawan->nama }}</td>
                                                <td>{{ $k->jenis_kontrak }}</td>
                                                <td>{{ $k->status_kontrak_lanjutan == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                                <td>{{ $k->tanggal_awal_kontrak_lanjutan }}</td>
                                                <td>{{ $k->tanggal_akhir_kontrak_lanjutan }}</td>
                                                <td class="datatable-ct">
                                                    <a href="#" class="btn btn-sm btn-warning edit-kontrak"
                                                        data-id="{{ $k->id }}" data-nama="{{ $k->karyawan->nama }}"
                                                        data-jenis="{{ $k->jenis_kontrak }}"
                                                        data-status="{{ $k->status_kontrak_lanjutan }}"
                                                        data-tgl_awal="{{ $k->tanggal_awal_kontrak_lanjutan }}"
                                                        data-tgl_akhir="{{ $k->tanggal_akhir_kontrak_lanjutan }}"
                                                        data-url="{{ route('kontrak-kerja.update', $k->id) }}"
                                                        data-toggle="modal" data-target="#updateKontrakModal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    {{-- <a href="#" class="btn btn-sm btn-danger delete-kontrak"
                                                        data-id="{{ $k->id }}" data-nama="{{ $k->karyawan->nama }}"
                                                        data-jenis="{{ $k->jenis_kontrak }}"
                                                        data-status="{{ $k->status_kontrak_lanjutan }}"
                                                        data-tgl_awal="{{ $k->tanggal_awal_kontrak_lanjutan }}"
                                                        data-tgl_akhir="{{ $k->tanggal_akhir_kontrak_lanjutan }}"
                                                        data-id="{{ $k->id }}"
                                                        data-url="{{ route('kontrak-kerja.destroy', $k->id) }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a> --}}

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
    <!-- Static Table End -->


    <!-- Modal Update Kontrak -->
    <div id="updateKontrakModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kontrak Kerja</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="updateKontrakForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="kontrak_id" name="id">

                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <input type="text" id="nama" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kontrak</label>
                            <select id="jenis_kontrak" name="jenis_kontrak" class="form-control">
                                <option value="PKWT">PKWT</option>
                                <option value="PKWTT">PKWTT</option>
                                <option value="PKWT/PKWTT">PKWT/PKWTT</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status Kontrak</label>
                            <select id="status_kontrak_lanjutan" name="status_kontrak_lanjutan" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" id="tanggal_awal_kontrak_lanjutan" name="tanggal_awal_kontrak_lanjutan"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" id="tanggal_akhir_kontrak_lanjutan"
                                name="tanggal_akhir_kontrak_lanjutan" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.querySelectorAll("#logTable tbody tr").forEach(row => {
                    let action = row.children[6].textContent.trim(); // Ambil kolom "Aksi"

                    if (action === "create") {
                        row.style.backgroundColor = "#90ee90";
                        row.style.color = "white"; // Kontras lebih baik
                    } else if (action === "delete") {
                        row.style.backgroundColor = "#ffcccc";
                    } else if (action === "update") {
                        row.style.backgroundColor = "#d3d3d3";
                    }
                });
            }, 500); // Timeout untuk memastikan table sudah diproses
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".edit-kontrak").on("click", function() {
                let id = $(this).data("id");
                let nama = $(this).data("nama");
                let jenis = $(this).data("jenis");
                let status_kontrak_lanjutan = $(this).data("status");
                let tgl_awal = $(this).data("tgl_awal");
                let tgl_akhir = $(this).data("tgl_akhir");
                let url = $(this).data("url");
                $("#kontrak_id").val(id);
                $("#nama").val(nama); // Pastikan ini mengisi input nama
                $("#jenis_kontrak").val(jenis);
                $("#status_kontrak_lanjutan").val(status_kontrak_lanjutan);
                $("#tanggal_awal_kontrak_lanjutan").val(tgl_awal);
                $("#tanggal_akhir_kontrak_lanjutan").val(tgl_akhir);
                $("#updateKontrakForm").attr("action", url);
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete-kontrak', function(e) {
            e.preventDefault();
            let id = $(this).data("id");
            let nama = $(this).data("nama");
            let jenis = $(this).data("jenis");
            let status_kontrak_lanjutan = $(this).data("status");
            let tgl_awal = $(this).data("tgl_awal");
            let tgl_akhir = $(this).data("tgl_akhir");
            let url = $(this).data('url');

            Lobibox.confirm({
                title: 'Konfirmasi Hapus',
                msg: `Apakah Anda yakin ingin menghapus kontrak ${nama} (${jenis})?`,
                buttons: {
                    yes: {
                        text: 'Ya, Hapus',
                        class: 'lobibox-btn lobibox-btn-yes'
                    },
                    no: {
                        text: 'Batal',
                        class: 'lobibox-btn lobibox-btn-no'
                    }
                },
                callback: function($this, type) {
                    if (type === 'yes') {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Lobibox.notify('success', {
                                    msg: 'Kontrak berhasil dihapus!',
                                    sound: false
                                });
                                setTimeout(() => location.reload(), 1500);
                            },
                            error: function(xhr) {
                                Lobibox.notify('error', {
                                    msg: 'Terjadi kesalahan, coba lagi!',
                                    sound: false
                                });
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
