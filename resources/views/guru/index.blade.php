@extends('layout.master')

@section('content')

<div class="card">
  @if(in_array(auth()->user()->role, ['admin', 'kepsek']))
            <div class="card-body">
              <h5 class="card-title">Daftar Guru</h5>
             <!-- Tombol untuk membuka modal -->
             
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahGuruModal">
                <i class="bi bi-plus"></i> Tambah Guru
            </button>
        </div>
    <a href="{{ route('guru.export') }}" class="btn btn-success mb-3">
        <i class="bi bi-download"></i> Download Excel
    </a>
@endif
              <!-- Active Table -->
              <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                @if(auth()->user()->role === 'admin')
                    <th scope="col">Action</th>
                    @endif

                  </tr>
                </thead>
                <tbody>
                @forelse($guru as $index => $g)
                <tr>
                <td>{{ $g->id }}</td>
                <td>{{ $g->nama }}</td>
                <td>{{ $g->nip }}</td>

                @if(auth()->user()->role === 'admin')
                <td>
                <button type="button" class="btn btn-sm btn-warning edit-btn" 
                            data-id="{{ $g->id }}" 
                            data-nama="{{ $g->nama }}" 
                            data-nip="{{ $g->nip }}"
                            data-bs-toggle="modal" 
                            data-bs-target="#editGuruModal">
                        Edit
                    </button>
                    <form action="{{ route('guru.destroy', $g->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>  
                @endif
                </tr>
                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                @endforelse
                </tbody>
              </table>
              <!-- End Active Table -->
            </div>
          </div>


<!-- Modal Tambah Guru -->
 @if(auth()->user()->role === 'admin')
<div class="modal fade" id="tambahGuruModal" tabindex="-1" aria-labelledby="tambahGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahGuruModalLabel">Tambah Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('guru.store') }}" method="post" id="formTambahGuru">
                @csrf 
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL UNTUK EDIT GURU -->
 <!-- Modal Edit Guru -->
<div class="modal fade" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuruModalLabel">Edit Data Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditGuru" method="POST">
                @csrf 
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="edit_nip" name="nip" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika tombol edit diklik
        $('.edit-btn').click(function() {
            // Ambil data dari atribut data-*
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var nip = $(this).data('nip');
            
            // Isi form modal dengan data yang diambil
            $('#edit_nama').val(nama);
            $('#edit_nip').val(nip);
            
            // Set action form untuk update dengan ID yang sesuai
            $('#formEditGuru').attr('action', '/guru/' + id);
        });
    });
</script>
@endsection