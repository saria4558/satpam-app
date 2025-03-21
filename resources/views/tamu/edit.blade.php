@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tamu</h2>
    <form action="{{ route('tamus.update', $tamu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $tamu->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="{{ $tamu->alamat }}" required>
        </div>
        <div class="mb-3">
            <label>Keperluan:</label>
            <input type="text" name="keperluan" class="form-control" value="{{ $tamu->keperluan }}" required>
        </div>
        <div class="mb-3">
            <label>Telepon:</label>
            <input type="text" name="telepon" class="form-control" value="{{ $tamu->telepon }}" required>
        </div>
        <div class="mb-3">
            <label>Jadwal Kunjungan:</label>
            <input type="datetime-local" name="jadwal_kunjungan" class="form-control" value="{{ $tamu->jadwal_kunjungan }}" required>
        </div>

        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option value="waiting" {{ $tamu->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                <option value="done" {{ $tamu->status == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Dokumentasi:</label>
            <input type="file" name="dokumentasi" class="form-control">
            @if($tamu->dokumentasi)
                <p>Gambar saat ini: <img src="{{ asset('storage/' . $tamu->dokumentasi) }}" width="100"></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
