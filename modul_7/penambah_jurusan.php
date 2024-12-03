
<?php include 'layout/header.php' ?>

<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      Form Tambah Jurusan
    </div>
  <div class="card-body">
  <form method="post" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nama jurusan</label>
    <input type="text" name="jurusan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <button type="submit" name="simpan" class="btn btn-primary mt-4">Submit</button>
</form>
  </div>
</div>
</div>

<?php include 'layout/footer.php';
 include 'koneksi.php';
 
 if(isset($_POST['simpan'])){

    $nama_jurusan = $_POST['jurusan'];

    $simpan = mysqli_query($conn," INSERT INTO jurusan VALUES  (Null,'$nama_jurusan')");

    if($simpan){
        echo '<script>alert("Data Berhasil Disimpan");
        window.location.href="jurusan.php";
        </script>';
    }
 };
 ?>