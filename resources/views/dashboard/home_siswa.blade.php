<div class="row">
    <div class="col-12">
        <h3 class="mb-3">Nilai Terbaru untuk {{ $siswa->nama }}</h3>
    </div>
    @foreach($nilaiSiswa as $nilai)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">{{ $nilai->mapel->nama_mapel ?? 'Mata Pelajaran' }}</h5>
                <p class="display-4 text-primary mb-0">{{ $nilai->nilai_akhir }}</p>
                <small class="text-muted">Nilai Akhir</small>
            </div>
        </div>
    </div>
    @endforeach
</div>
