<?php include "./koneksi.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - SMP IBU KARTINI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="header">
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
                    <li class="nav-item"><a class="nav-link" href="Pendaftaran.php">Pendaftaran</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Pengumuman</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <?php
        $query = mysqli_query($conn, "SELECT * FROM pengumuman ORDER BY ID_Pengumuman ASC");
        $data = mysqli_fetch_array($query);
        ?>

    <main>
        <div class="container my-5">
            <h2 class="text-center fw-bold">PENGUMUMAN</h2>
            <p class="text-center">Pengumuman terbaru dari SMP IBU KARTINI</p>

            <div class="row g-4 mt-4">
                <!-- Card 1 -->
                <?php

            // Query untuk mengambil data pengumuman
            $query = "SELECT * FROM pengumuman ORDER BY id_pengumuman ASC";
            $result = mysqli_query($conn, $query);

            // Memeriksa apakah ada data
            if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-6 col-lg-3">';
                    echo '    <div class="card">';
                    echo '        <img src="./Admin/Pengumuman/New folder/uploads/' . htmlspecialchars($data['Thumbnail']) . '" class="card-img-top" alt="' . htmlspecialchars($data['Judul_Pengumuman']) . '">';
                    echo '        <div class="card-body">';
                    echo '            <h6 class="card-title">' . htmlspecialchars($data['Judul_Pengumuman']) . '</h6>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">Tidak ada pengumuman saat ini.</p>';
            }
            ?>
                
            </div>
        </div>
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