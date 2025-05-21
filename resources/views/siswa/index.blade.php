@extends('layout.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Daftar Siswa</h5>
        <div class="d-flex gap-2 mb-3">
            <!-- Tombol untuk membuka modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswaModal">
                <i class="bi bi-plus"></i> Tambah Siswa
            </button>
            
            <!-- Tombol Import CSV -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importCSVModal">
                <i class="bi bi-file-earmark-excel"></i> Import CSV
            </button>
            
            <!-- Tombol Download Template -->
            <a href="{{ route('siswa.export-csv-template') }}" class="btn btn-outline-primary">
                <i class="bi bi-download"></i> Download Template CSV
            </a>
        </div>
    </div>

    <!-- Alert untuk menampilkan pesan sukses/error -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mx-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mx-3" role="alert">
        {{ session('warning') }}
        @if(session('importErrors'))
            <ul class="mt-2">
                @foreach(session('importErrors') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Active Table -->
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $s->alamat ?? '-' }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-warning edit-btn" 
                            data-id="{{ $s->id }}" 
                            data-nama="{{ $s->nama }}" 
                            data-nis="{{ $s->nis }}"
                            data-jenis_kelamin="{{ $s->jenis_kelamin }}"
                            data-alamat="{{ $s->alamat }}"
                            data-bs-toggle="modal" 
                            data-bs-target="#editSiswaModal">
                        Edit
                    </button>
                    <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>                   
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="d-flex justify-content-between mx-3">
        <div>
            Menampilkan {{ $siswa->firstItem() }} - {{ $siswa->lastItem() }} dari {{ $siswa->total() }} data
        </div>
        <div>
            {{ $siswa->links() }}
        </div>

</div>

    <!-- End Active Table -->
</div>

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="tambahSiswaModal" tabindex="-1" aria-labelledby="tambahSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSiswaModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('siswa.store') }}" method="post" id="formTambahSiswa">
                @csrf 
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" required>
                    </div>
                
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- Modal Edit Siswa -->
<div class="modal fade" id="editSiswaModal" tabindex="-1" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSiswaModalLabel">Edit Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditSiswa" method="POST">
                @csrf 
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="edit_nis" name="nis" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="edit_alamat" name="alamat" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Import CSV -->
<div class="modal fade" id="importCSVModal" tabindex="-1" aria-labelledby="importCSVModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importCSVModalLabel">Import Data Siswa dari CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('siswa.import-csv') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File CSV</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".csv,.txt" required>
                        <div class="form-text">
                            Format file: .csv, pastikan koma (,) sebagai pemisah data. 
                            <a href="{{ route('siswa.export-csv-template') }}">Download template disini</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kelas_id" class="form-label">Kelas Default (opsional)</label>
                        <select class="form-select" id="kelas_id" name="kelas_id">
                            <option value="">Gunakan Kelas Default</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                        <div class="form-text">Jika di CSV tidak ada kolom kelas, maka akan menggunakan kelas ini.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload dan Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Ketika tombol edit diklik
        $('.edit-btn').click(function() {
            // Ambil data dari atribut data-*
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var nis = $(this).data('nis');
            var jenis_kelamin = $(this).data('jenis_kelamin');
            var alamat = $(this).data('alamat');
            
            // Isi form modal dengan data yang diambil
            $('#edit_nama').val(nama);
            $('#edit_nis').val(nis);
            $('#edit_jenis_kelamin').val(jenis_kelamin);
            $('#edit_alamat').val(alamat);
            
            // Set action form untuk update dengan ID yang sesuai
            $('#formEditSiswa').attr('action', '/siswa/' + id);
        });
    });
</script>
@endsection