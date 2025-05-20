@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    @if(isset($isSiswa) && $isSiswa)
        <!-- Tampilan khusus siswa modern -->
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
    @else
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
