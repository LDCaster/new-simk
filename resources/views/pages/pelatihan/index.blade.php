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
                                <h1>Data <span class="table-project-n">Pelatihan</span> </h1>
                            </div>
                            <div class="modal-area-button" style="margin-left: -5px;">
                                <a class="Information Information-color mg-b-10" href="#" data-toggle="modal"
                                    data-target="#createPelatihanModal"><i class="fa fa-plus" aria-hidden="true"></i>
                                    Tambah Data</a>

                            </div>
                            {{-- History --}}
                            <div id="InformationproModalalert"
                                class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header header-color-modal bg-color-2">
                                            <h4 class="modal-title">History Pelatihan (Nama Karyawan)</h4>
                                        </div>
                                        <div class="modal-body">
                                            <span class="educate-icon educate-info modal-check-pro information-icon-pro">
                                            </span>
                                            <table id="logTable" class="table" data-toggle="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Pelatihan</th>
                                                        <th>Tanggal</th>
                                                        <th>File Pelatihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

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
                                            <th data-field="nama_pelatihan" data-editable="false">Pelatihan</th>
                                            <th data-field="tanggal_pelatihanr" data-editable="false">Tanggal</th>
                                            <th data-field="file_pelatihan" data-editable="false">Bukti Pelatihan
                                            </th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelatihan as $index => $k)
                                            <tr>
                                                <td></td>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $k->karyawan->nama }}</td>
                                                <td>{{ $k->nama_pelatihan }}</td>
                                                <td>{{ $k->tanggal_pelatihan }}</td>
                                                <td>{{ $k->file_pelatihan }}</td>
                                                <td class="datatable-ct">
                                                    <button class="btn btn-sm btn-primary btn-history"
                                                        data-karyawan="{{ $k->karyawan->id }}"
                                                        data-nama="{{ $k->karyawan->nama }}" data-toggle="modal"
                                                        data-target="#InformationproModalalert">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-sm btn-danger delete-pelatihan"
                                                        data-nama="{{ $k->karyawan->nama }}"
                                                        data-id_karyawan="{{ $k->id_karyawan }}"
                                                        data-url="{{ route('data-pelatihan.destroy', $k->id_karyawan) }}">
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

    <!-- Modal Tambah Pelatihan -->
    <div id="createPelatihanModal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pelatihan</h4>
                </div>
                <div class="modal-body">
                    <form id="createPelatihanForm" action="{{ route('data-pelatihan.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <select name="id_karyawan" class="form-control" required>
                                @foreach ($karyawan as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelatihan</label>
                            <input type="text" class="form-control" name="nama_pelatihan" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelatihan</label>
                            <input type="date" class="form-control" name="tanggal_pelatihan" required>
                        </div>
                        <div class="form-group">
                            <label>File Pelatihan</label>
                            <input type="file" class="form-control" name="file_pelatihan">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Modal Update Pelatihan -->
    <div id="updatePelatihanModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Pelatihan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="updatePelatihanForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="pelatihan_id" name="id">

                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <input type="text" id="edit_nama_karyawan" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelatihan</label>
                            <input type="text" id="edit_nama_pelatihan" name="nama_pelatihan" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelatihan</label>
                            <input type="date" id="edit_tanggal_pelatihan" name="tanggal_pelatihan"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>File Pelatihan</label>
                            <input type="file" id="edit_file_pelatihan" name="file_pelatihan" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
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



    {{-- CREATE --}}
    <script>
        $("#createPelatihanForm").submit(function(e) {
            e.preventDefault();

            let form = $(this)[0];
            let formData = new FormData(form);

            $.ajax({
                url: "{{ route('data-pelatihan.store') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $("#createPelatihanModal").modal("hide");

                    Lobibox.notify('success', {
                        msg: response.status // Pesan sukses dari controller
                    });

                    setTimeout(() => location.reload(), 1000);
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

    {{-- HISTORY  --}}
    <script>
        $(document).on('click', '.btn-history', function() {
            let karyawanId = $(this).data('karyawan');
            let nama = $(this).data('nama');
            let data = $(this).data();
            console.log("Isi data:", data);


            $('.modal-title').text('History Pelatihan (' + nama + ')');
            let tbody = $('#logTable tbody');
            tbody.empty();

            $.ajax({
                url: `/pelatihan/history/${karyawanId}`,
                method: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        data.forEach((item, index) => {
                            let fileLink = item.file_pelatihan ?
                                `<a href="/storage/assets/data_pelatihan/file_pelatihan/${encodeURIComponent(item.file_pelatihan)}" download>Unduh File</a>` :
                                '-';
                            let row = `
                              <tr>
                                  <td>${index + 1}</td>
                                  <td>${item.nama_pelatihan}</td>
                                  <td>${item.tanggal_pelatihan}</td>
                                  <td>${fileLink}</td>
                              </tr>`;
                            tbody.append(row);
                        });
                    } else {
                        tbody.append('<tr><td colspan="4">Belum ada pelatihan.</td></tr>');
                    }
                },
                error: function() {
                    tbody.append('<tr><td colspan="4">Gagal memuat data.</td></tr>');
                }
            });
        });
    </script>

    {{-- Delete --}}
    <script>
        $(document).on('click', '.delete-pelatihan', function(e) {
            e.preventDefault();

            let nama = $(this).data("nama");
            let url = $(this).data("url");

            Lobibox.confirm({
                msg: `Apakah Anda yakin ingin menghapus semua data pelatihan milik ${nama}?`,
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
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Lobibox.notify('success', {
                                    msg: "Semua data pelatihan berhasil dihapus!"
                                });
                                setTimeout(() => location.reload(), 1000);
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
