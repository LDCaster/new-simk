@extends('../maincms')

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <h3 class="mb-4">{{ $title }}</h3>

                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama User</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="super admin" {{ $user->role == 'super admin' ? 'selected' : '' }}>Super
                                        Admin</option>
                                    <option value="hrd" {{ $user->role == 'hrd' ? 'selected' : '' }}>HRD</option>
                                    <option value="pengawas" {{ $user->role == 'pengawas' ? 'selected' : '' }}>Pengawas
                                    </option>
                                    <option value="pjo" {{ $user->role == 'pjo' ? 'selected' : '' }}>PJO</option>
                                    <option value="karyawan" {{ $user->role == 'karyawan' ? 'selected' : '' }}>Karyawan
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="tidak aktif" {{ $user->status == 'tidak aktif' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                    <option value="berhenti" {{ $user->status == 'berhenti' ? 'selected' : '' }}>Berhenti
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Lobibox.notify('error', {
                    msg: "{{ session('error') }}"
                });
            });
        </script>
    @endif
@endsection
