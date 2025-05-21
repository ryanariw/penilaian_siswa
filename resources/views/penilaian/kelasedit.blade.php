@extends('layout.master')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-gradient bg-primary text-white rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Kelas</h4>
                </div>
                <div class="card-body p-4">
                  <form action="{{ route('penilaian.kelas.update', $kelas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kode_kelas" class="form-label fw-semibold">Kode Kelas</label>
                            <input type="text" name="kode_kelas" id="kode_kelas" class="form-control"
                                value="{{ old('kode_kelas', $kelas->kode_kelas) }}" required
                                placeholder="Contoh: XIPA1">
                            <small class="text-muted">Gunakan huruf besar, misalnya: 4A, 1D</small>
                        </div>

                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label fw-semibold">Nama Kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control"
                                value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required
                                placeholder="Contoh: Kelas X IPA 1">
                            <small class="text-muted">Gunakan huruf besar untuk penulisan nama kelas,misalnya Kelas 1A</small>
                        </div>

                        <div class="mb-3">
                            <label for="guru_id" class="form-label fw-semibold">Guru Pengampu</label>
                            <select name="guru_id" id="guru_id" class="form-select" required>
                                <option value="">-- Pilih Guru --</option>
                                @foreach($guruList as $guru)
                                    <option value="{{ $guru->id }}" {{ (old('guru_id', $kelas->guru_id) == $guru->id) ? 'selected' : '' }}>
                                        {{ $guru->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                           <a href="{{ route('penilaian.kelas.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Perbarui
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
