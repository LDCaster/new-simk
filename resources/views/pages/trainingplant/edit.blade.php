@extends('../maincms')

@section('content')
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <h3>Edit Training Plan</h3>
                        <form action="{{ route('training-plans.update', $trainingPlan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="karyawan_id">Karyawan</label>
                                @if (count($karyawan) === 1)
                                    <input type="hidden" name="karyawan_id" value="{{ $karyawan[0]->id }}">
                                    <input type="text" class="form-control" value="{{ $karyawan[0]->nama }}" readonly>
                                @else
                                    <select name="karyawan_id" class="form-control" required>
                                        @foreach ($karyawan as $k)
                                            <option value="{{ $k->id }}"
                                                {{ $trainingPlan->karyawan_id == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="nama_pelatihan">Nama Pelatihan</label>
                                <input type="text" name="nama_pelatihan" class="form-control"
                                    value="{{ old('nama_pelatihan', $trainingPlan->nama_pelatihan) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="no_id">No ID</label>
                                <input type="text" name="no_id" class="form-control"
                                    value="{{ old('no_id', $trainingPlan->no_id) }}">
                            </div>

                            <div class="form-group">
                                <label for="target_pelatihan">Target Tanggal Pelatihan</label>
                                <input type="date" name="target_pelatihan" class="form-control"
                                    value="{{ old('target_pelatihan', $trainingPlan->target_pelatihan) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="cost">Biaya Pelatihan</label>
                                <input type="number" name="cost" class="form-control"
                                    value="{{ old('cost', $trainingPlan->cost) }}" required step="0.01">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Training Plan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
