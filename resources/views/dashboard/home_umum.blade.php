<!-- Tampilan umum untuk guru, admin, dll -->

<!-- Summary Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Siswa</h5>
                <p class="card-text display-4">{{ $jumlahSiswa }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Guru</h5>
                <p class="card-text display-4">{{ $jumlahGuru }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Kelas</h5>
                <p class="card-text display-4">{{ $jumlahKelas }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Mata Pelajaran</h5>
                <p class="card-text display-4">{{ $jumlahMapel }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Grades Table -->
<div class="card mb-4">
    <div class="card-header">
        Nilai Terbaru
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilaiTerbaru as $nilai)
                <tr>
                    <td>{{ $nilai->siswa->nama ?? 'N/A' }}</td>
                    <td>{{ $nilai->mapel->nama_mapel ?? 'N/A' }}</td>
                    <td>{{ $nilai->nilai_akhir }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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
