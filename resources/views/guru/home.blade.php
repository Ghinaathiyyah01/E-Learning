@extends('layouts.guru')
@section('content')
    <div class="card"></div>
    <div class="row" style="margin: 10px;">
        <div class="col-xl-12">
            <!-- Area Chart -->
            <div class="card shadow mb-3">
                <div class="card-body">
                    <div class="card-title text-center">
                        <h1>Grafik Nilai Ujian</h1>
                    </div>
                    <div id="chart"></div>
                        {{-- @dd($result) --}}
                        {{-- {!! $guruchart->container() !!} --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                var dataArray = @json($result);

                var options = {
                    chart: {
                        type: 'bar'
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true
                        }
                    },
                    legend: {
                        show: true,
                        showForSingleSeries: true,
                        customLegendItems: ['Belum Mengerjakan', 'Progres < 50%', 'Progres > 50%', 'Selesai'],
                        markers: {
                            fillColors: ['#8592a3', '#ffab00', '#007bff', '#71dd37']
                        }
                    },
                    series: [{
                        name: 'Siswa',
                        data: dataArray.map(item => ({
                            x: item['x'],
                            y: item['y'],
                            fillColor: item['color']
                        }))
                    }],
                    colors: dataArray.map(item => item['color']),
                }

                var chart = new ApexCharts(document.querySelector("boxchart"), options);

                chart.render();
            });
        </script> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var options = {
                    series: [{
                        name: 'Siswa',
                        data: @json(array_values(array_column($result, 'y')))
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: 4,
                            horizontal: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    xaxis: {
                        categories: @json(array_column($result, 'x')),
                    },
                    colors: @json(array_column($result, 'color')),
                };
    
                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            });
        </script>
        {{-- <script src="{{ $guruchart->cdn() }}"></script>

        {{ $guruchart->script() }} --}}
    @endsection
