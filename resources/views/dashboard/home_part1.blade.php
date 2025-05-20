@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

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

    <!-- Recent Grades Table -->
    <div class="card mb-4">
        <div class="card-header">
            Nilai Terbaru
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilaiTerbaru as $nilai)
                    <tr>
                        <td>{{ $nilai->siswa->nama ?? 'N/A' }}</td>
                        <td>{{ $nilai->mapel->nama_mapel ?? 'N/A' }}</td>
                        <td>{{ $nilai->nilai_akhir }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
