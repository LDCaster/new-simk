@extends('../maincms')

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <h3 class="mb-4">{{ $title }}</h3>

                        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- === Data Karyawan === -->
                            <h5 class="text-primary mt-4">Data Karyawan</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" class="form-control"
                                        value="{{ old('nik', $karyawan->nik) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" class="form-control"
                                        value="{{ old('nip', $karyawan->nip) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" required
                                        value="{{ old('nama', $karyawan->nama) }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="sbu">SBU</label>
                                    <input type="text" name="sbu" class="form-control"
                                        value="{{ old('sbu', $karyawan->sbu) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bagian">Bagian</label>
                                    <input type="text" name="bagian" class="form-control"
                                        value="{{ old('bagian', $karyawan->bagian) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="status_karyawan">Status Karyawan</label>
                                    <select name="status_karyawan" class="form-control">
                                        <option value="aktif"
                                            {{ old('status_karyawan', $karyawan->status_karyawan) == 'aktif' ? 'selected' : '' }}>
                                            Aktif</option>
                                        <option value="nonaktif"
                                            {{ old('status_karyawan', $karyawan->status_karyawan) == 'nonaktif' ? 'selected' : '' }}>
                                            Nonaktif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="dept">Departemen</label>
                                    <input type="text" name="dept" class="form-control"
                                        value="{{ old('dept', $karyawan->dept) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="location">Lokasi</label>
                                    <input type="text" name="location" class="form-control"
                                        value="{{ old('location', $karyawan->location) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control"
                                        value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk) }}">
                                </div>
                            </div>

                            <!-- === Catatan MCU & Catatan Penting === -->
                            <h5 class="text-primary mt-4">Catatan MCU & Penting</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="mcu_terakhir">MCU Terakhir</label>
                                    <input type="date" name="mcu_terakhir" class="form-control"
                                        value="{{ old('mcu_terakhir', $karyawan->mcu_terakhir) }}">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="catatan_mcu">Catatan MCU</label>
                                    <textarea name="catatan_mcu" class="form-control" rows="2">{{ old('catatan_mcu', $karyawan->catatan_mcu) }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="catatan_penting_tanggal">Tanggal Catatan Penting</label>
                                    <input type="date" name="catatan_penting_tanggal" class="form-control"
                                        value="{{ old('catatan_penting_tanggal', $karyawan->catatan_penting_tanggal) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="catatan_penting_kasus">Kasus</label>
                                    <input type="text" name="catatan_penting_kasus" class="form-control"
                                        value="{{ old('catatan_penting_kasus', $karyawan->catatan_penting_kasus) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="catatan_penting_keterangan">Keterangan</label>
                                    <textarea name="catatan_penting_keterangan" class="form-control" rows="2">{{ old('catatan_penting_keterangan', $karyawan->catatan_penting_keterangan) }}</textarea>
                                </div>
                            </div>

                            <!-- === Kontak & Emergency === -->
                            <h5 class="text-primary mt-4">Kontak & Emergency</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="emergency_call_nama">Nama Emergency</label>
                                    <input type="text" name="emergency_call_nama" class="form-control"
                                        value="{{ old('emergency_call_nama', $karyawan->emergency_call_nama) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emergency_call_no_telpon">No Telepon Emergency</label>
                                    <input type="text" name="emergency_call_no_telpon" class="form-control"
                                        value="{{ old('emergency_call_no_telpon', $karyawan->emergency_call_no_telpon) }}">
                                </div>
                            </div>

                            <!-- === Data Pribadi === -->
                            <h5 class="text-primary mt-4">Data Pribadi</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_telepon">No Telepon</label>
                                    <input type="text" name="no_telepon" class="form-control"
                                        value="{{ old('no_telepon', $karyawan->no_telepon) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat_rumah">Alamat Rumah</label>
                                    <input type="text" name="alamat_rumah" class="form-control"
                                        value="{{ old('alamat_rumah', $karyawan->alamat_rumah) }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ old('tempat_lahir', $karyawan->tempat_lahir) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="L"
                                            {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P"
                                            {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" name="pendidikan" class="form-control"
                                        value="{{ old('pendidikan', $karyawan->pendidikan) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    <select name="status_perkawinan" class="form-control">
                                        <option value="Belum Menikah"
                                            {{ old('status_perkawinan', $karyawan->status_perkawinan) == 'Belum Menikah' ? 'selected' : '' }}>
                                            Belum Menikah</option>
                                        <option value="Menikah"
                                            {{ old('status_perkawinan', $karyawan->status_perkawinan) == 'Menikah' ? 'selected' : '' }}>
                                            Menikah</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="npwp">No. NPWP</label>
                                    <input type="text" name="npwp" class="form-control"
                                        value="{{ old('npwp', $karyawan->npwp) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bpjs_kesehatan">No. BPJS Kesehatan</label>
                                    <input type="text" name="bpjs_kesehatan" class="form-control"
                                        value="{{ old('bpjs_kesehatan', $karyawan->bpjs_kesehatan) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bpjs_ketenagakerjaan">No. BPJS Ketenagakerjaan</label>
                                    <input type="text" name="bpjs_ketenagakerjaan" class="form-control"
                                        value="{{ old('bpjs_ketenagakerjaan', $karyawan->bpjs_ketenagakerjaan) }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="bank_account">Bank Account</label>
                                    <input type="text" name="bank_account" class="form-control"
                                        value="{{ old('bank_account', $karyawan->bank_account) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="no_bank">No. Bank</label>
                                    <input type="text" name="no_bank" class="form-control"
                                        value="{{ old('no_bank', $karyawan->no_bank) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="no_sim">No. SIM</label>
                                    <input type="text" name="no_sim" class="form-control"
                                        value="{{ old('no_sim', $karyawan->no_sim) }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="expired_sim">Expired SIM</label>
                                    <input type="date" name="expired_sim" class="form-control"
                                        value="{{ old('expired_sim', $karyawan->expired_sim) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="no_simper">No. Permit/SIMPER</label>
                                    <input type="text" name="no_simper" class="form-control"
                                        value="{{ old('no_simper', $karyawan->no_simper) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="expired_simper">Expired Permit/SIMPER</label>
                                    <input type="date" name="expired_simper" class="form-control"
                                        value="{{ old('expired_simper', $karyawan->expired_simper) }}">
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
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
