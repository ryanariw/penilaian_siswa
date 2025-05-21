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
                       <!-- Tombol Edit -->
                       <button 
                        type="button" 
                        class="btn btn-warning btn-sm"
                        data-bs-toggle="modal" 
                        data-bs-target="#editMapelModal"
                        data-id="{{ $m->id }}"
                        data-nama="{{ $m->nama_mapel }}"
                        data-kode="{{ $m->kode }}">
                        Edit
                    </button>
                     <form action="{{ route('penilaian.mapeldestroy', $m->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
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
    <form action="{{ route('penilaian.mapelstore') }}" method="POST">
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
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Mapel</label>
                <input type="text" class="form-control" id="kode" name="kode" required>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
  </div>
</div>


<!-- Modal Edit Mapel -->
<!-- Modal Edit Mapel -->
<div class="modal fade" id="editMapelModal" tabindex="-1" aria-labelledby="editMapelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editMapelForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMapelLabel">Edit Mapel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="edit_nama_mapel" class="form-label">Nama Mapel</label>
                    <input type="text" class="form-control" id="edit_nama_mapel" name="nama_mapel" required>
                </div>
                <div class="mb-3">
                    <label for="edit_kode" class="form-label">Kode Mapel</label>
                    <input type="text" class="form-control" id="edit_kode" name="kode" required>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editMapelModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        // Ambil data dari tombol
        const id = button.getAttribute('data-id');
        const nama = button.getAttribute('data-nama');
        const kode = button.getAttribute('data-kode');

        // Isi ke form modal
        editModal.querySelector('#edit_nama_mapel').value = nama;
        editModal.querySelector('#edit_kode').value = kode;

        // Set action form agar update mapel yang benar
        editModal.querySelector('#editMapelForm').action = `/mapel/${id}`;
    });
});
</script>

</script>
