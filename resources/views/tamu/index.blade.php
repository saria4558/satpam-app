<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Buku Paket</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .modal-content {
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-primary fw-bold">DAFTAR TAMU</h2>
        </div>

    <a href="{{ route('tamus.create') }}" class="btn btn-primary mb-3">Tambah Tamu</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Keperluan</th>
                <th>Telepon</th>
                <th>Jadwal Kunjungan</th>
                <th>Tanggal & Waktu Datang</th> 
                <th>Status</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tamus as $index => $tamu)
            <tr>
                <td>{{ count($tamus) - $index }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->alamat }}</td>
                <td>{{ $tamu->keperluan }}</td>
                <td>{{ $tamu->telepon }}</td>
                <td>{{ $tamu->jadwal_kunjungan ? date('d-m-Y H:i', strtotime($tamu->jadwal_kunjungan)) : '-' }}</td>
                <td>{{ $tamu->created_at->format('d-m-Y H:i') }}</td> 
                <td style="color:rgb(255, 0, 0)">waiting</td>
                <td>
                    <a href="{{ route('tamus.show', $tamu->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('tamus.edit', $tamu->id) }}" class="btn btn-warning">Edit</a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
