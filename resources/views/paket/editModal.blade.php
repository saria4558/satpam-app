<div class="modal fade" id="editDoktorModal" tabindex="-1" aria-labelledby="editDoktorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <span class="close-btn">&times;</span>
                <h2>EDIT DATA PAKET</h2>
                <form action="{{ route('updatedata', '') }}" method="POST" enctype="multipart/form-data" id="editForm">
                    
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit-id" >
                    <input type="text" name="dokter_nama" id="edit-nama" placeholder="Nama Lengkap" required>
                    <input type="text" name="telepon" id="edit-telepon" placeholder="Nomor Telepon" required>
                    <input type="text" name="dokter_Ttl" id="edit-lahirdokter" placeholder="Tempat, Tanggal Lahir" required>
                    <select class="form-select" name="dokter_JK" id="edit-kelamin" required>
                        <option selected disabled>Jenis Kelamin</option>
                        <option value="laki-laki">Laki - Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select> 
                    <input type="text" name="dokter_NIK" id="dokter_NIK" placeholder="No. KTA/SIP/NIP" required>
                    <input type="text" name="alamat" id="edit-alamat" placeholder="Alamat" required>
                    <input type="email" name="email" id="edit-email" placeholder="Email" required>
                    <input type="password" name="password" id="edit-password" placeholder="Password" required>

                    <button type="submit" class="submit-btn">Lanjut</button>
                </form>
                <p class="terms">Dengan mendaftar, Anda menyetujui <a href="#">Syarat dan Ketentuan</a> dan membaca <a href="#">Kebijakan Privasi</a>.</p>
            </div>
        </div>
    </div>
</div>

<script>
    function setEditData(id, nama, telepon, lahir, kelamin, nik, alamat, email) {
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-nama').value = nama;
    document.getElementById('edit-telepon').value = telepon;
    document.getElementById('edit-lahirdokter').value = lahir;
    document.getElementById('edit-kelamin').value = kelamin;
    document.getElementById('dokter_NIK').value = nik;
    document.getElementById('edit-alamat').value = alamat;
    document.getElementById('edit-email').value = email;
    
    // Set the action URL of the form
    document.getElementById('editForm').action = `/updatedata/${id}`;
}


</script>