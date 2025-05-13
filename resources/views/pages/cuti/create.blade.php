@extends('../maincms')

@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <h3>Ajukan Cuti</h3>
                        <form action="{{ route('cuti.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="karyawan_id">Karyawan</label>
                                @if (count($karyawan) === 1)
                                    <input type="hidden" name="karyawan_id" value="{{ $karyawan[0]->id }}">
                                    <input type="text" class="form-control" value="{{ $karyawan[0]->nama }}" readonly>
                                @else
                                    <select name="karyawan_id" class="form-control" required>
                                        @foreach ($karyawan as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="tanggal_cuti">Tanggal Cuti</label>
                                <input type="date" name="tanggal_cuti" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alasan">Alasan</label>
                                <textarea name="alasan" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
