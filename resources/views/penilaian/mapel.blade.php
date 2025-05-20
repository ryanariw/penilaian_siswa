@extends('layout.master')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Mata Pelajaran</h2>
        <!-- Tombol Tambah Mapel -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMapelModal">
            Tambah Mapel
        </button>
    </div>

    <!-- Tabel Mapel -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Mapel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mapel as $index => $m)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $m->nama_mapel }}</td>
                    <td>
                        <a href="{{ route('mapel.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mapel.destroy', $m->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Mapel -->
<div class="modal fade" id="tambahMapelModal" tabindex="-1" aria-labelledby="tambahMapelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMapelLabel">Tambah Mapel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_mapel" class="form-label">Nama Mapel</label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endsection
