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
                                <a class="Information Information-color mg-b-10" href="#" data-toggle="modal"
                                    data-target="#createResignasiModal"><i class="fa fa-plus" aria-hidden="true"></i>
                                    Tambah Data</a>

                            </div>
                            <div id="InformationproModalalert"
                                class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header header-color-modal bg-color-2">
                                            <h4 class="modal-title">Log Resignasi </h4>
                                        </div>
                                        <div class="modal-body">
                                            <span class="educate-icon educate-info modal-check-pro information-icon-pro">
                                            </span>
                                            <table id="logTable" class="table" data-toggle="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Keluar</th>
                                                        <th>Keterangan Keluar</th>
                                                        <th>Aksi</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($log_resignasi as $index => $log)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $log->karyawan->nama }}</td>
                                                            <td>{{ $log->tanggal_keluar }}</td>
                                                            <td>{{ $log->keterangan_keluar }}</td>
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
                                            <th data-field="tanggal_keluar" data-editable="false">Tanggal Keluar</th>
                                            <th data-field="keterangan_keluar" data-editable="false">Keterangan Keluar
                                            </th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($resign as $index => $k)
                                            <tr>
                                                <td></td>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $k->karyawan->nama }}</td>
                                                <td>{{ $k->tanggal_keluar }}</td>
                                                <td>{{ $k->keterangan_keluar }}</td>
                                                <td class="datatable-ct">
                                                    <a href="#" class="btn btn-sm btn-warning edit-resignasi"
                                                        data-id="{{ $k->id }}" data-nama="{{ $k->karyawan->nama }}"
                                                        data-tanggal_keluar="{{ $k->tanggal_keluar }}"
                                                        data-keterangan_keluar="{{ $k->keterangan_keluar }}"
                                                        data-url="{{ route('data-resign.update', $k->id) }}"
                                                        data-toggle="modal" data-target="#updateResignasiModal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger delete-resign"
                                                        data-id="{{ $k->id }}" data-nama="{{ $k->karyawan->nama }}"
                                                        data-tanggal_keluar="{{ $k->tanggal_keluar }}"
                                                        data-keterangan_keluar="{{ $k->keterangan_keluar }}"
                                                        data-url="{{ route('data-resign.destroy', $k->id) }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

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

    <!-- Modal Tambah Resignasi -->
    <div id="createResignasiModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Resignasi</h4>
                </div>
                <div class="modal-body">
                    <form id="createResignasiForm">
                        @csrf
                        <div class="form-group">
                            <label for="id_karyawan">Nama Karyawan</label>
                            <select class="form-control" id="id_karyawan" name="id_karyawan" required>
                                <option value="">-- Pilih Karyawan --</option>
                                @foreach ($karyawanBelumResign as $karyawan)
                                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_keluar">Keterangan Keluar</label>
                            <textarea class="form-control" id="keterangan_keluar" name="keterangan_keluar" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Kontrak -->
    <div id="updateResignasiModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Resignasi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="updateKontrakForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="resignasi_id" name="id">

                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <input type="text" id="nama" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Keluar</label>
                            <input type="date" id="update_tanggal_keluar" name="tanggal_keluar" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Keterangan Keluar</label>
                            <textarea name="keterangan_keluar" id="update_keterangan_keluar" cols="30" rows="10"></textarea>
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
                    let action = row.children[4].textContent.trim(); // Ambil kolom "Aksi"

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

    {{-- CREATE --}}
    <script>
        $("#createResignasiForm").submit(function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('data-resign.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    $("#createResignasiModal").modal("hide");

                    Lobibox.notify('success', {
                        msg: response.status // Tampilkan pesan sukses
                    });

                    setTimeout(() => location.reload(), 1000); // Tunggu 1 detik sebelum reload
                },
                error: function(xhr) {
                    Lobibox.notify('error', {
                        msg: "Terjadi kesalahan, coba lagi!"
                    });
                }
            });
        });
    </script>
    {{-- END CREATE --}}

    <script>
        $(document).ready(function() {
            $(".edit-resignasi").on("click", function() {
                let id = $(this).data("id");
                let nama = $(this).data("nama");
                let tanggal_keluar = $(this).data("tanggal_keluar");
                let keterangan_keluar = $(this).data("keterangan_keluar");
                let url = $(this).data("url");
                $("#resignasi_id").val(id);
                $("#nama").val(nama); // Pastikan ini mengisi input nama
                $("#update_tanggal_keluar").val(tanggal_keluar);
                $("#update_keterangan_keluar").val(keterangan_keluar);
                $("#updateKontrakForm").attr("action", url);
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete-resign', function(e) {
            e.preventDefault();
            let nama = $(this).data("nama");
            let tanggal_keluar = $(this).data("tanggal_keluar");
            let url = $(this).data('url');

            Lobibox.confirm({
                msg: `Apakah Anda yakin ingin menghapus Data Resign ${nama} (${tanggal_keluar}) ini?`,
                buttons: {
                    yes: {
                        text: 'Ya',
                        closeOnClick: true
                    },
                    no: {
                        text: 'Batal',
                        closeOnClick: true
                    }
                },
                callback: function($this, type) {
                    if (type === 'yes') {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _method: 'DELETE', // Laravel akan membaca ini sebagai DELETE
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Lobibox.notify('success', {
                                    msg: "Data Resign berhasil dihapus!"
                                });
                                setTimeout(() => location.reload(),
                                    1000); // Reload setelah notifikasi
                            },
                            error: function(xhr) {
                                Lobibox.notify('error', {
                                    msg: "Terjadi kesalahan, coba lagi!"
                                });
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
