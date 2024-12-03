tambah jurusan

<?php include 'layout/header.php';

include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "select * from jurusan where id_jurusan ='$id'");
$get   = mysqli_fetch_array($query);
?>

<div class="container mt-4">
  <div class="card">
    <div class="card-header">
      Form Tambah Jurusan
    </div>
  <div class="card-body">
  <form method="post" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nama jurusan</label>
    <input type="text" value= "<?=$get['nama_jurusan']?>"name="jurusan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <button type="submit" name="edit" class="btn btn-primary mt-4">Submit</button>
</form>
  </div>
</div>
</div>

<?php include 'layout/footer.php';
 include 'koneksi.php';
 
 if(isset($_POST['edit'])){

    $nama_jurusan = $_POST['jurusan'];

    $simpan = mysqli_query($conn," UPDATE jurusan SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan = '$id'");

    if($simpan){
        echo '<script>alert("Data Berhasil Disimpan");
        window.location.href="jurusan.php";
        </script>';
    }
 };
 ?>