@extends('../maincms')

@section('content')
    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="data-table-area mg-b-15">
                                <div class="container-fluid">
                                    <h3>Grafik Absensi per Departemen</h3>
                                    <canvas id="absensiChart" height="100"></canvas>
                                </div>

                                <h3>Grafik Jumlah Karyawan per Tahun</h3>
                                <canvas id="karyawanChart" height="100"></canvas>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                const ctx = document.getElementById('absensiChart').getContext('2d');
                                const chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: {!! json_encode($data->pluck('dept')) !!},
                                        datasets: [{
                                                label: 'Hadir',
                                                data: {!! json_encode($data->pluck('hadir')) !!},
                                                backgroundColor: 'rgba(54, 162, 235, 0.6)'
                                            },
                                            {
                                                label: 'Izin',
                                                data: {!! json_encode($data->pluck('izin')) !!},
                                                backgroundColor: 'rgba(255, 206, 86, 0.6)'
                                            },
                                            {
                                                label: 'Sakit',
                                                data: {!! json_encode($data->pluck('sakit')) !!},
                                                backgroundColor: 'rgba(75, 192, 192, 0.6)'
                                            },
                                            {
                                                label: 'Alpa',
                                                data: {!! json_encode($data->pluck('alpa')) !!},
                                                backgroundColor: 'rgba(255, 99, 132, 0.6)'
                                            }
                                        ]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                title: {
                                                    display: true,
                                                    text: 'Jumlah'
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>

                            {{-- JUMLAH KARYAWAN PER TAHUN  --}}
                            <script>
                                const ctxKaryawan = document.getElementById('karyawanChart').getContext('2d');
                                const karyawanChart = new Chart(ctxKaryawan, {
                                    type: 'bar',
                                    data: {
                                        // Gabungkan tahun dari kedua dataset → ambil unique + sort
                                        labels: {!! json_encode(
                                            $masukPerTahun->pluck('tahun')->merge($keluarPerTahun->pluck('tahun'))->unique()->sort()->values(),
                                        ) !!},
                                        datasets: [{
                                                label: 'Masuk',
                                                data: {!! json_encode($masukPerTahun->pluck('total_masuk')) !!},
                                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                fill: true,
                                                tension: 0.2
                                            },
                                            {
                                                label: 'Keluar',
                                                data: {!! json_encode($keluarPerTahun->pluck('total_keluar')) !!},
                                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                borderColor: 'rgba(255, 99, 132, 1)',
                                                fill: true,
                                                tension: 0.2
                                            }
                                        ]
                                    },
                                    options: {
                                        responsive: true,
                                        interaction: {
                                            mode: 'index',
                                            intersect: false,
                                        },
                                        stacked: false,
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                title: {
                                                    display: true,
                                                    text: 'Jumlah Karyawan'
                                                },
                                                ticks: {
                                                    stepSize: 1 // <-- Ini bikin hanya bilangan bulat!
                                                }
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Tahun'
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
