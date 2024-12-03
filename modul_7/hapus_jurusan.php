<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_jurusan = $_GET['id'];

    
    $check_query = "SELECT COUNT(*) AS total FROM mahasiswa WHERE id_jurusan = '$id_jurusan'";
    $check_result = mysqli_query($conn, $check_query);
    $check_data = mysqli_fetch_assoc($check_result);

    if ($check_data['total'] > 0) {
       
        echo "<script>alert('Jurusan ini sedang aktif dan tidak dapat dihapus karena ada mahasiswa yang terdaftar di jurusan ini.'); window.location.href='jurusan.php';</script>";
    } else {
        
        $delete_query = "DELETE FROM jurusan WHERE id_jurusan = '$id_jurusan'";
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('Jurusan berhasil dihapus'); window.location.href='mahasiswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus jurusan'); window.location.href='mahasiswa.php';</script>";
        }
    }
}
?>
