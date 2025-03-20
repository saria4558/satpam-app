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
            <h2 class="text-primary fw-bold">DAFTAR PAKET</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPaketModal">Tambah Paket</button>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penerima</th>
                    <th>Pengirim</th>
                    <th>Expedisi</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (!isset($data) || $data->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Data Kosong</td>
                    </tr>
                @else
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->penerima }}</td>
                            <td>{{ $row->pengirim }}</td>
                            <td>{{ $row->expedisi }}</td>
                            <td>{{ $row->telepon }}</td>
                            <td style="color: #f5d834">waiting</td>
                            <td>
                                {{-- <a data-bs-toggle="modal" data-bs-target="#editDoktorModal"  --}}
                                {{-- <a data-bs-toggle="modal" data-bs-target="#" 
                                   class="btn btn-warning" 
                                   onclick="setEditData({{ $row->id }}, '{{ $row->dokter_nama }}', '{{ $row->telepon }}', '{{ $row->dokter_Ttl }}', '{{ $row->dokter_JK }}', '{{ $row->dokter_NIK }}', '{{ $row->alamat }}', '{{ $row->email }}')">
                                   <i class="fas fa-pencil-alt"></i>
                                </a> --}}
                                {{-- <a href="/deletedata/{{$row->id}}" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a> --}}
                                <a href="#" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Paket -->
    <div class="modal fade" id="tambahPaketModal" tabindex="-1" aria-labelledby="tambahPaketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPaketModalLabel">Tambah Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('insert') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="penerima" class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control" name="penerima" id="penerima" required>
                        </div>
                        <div class="mb-3">
                            <label for="pengirim" class="form-label">Nama Pengirim</label>
                            <input type="text" class="form-control" name="pengirim" id="pengirim" required>
                        </div>
                        <div class="mb-3">
                            <label for="expedisi" name="expedisi" class="form-label">Expedisi</label>
                            <select class="form-select" name="expedisi" id="expedisi" required>
                                <option value="shopee">Shopee</option>
                                <option value="lazada">Lazada</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        {{-- <div class="mb-3" id="expedisiLainnyaContainer" style="display: none;">
                            <label for="expedisi_lainnya" class="form-label">Expedisi Lainnya</label>
                            <input type="text" class="form-control" name="expedisi" id="expedisi_lainnya">
                        </div> --}}
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="telepon" id="telepon" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Edit Doktor -->
    {{-- @include('paket/editModal') --}}
    
    <script>
        const closeBtns = document.querySelectorAll('.close-btn');
        closeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                window.location.href = "/paket/dashboard";
            });
        });
    
        function setEditData(id, nama, telepon, lahir, kelamin, nik, alamat, email) {
            const fields = {
                editId: document.getElementById('edit-id'),
                editNama: document.getElementById('edit-nama'),
                editTelepon: document.getElementById('edit-telepon'),
                editLahir: document.getElementById('edit-lahirdokter'),
                editKelamin: document.getElementById('edit-kelamin'),
                editNik: document.getElementById('dokter_NIK'),
                editAlamat: document.getElementById('edit-alamat'),
                editEmail: document.getElementById('edit-email')
            };
    
            if (fields.editId) {
                fields.editId.value = id;
                fields.editNama.value = nama;
                fields.editTelepon.value = telepon;
                fields.editLahir.value = lahir;
                fields.editKelamin.value = kelamin;
                fields.editNik.value = nik;
                fields.editAlamat.value = alamat;
                fields.editEmail.value = email;
            }
        }
        function toggleExpedisiInput(select) {
    var inputLainnya = document.getElementById("expedisi_lainnya");
    if (select.value === "lainnya") {
        inputLainnya.style.display = "block";
        inputLainnya.required = true;
    } else {
        inputLainnya.style.display = "none";
        inputLainnya.required = false;
        inputLainnya.value = "";
    }
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('expedisi').addEventListener('change', function() {
            let expedisiLainnyaContainer = document.getElementById('expedisiLainnyaContainer');
            let expedisiLainnyaInput = document.getElementById('expedisi_lainnya');
            
            if (this.value === 'lainnya') {
                expedisiLainnyaContainer.style.display = 'block';
                expedisiLainnyaInput.required = true;
            } else {
                expedisiLainnyaContainer.style.display = 'none';
                expedisiLainnyaInput.required = false;
                expedisiLainnyaInput.value = '';
            }
        });
    </script>
</body>
</html>