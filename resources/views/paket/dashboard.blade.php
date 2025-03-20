<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard buku paket</title>
    <!-- My Own CSS -->
    <link rel="stylesheet" href="{{ asset('css/paket/dashboard.css') }}" />
 
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap"
      rel="stylesheet"
    />
 
    <!-- Font Awesome 5.15.4 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <img src="" alt="poliwangi">
        </div>
    </header>
    <main>
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-sm-8" style="text-align: left;">
                    <h2 style="color: #005C7B; font-weight: bold;">DAFTAR DOKTOR</h2>
                </div>
                <div class="col-sm-4 text-end">
                    {{-- <a href="#" class="btn-custom" data-bs-toggle="modal" data-bs-target="#tambahDoktorModal">Tambah</a> --}}
                </div>
            </div>
        
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @if (!isset($data) || $data->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                    @else
                        @foreach ($data as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $row->dokter_nama }}</td>
                                <td>{{ $row->dokter_NIK }}</td>
                                <td>{{ $row->telepon }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#editDoktorModal" 
                                       class="btn btn-warning" 
                                       onclick="setEditData({{ $row->id }}, '{{ $row->dokter_nama }}', '{{ $row->telepon }}', '{{ $row->dokter_Ttl }}', '{{ $row->dokter_JK }}', '{{ $row->dokter_NIK }}', '{{ $row->alamat }}', '{{ $row->email }}')">
                                       <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="/deletedata/{{$row->id}}" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td style="color: #45BDBF">aktif</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody> --}}
            </table>
        </div>
    </main>
    
</body>
</html>