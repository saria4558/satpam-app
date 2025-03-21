@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Tamu</h2>
    <form action="{{ route('tamus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keperluan:</label>
            <input type="text" name="keperluan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon:</label>
            <input type="text" name="telepon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jadwal Kunjungan</label>
            <input type="datetime-local" name="jadwal_kunjungan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Dokumentasi:</label>
            <input type="file" name="dokumentasi" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
