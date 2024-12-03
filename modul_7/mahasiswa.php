<?php 
include 'layout/header.php'; 
include 'koneksi.php';


$query = 'SELECT m.id_mahasiswa, m.nama_mahasiswa, m.nim_mahasiswa, m.gander, j.nama_jurusan 
          FROM mahasiswa m 
          JOIN jurusan j ON m.id_jurusan = j.id_jurusan';
$yusuf = mysqli_query($conn, $query);
?>

<div class="container">
    <div class="card mt-4">
        <div class="card-header"><h3>Data Mahasiswa</h3></div>
        <div class="card-body">
            <a class="btn btn-primary" href="penambah_mahasiswa.php">Tambah Data Mahasiswa</a>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Nim Mahasiswa</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    while ($get = mysqli_fetch_assoc($yusuf)): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $get['nama_mahasiswa'] ?></td>
                            <td><?= $get['nim_mahasiswa'] ?></td>
                            <td><?= $get['gander'] ?></td> 
                            <td><?= $get['nama_jurusan'] ?></td>
                            <td> 
                                <a href="hapus_mahasiswa.php?id_mahasiswa=<?= $get['id_mahasiswa'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')">Hapus mahasiswa</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
