<?php
include 'koneksi.php';

if (isset($_GET['id_mahasiswa'])) {
    $id_mahasiswa = $_GET['id_mahasiswa'];
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>
            Swal.fire("Sukses!", "Data Mahasiswa Berhasil Dihapus", "success")
            .then(() => {
                window.location.href = "mahasiswa.php"; 
            });
        </script>';
    } else {
        echo '<script>
            Swal.fire("Gagal!", "Data Gagal Dihapus", "error")
            .then(() => {
                window.location.href = "mahasiswa.php"; 
            });
        </script>';
    }
}
?>
