@extends('layouts.guru')
@section('content')
    <div class="row" style="margin: 10px;">
        @foreach ($result as $ujianNama => $dataPoints)
            <div class="col-6">
                <div class="card p-4">
                    <h2>{{ $ujianNama }}</h2>
                    <canvas id="chart-{{ Str::slug($ujianNama) }}" width="400" height="200"></canvas>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var ctx = document.getElementById('chart-{{ Str::slug($ujianNama) }}').getContext('2d');
                            var chartData = {
                                labels: {!! json_encode(array_column($dataPoints, 'x')) !!},
                                datasets: [{
                                    label: '{{ $ujianNama }}',
                                    data: {!! json_encode(array_column($dataPoints, 'y')) !!},
                                    backgroundColor: {!! json_encode(array_column($dataPoints, 'color')) !!}
                                }]
                            };

                            new Chart(ctx, {
                                type: 'bar',
                                data: chartData,
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            suggestedMin: 0, // Mulai dari 0
                                            beginAtZero: true // Mulai dari 0
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        @endforeach
    </div>
@endsection
