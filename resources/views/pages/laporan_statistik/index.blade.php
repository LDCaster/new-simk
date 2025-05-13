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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
