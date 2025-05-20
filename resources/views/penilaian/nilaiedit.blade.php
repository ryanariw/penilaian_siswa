@extends('layout.master')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-gradient bg-primary text-white rounded-top-4">
                    <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Nilai Siswa</h4>
                </div>
                <div class="card-body p-4">
                    <form action="/nilai/{{$nilai->id}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="tugas" class="form-label fw-semibold">Nilai Tugas</label>
                            <input type="number" name="nilai_tugas" id="tugas" class="form-control" 
                                value="{{ old('tugas', $nilai->nilai_tugas) }}" required min="0" max="100" placeholder="Masukkan nilai tugas">
                        </div>

                        <div class="mb-3">
                            <label for="uts" class="form-label fw-semibold">Nilai UTS</label>
                            <input type="number" name="uts" id="uts" class="form-control" 
                                value="{{ old('uts', $nilai->uts) }}" required min="0" max="100" placeholder="Masukkan nilai UTS">
                        </div>

                        <div class="mb-3">
                            <label for="uas" class="form-label fw-semibold">Nilai UAS</label>
                            <input type="number" name="uas" id="uas" class="form-control" 
                                value="{{ old('uas', $nilai->uas) }}" required min="0" max="100" placeholder="Masukkan nilai UAS">
                        </div>

                        <div class="mb-3">
                            <label for="nilai_akhir" class="form-label fw-semibold">Nilai Akhir</label>
                            <input type="text" id="nilai_akhir" class="form-control bg-light" 
                                value="{{ old('nilai_akhir', $nilai->nilai_akhir) }}" readonly>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('penilaian.nilai') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
