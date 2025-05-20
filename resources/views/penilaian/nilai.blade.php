@extends('layout.master')

@section('content')
<div class="card-body">
    <h5 class="card-title">Daftar Nilai Siswa</h5>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuruModal">
        <i class="bi bi-plus"></i> Tambah Nilai siswa
    </button>
    <a href="{{ route('penilaian.export') }}" class="btn btn-success ms-2">
        <i class="bi bi-download"></i> Donwload Data Nilai 
    </a>
</div>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Tahun Ajaran</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siswa as $s)
    @if($s->nilai->count() > 0)
        @foreach($s->nilai as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->kelas->nama_kelas }}</td>
                <td>{{ $n->mapel->nama_mapel ?? '-' }}</td>
                <td>{{ $n->tahun_ajaran }}</td>
                <td>{{ $n->nilai_tugas }}</td>
                <td>{{ $n->uts }}</td>
                <td>{{ $n->uas }}</td>
                <td>{{ $n->nilai_akhir }}</td>
                <td>
                    <a href="{{ route('penilaian.nilaiedit', $n->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                    <form action="{{ route('penilaian.destroy', $n->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus nilai ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td>-</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->kelas->nama_kelas }}</td>
            <td colspan="6" class="text-muted">Belum ada nilai</td>
            <td>
                {{-- Mungkin tombol tambah nilai --}}
                <a href="{{ route('penilaian.nilai', ['siswa_id' => $s->id]) }}" class="btn btn-success btn-sm">Tambah Nilai</a>
            </td>
        </tr>
    @endif
@endforeach

        </tbody>
    </table>
</div>
@endsection


<!-- modal tambah nilai -->
 <!-- Modal Tambah Nilai -->
<div class="modal fade" id="tambahGuruModal" tabindex="-1" aria-labelledby="tambahGuruModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('nilai.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahGuruModalLabel">Tambah Nilai Siswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">

          <div class="mb-2">
            <label for="siswa_id" class="form-label">Siswa</label>
            <select name="siswa_id" class="form-select" required>
              @foreach($siswa as $s)
              <option value="{{ $s->id }}">{{ $s->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-2">
            <label for="mapel_id" class="form-label">Mata Pelajaran</label>
            <select name="mapel_id" class="form-select" required>
              @foreach($mapel as $m)
              <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-2">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" class="form-control" placeholder="Contoh: 2024/2025" required>
          </div>

          <div class="mb-2">
            <label for="nilai_tugas" class="form-label">Nilai Tugas</label>
            <input type="number" name="nilai_tugas" class="form-control" required>
          </div>

          <div class="mb-2">
            <label for="uts" class="form-label">UTS</label>
            <input type="number" name="uts" class="form-control" required>
          </div>

          <div class="mb-2">
            <label for="uas" class="form-label">UAS</label>
            <input type="number" name="uas" class="form-control" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
