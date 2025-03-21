@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Tamu</h2>
    <a href="{{ route('tamus.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tamu->nama }}</h5>
            <p><strong>Nama:</strong> {{ $tamu->nama }}</p>
            <p><strong>Alamat:</strong> {{ $tamu->alamat }}</p>
            <p><strong>Keperluan:</strong> {{ $tamu->keperluan }}</p>
            <p><strong>Telepon:</strong> {{ $tamu->telepon }}</p>
            <p><strong>jadwal Kunjungan:</strong> {{ $tamu->jadwal_kunjungan }}</p>
            <p><strong>Waktu Kunjungan:</strong> {{ $tamu->created_at->translatedFormat('l, d F Y H:i') }}</p>


            @if($tamu->dokumentasi)
                <p><strong>Dokumentasi:</strong></p>
                <img src="{{ asset('storage/' . $tamu->dokumentasi) }}" class="img-fluid" width="300">
            @endif
        </div>
    </div>
</div>
@endsection
