@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    @if(isset($isSiswa) && $isSiswa)
        @include('dashboard.home_siswa')
    @else
        @include('dashboard.home_umum')
    @endif
</div>
@endsection

@section('scripts')
@if(!isset($isSiswa) || !$isSiswa)
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Convert PHP array to JSON string and parse it in JavaScript
    var distribusiNilai = JSON.parse('{!! addslashes(json_encode($distribusiNilai ?? [])) !!}');
    var ctx = document.getElementById('gradeChart').getContext('2d');
    var gradeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '90-100'],
            datasets: [{
                label: 'Jumlah Nilai',
                data: distribusiNilai,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endif
@endsection
