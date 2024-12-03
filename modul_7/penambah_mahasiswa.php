<?php include 'layout/header.php'; ?>

<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      Form Tambah Mahasiswa
    </div>
    <div class="card-body">
      <form method="post" action="">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Mahasiswa</label>
          <input class="form-control" type="text" placeholder="Masukkan Nama" name="nama_mahasiswa" id="nama" required>

          <label for="nim" class="form-label">NIM Mahasiswa</label>
          <input class="form-control" type="text" placeholder="Masukkan NIM" name="nim" id="nim" required>

          <label for="gender" class="form-label">Gender</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gander" value="Laki-laki" id="gander_laki_laki" checked>
            <label class="form-check-label" for="gender_laki_laki">Laki-laki</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gander" value="Perempuan" id="gander_perempuan">
            <label class="form-check-label" for="gender_perempuan">Perempuan</label>
          </div>

          <label for="jurusan" class="form-label">Jurusan</label>
          <select class="form-select" name="jurusan" id="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <?php
            include "koneksi.php";
            
            $query = mysqli_query($conn, "SELECT * FROM jurusan");

            while ($data = mysqli_fetch_array($query)) {
                echo "<option value='{$data['id_jurusan']}'>{$data['nama_jurusan']}</option>";
            }
            mysqli_close($conn);
            ?>
          </select>

          <button type="submit" name="simpan" class="btn btn-primary mt-4">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'layout/footer.php'; ?>

<?php

include 'koneksi.php';

if (isset($_POST['simpan'])) {
    
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $nim_mahasiswa = $_POST['nim'];
    $gander = $_POST['gander']; 
    $id_jurusan = $_POST['jurusan'];

    
    $simpan = mysqli_query($conn, "INSERT INTO mahasiswa (nama_mahasiswa, nim_mahasiswa, gander, id_jurusan) VALUES ('$nama_mahasiswa', '$nim_mahasiswa', '$gander', '$id_jurusan')");

    
    if ($simpan) {
        echo '<script>alert("Data Berhasil Disimpan");
        window.location.href="jurusan.php"; // Perbaiki tanda kutip di sini
        </script>';
    } else {
        echo '<script>alert("Gagal Menyimpan Data");</script>';
    }
}
?>
