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
                                <h1>Data <span class="table-project-n">Karyawan</span> </h1>
                                <a href="{{ route('karyawan.create') }}">
                                    <button type="button" class="btn btn-custon-rounded-four btn-primary">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                                    </button>
                                </a>
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
                                            <th data-field="nik" data-editable="false">NIK</th>
                                            <th data-field="nip" data-editable="false">NIP</th>
                                            <th data-field="nama" data-editable="false">Nama</th>
                                            <th data-field="alamat_rumah" data-editable="false">Alamat Rumah</th>
                                            <th data-field="no_telepon" data-editable="false">No Telepon</th>
                                            <th data-field="ttl" data-editable="false">Tempat / Tanggal Lahir</th>
                                            <th data-field="jenis_kelamin" data-editable="false">Jenis Kelamin</th>
                                            <th data-field="pendidikan" data-editable="false">Pendidikan</th>
                                            <th data-field="status_kawin" data-editable="false">Status Karyawan</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawan as $index => $k)
                                            <tr>
                                                <td></td>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $k->nik }}</td>
                                                <td>{{ $k->nip }}</td>
                                                <td>{{ $k->nama }}</td>
                                                <td>{{ $k->alamat_rumah }}</td>
                                                <td>{{ $k->no_telepon }}</td>
                                                <td>{{ $k->tempat_lahir }} / {{ $k->tanggal_lahir }}</td>
                                                <td>{{ $k->jenis_kelamin }}</td>
                                                <td>{{ $k->pendidikan }}</td>
                                                <td>{{ ucfirst($k->status_akhir) }}</td>
                                                <td class="datatable-ct">
                                                    <button class="btn btn-sm btn-primary"
                                                        onclick="showDetail({{ $k->id }})" data-toggle="modal"
                                                        data-target="#modalDetailKaryawan">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="{{ route('karyawan.edit', $k->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST"
                                                        style="display: inline-block;"
                                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Modal Detail Karyawan -->
                                <div id="modalDetailKaryawan" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Detail Karyawan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Nama:</strong> <span id="detail-nama"></span></p>
                                                <p><strong>Alamat:</strong> <span id="detail-alamat"></span></p>
                                                <p><strong>MCU Terakhir:</strong> <span id="detail-mcu"></span></p>
                                                <p><strong>BPJS Kesehatan:</strong> <span id="detail-bpjs-kesehatan"></span>
                                                </p>
                                                <p><strong>BPJS Ketenagakerjaan:</strong> <span
                                                        id="detail-bpjs-ketenagakerjaan"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->

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
        function showDetail(id) {
            console.log('ID:', id);
            $.ajax({
                url: '/karyawan/' + id,
                type: 'GET',
                headers: {
                    'Accept': 'application/json'
                },
                success: function(data) {
                    console.log(data);
                    $('#detail-nama').text(data.nama ?? '-');
                    $('#detail-alamat').text(data.alamat_rumah ?? '-');
                    $('#detail-mcu').text(data.mcu_terakhir ?? '-');
                    $('#detail-bpjs-kesehatan').text(data.bpjs_kesehatan ?? '-');
                    $('#detail-bpjs-ketenagakerjaan').text(data.bpjs_ketenagakerjaan ?? '-');
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
@endsection
