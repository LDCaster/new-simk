@extends('../maincms')

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <h3 class="mb-4">{{ $title }}</h3>

                        <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf

                            <!-- === Data Akun === -->
                            <h5 class="text-primary">Data Akun</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama Pengguna</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="password" value="karyawan123">
                                    <input type="hidden" name="password_confirmation" value="karyawan123">
                                    <input type="hidden" name="role" value="karyawan">
                                    <input type="hidden" name="status" value="aktif">
                                    <small class="text-danger d-block">*menggunakan default password karyawan
                                        <code></code></small>
                                </div>
                            </div>

                            <!-- === Data Karyawan === -->
                            <h5 class="text-primary mt-4">Data Karyawan</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" required
                                        value="{{ old('nama') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="sbu">SBU</label>
                                    <input type="text" name="sbu" class="form-control" value="{{ old('sbu') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bagian">Bagian</label>
                                    <input type="text" name="bagian" class="form-control" value="{{ old('bagian') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="status_karyawan">Status Karyawan</label>
                                    <select name="status_karyawan" class="form-control">
                                        <option value="aktif" {{ old('status_karyawan') == 'aktif' ? 'selected' : '' }}>
                                            Aktif</option>
                                        <option value="nonaktif"
                                            {{ old('status_karyawan') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </div>
                            </div>

                            <!-- === Catatan MCU & Catatan Penting === -->
                            <h5 class="text-primary mt-4">Catatan MCU & Penting</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="mcu_terakhir">MCU Terakhir</label>
                                    <input type="date" name="mcu_terakhir" class="form-control"
                                        value="{{ old('mcu_terakhir') }}">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="catatan_mcu">Catatan MCU</label>
                                    <textarea name="catatan_mcu" class="form-control" rows="2">{{ old('catatan_mcu') }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="catatan_penting_tanggal">Tanggal Catatan Penting</label>
                                    <input type="date" name="catatan_penting_tanggal" class="form-control"
                                        value="{{ old('catatan_penting_tanggal') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="catatan_penting_kasus">Kasus</label>
                                    <input type="text" name="catatan_penting_kasus" class="form-control"
                                        value="{{ old('catatan_penting_kasus') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="catatan_penting_keterangan">Keterangan</label>
                                    <textarea name="catatan_penting_keterangan" class="form-control" rows="2">{{ old('catatan_penting_keterangan') }}</textarea>
                                </div>
                            </div>

                            <!-- === Kontak & Emergency === -->
                            <h5 class="text-primary mt-4">Kontak & Emergency</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="emergency_call_nama">Nama Emergency</label>
                                    <input type="text" name="emergency_call_nama" class="form-control"
                                        value="{{ old('emergency_call_nama') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emergency_call_no_telpon">No Telepon Emergency</label>
                                    <input type="text" name="emergency_call_no_telpon" class="form-control"
                                        value="{{ old('emergency_call_no_telpon') }}">
                                </div>
                            </div>

                            <!-- === Data Pribadi === -->
                            <h5 class="text-primary mt-4">Data Pribadi</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_telepon">No Telepon</label>
                                    <input type="text" name="no_telepon" class="form-control"
                                        value="{{ old('no_telepon') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat_rumah">Alamat Rumah</label>
                                    <input type="text" name="alamat_rumah" class="form-control"
                                        value="{{ old('alamat_rumah') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ old('tempat_lahir') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ old('tanggal_lahir') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" name="pendidikan" class="form-control"
                                        value="{{ old('pendidikan') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    <select name="status_perkawinan" class="form-control">
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
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
