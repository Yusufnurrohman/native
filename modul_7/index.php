<?php 
include 'layout/header.php'; 
include 'koneksi.php'; 

$query_jurusan = 'SELECT j.id_jurusan, j.nama_jurusan, COUNT(m.id_mahasiswa) AS total_mahasiswa 
                  FROM jurusan j
                  LEFT JOIN mahasiswa m ON j.id_jurusan = m.id_jurusan
                  GROUP BY j.id_jurusan';

$jurusan_result = mysqli_query($conn, $query_jurusan);

$query_laki = "SELECT COUNT(*) AS total FROM mahasiswa WHERE gander = 'laki-laki'";
$result_laki = mysqli_query($conn, $query_laki);
$row_laki = mysqli_fetch_assoc($result_laki);

$query_perempuan = "SELECT COUNT(*) AS total FROM mahasiswa WHERE gander = 'Perempuan'";
$result_perempuan = mysqli_query($conn, $query_perempuan);
$row_perempuan = mysqli_fetch_assoc($result_perempuan);

?>

<div class="container">
    <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
        <strong>Selamat Datang </strong> Yusuf Nur Rohman
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total Jurusan
                    <span class="badge text-bg-primary rounded-pill"><?= mysqli_num_rows($jurusan_result) ?></span>
                </li>
            </ul>
            
            <div class="row">
                <?php while ($jurusan = mysqli_fetch_assoc($jurusan_result)): ?>
                    <div class="col-md-6">
                        <div class="card text-center mt-2">
                            <div class="card-header">
                                Jurusan di kampus
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $jurusan['nama_jurusan'] ?></h5>
                                <p class="card-text">total mahasiswa :<?= $jurusan['total_mahasiswa'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        
        <div class="col-md-4">
            <h6>Total Gender</h6>
            <ul class="list-group">
                <li class="list-group-item">Laki - Laki : <?= $row_laki['total'] ?></li>
                <li class="list-group-item">Perempuan : <?= $row_perempuan['total'] ?></li>
            </ul>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
