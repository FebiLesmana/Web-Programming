<?php include "./koneksi.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP IBU KARTINI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="header" >
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">SMP IBU KARTINI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Aplikasi
            </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="Course.php">E-Learning</a></li>
                            <li><a class="dropdown-item" href="My-Ujian.php">E-Ujian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="#">Pendaftaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pengumuman.php">Pengumuman</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- SINIIIIIII -->
    <?php
        $query = mysqli_query($conn, "SELECT * FROM pendaftaran ORDER BY ID_Pendaftaran ASC");
        $data = mysqli_fetch_array($query);
        ?>

    <main>
        <section class="hero">
            <h1>PENERIMAAN PESERTA DIDIK BARU<br>TAHUN PELAJARAN <?php echo $data['Tahun_Ajaran'] ?></h1>
        </section>

        <section class="content">
        <?php if (!empty($data)): ?>
            <div class="card">
                <img src="./Admin/Pendaftaran/uploads/<?php echo $data['Poster_1']; ?>" alt="<?php echo $data['Poster_1']; ?>">
            </div>
            <?php if (!empty($data['Poster_2'])): ?>
                <div class="card">
                    <img src="./Admin/Pendaftaran/uploads/<?php echo $data['Poster_2']; ?>" alt="<?php echo $data['Poster_2']; ?>">
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p>Data poster belum tersedia.</p>
        <?php endif; ?>
    </section>

        <section class="download">
            <a href="https://bantuan.siap-ppdb.com/panduan-model-b-plus/panduan-model-b-plus.pdf" class="btn" target="_blank">Download Panduan Pendaftaran</a>
            <a href="https://ppdb.yasporbi.sch.id/wp-content/uploads/2023/10/Template-Cara-Bayar-Close-Payment-REV.pdf" class="btn" target="_blank">Download Panduan Pembayaran</a>
        </section>
    </main>

    <!-- Footer -->
    <div class="footer">
        <h3 class="h3_footer">SMP IBU KARTINI</h3>
        <div class="social-icons">
            <a href="https://www.facebook.com/profile.php?id=61550820551361" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com/smpibukartini.smg/" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="#">
                <i class="fab fa-telegram"></i>
            </a>
        </div>
        <p>Copyright © 2024. All Right Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>