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
                                <h1>Data <span class="table-project-n">Absensi Karyawan</span> </h1>
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
                                            <th data-field="nama" data-editable="false">NIP</th>
                                            <th data-field="nama" data-editable="false">Nama Karyawan</th>
                                            <th data-field="nama_pelatihan" data-editable="false">Departemen</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absensi as $index => $a)
                                            <tr>
                                                <td></td>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $a->karyawan->nip }}</td>
                                                <td>{{ $a->karyawan->nama }}</td>
                                                <td>{{ $a->karyawan->dept }}</td>
                                                <td class="datatable-ct">
                                                    <button class="btn btn-sm btn-primary btn-history"
                                                        data-karyawan="{{ $a->karyawan->id }}"
                                                        data-nama="{{ $a->karyawan->nama }}" data-toggle="modal"
                                                        data-target="#InformationproModalalert">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
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
@endsection
