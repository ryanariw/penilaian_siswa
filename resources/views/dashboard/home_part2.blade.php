<!-- Grade Distribution Chart -->
    <div class="card mb-4">
        <div class="card-header">
            Distribusi Nilai Akhir
        </div>
        <div class="card-body">
            <canvas id="gradeChart" width="400" height="150"></canvas>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="mb-4">
        <h4>Quick Links</h4>
        <a href="{{ url('/siswa') }}" class="btn btn-primary mr-2">Daftar Siswa</a>
        <a href="{{ url('/penilaian/nilai') }}" class="btn btn-success mr-2">Input Nilai</a>
        <a href="{{ url('/laporan') }}" class="btn btn-info">Laporan</a>
    </div>

    <!-- Announcements -->
    <div class="card">
        <div class="card-header">
            Pengumuman
        </div>
        <div class="card-body">
            <p>Belum ada pengumuman terbaru.</p>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('gradeChart').getContext('2d');
    var gradeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['0-9', '10-19', '20-29', '30-39', '40-49', '50-59', '60-69', '70-79', '80-89', '90-100'],
            datasets: [{
                label: 'Jumlah Nilai',
                data: @json($distribusiNilai),
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0
                    }
                }]
            }
        }
    });
</script>
@endsection
