@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h4>Rangkuman Nilai - {{ $siswa->nama }}</h4>
    <p><strong>Kelas:</strong> {{ $siswa->kelas->nama_kelas }}</p>

    <div class="row">
       @foreach ($siswa->nilai as $n)
  <div class="card mb-2">
    <div class="card-body">
      <h5 class="card-title">{{ $n->mapel->nama_mapel }}</h5>
      <p class="card-text">
        Tugas: {{ $n->nilai_tugas }} <br>
        UTS: {{ $n->uts }} <br>
        UAS: {{ $n->uas }} <br>
        <strong>Nilai Akhir: {{ $n->nilai_akhir }}</strong>
      </p>
      <small class="text-muted">Tahun Ajaran: {{ $n->tahun_ajaran }}</small>
    </div>
  </div>
@endforeach

    </div>
</div>
@endsection
