@extends('../maincms')

@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <h3>Data Training Plan</h3>
                        <a href="{{ route('training-plans.create') }}" class="btn btn-success mb-3">Ajukan Training</a>
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
                                            <th>No ID</th>
                                            <th>Nama Pelatihan</th>
                                            <th>Target Pelatihan</th>
                                            <th>Cost</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trainingPlans as $index => $plan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td> <!-- Menambahkan Nomor Urut -->
                                                <td>{{ $plan->karyawan->nama ?? '-' }}</td>
                                                <td>{{ $plan->no_id ?? '-' }}</td>
                                                <td>{{ $plan->nama_pelatihan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($plan->target_tanggal)->format('d M Y') }}</td>
                                                <td>{{ number_format($plan->cost, 2) }}</td>
                                                <td>
                                                    @if (Auth::user()->role == 'super admin' || Auth::user()->id == $plan->karyawan->user_id)
                                                        <a href="{{ route('training-plans.edit', $plan->id) }}"
                                                            class="btn btn-warning"> <i class="fa fa-edit"></i></a>

                                                        <form action="{{ route('training-plans.destroy', $plan->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"> <i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    @else
                                                        <span class="text-muted">Tidak ada aksi</span>
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
