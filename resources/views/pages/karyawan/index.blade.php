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
                                <button type="button" class="btn btn-custon-rounded-four btn-primary"><i class="fa fa-plus"
                                        aria-hidden="true"></i> Tambah</button>
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
                                            <th data-field="status_kawin" data-editable="false">Status Kawin</th>
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
                                                <td>{{ $k->status_perkawinan }}</td>
                                                <td class="datatable-ct">
                                                    <a href="#" class="btn btn-sm btn-warning"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></a>
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
@endsection
