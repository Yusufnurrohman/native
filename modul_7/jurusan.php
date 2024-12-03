<?php 
include 'layout/header.php';
include 'koneksi.php';


$query = 'SELECT j.id_jurusan, j.nama_jurusan, COUNT(m.id_mahasiswa) AS total_mahasiswa 
          FROM jurusan j
          LEFT JOIN mahasiswa m ON j.id_jurusan = m.id_jurusan
          GROUP BY j.id_jurusan';

$yusuf = mysqli_query($conn, $query);
?>

<div class="container">
    <a class="btn btn-primary mt-4" href="penambah_jurusan.php">Tambah Jurusan</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Jurusan</th>
                <th scope="col">Total Mahasiswa</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($get = mysqli_fetch_assoc($yusuf)): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?=$get['nama_jurusan']?></td>
                <td><?=$get['total_mahasiswa']?></td> 
                <td>
                    <a class="btn btn-info" href="edit_jurusan.php?id=<?=$get['id_jurusan']?>">Edit</a>
                    <a class="btn btn-danger" href="hapus_jurusan.php?id=<?=$get['id_jurusan']?>"
                    onclick="return confirm('Hapus Data')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'layout/footer.php'; ?>
