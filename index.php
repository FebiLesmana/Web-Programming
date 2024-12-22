<?php include "./koneksi.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP IBU KARTINI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="header" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">SMP IBU KARTINI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                Aplikasi
              </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal_1">E-learning</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModel_2">E-ujian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pendaftaran.php">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pengumuman.php">Pengumuman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal_1" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Your password" />
                    </div>
                    <a href="Course.php" class="btn btn-primary w-100">Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Login -->
    <div class="modal fade" id="loginModel_2" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="close">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModelLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Your password" />
                    </div>
                    <a href="My-Ujian.php" class="btn btn-primary w-100">Login</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Hero Section -->
    <section>
        <div class="container" style="margin-top: 30px;">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start" data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="fw-bold">
                        Selamat Datang di Website
                        <span class="text-primary">SMP IBU KARTINI</span>
                    </h1>
                    <p>
                        SMP IBU KARTINI merupakan salah satu sekolah jenjang SMP berstatus Swasta. SMP IBU KARTINI didirikan pada tanggal 1 April 1978.
                    </p>
                    <a href="Pendaftaran.php" class="btn btn-primary">Bergabung &rarr;</a>
                </div>
                <div class="col-md-6 text-center" data-aos="fade-left" data-aos-duration="1200">
                    <img src="./IMG/LOGO SMP IBU KARTINI-Photoroom.png" alt="Logo SMP IBU KARTINI" class="img-fluid hero-image" />
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#EFF8FF"
          fill-opacity="1"
          d="M0,192L40,181.3C80,171,160,149,240,138.7C320,128,400,128,480,128C560,128,640,128,720,144C800,160,880,192,960,208C1040,224,1120,224,1200,213.3C1280,203,1360,181,1400,170.7L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
        ></path>
      </svg>
    </section>

    <!-- Tentang SMP -->
    <?php
        $siswa_l = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa WHERE Jenis_Kelamin='L'"));
        $siswa_p = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa WHERE Jenis_Kelamin='P'"));
        $total_siswa = $siswa_l + $siswa_p;
        $siswaData = [
            'siswa_laki' => $siswa_l,
            'siswa_perempuan' => $siswa_p,
            'total_siswa' => $total_siswa
        ];

        $guru_l = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM guru WHERE Jenis_Kelamin='L'"));
        $guru_p = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM guru WHERE Jenis_Kelamin='P'"));
        $total_guru = $guru_l + $guru_p;
        $guruData = [
            'guru_laki' => $guru_l,
            'guru_perempuan' => $guru_p,
            'total_guru' => $total_guru
        ];
    ?>
    
    <section class="py-1 bg-custom">
        <div class="container text-center">
            <h2 class="fw-bold" data-aos="fade-up" data-aos-duration="1200">TENTANG <span class="text-primary">IBU KARTINI</span></h2>
            <div class="row mt-4 g-4">
                <div class="col-md-4">
                    <div class="card shadow-lg p-4" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1200">
                        <h3>A</h3>
                        <p>Akreditasi</p>
                        <p class="text-muted">SMP IBU KARTINI sudah terakreditasi A dengan Nomor SK Akreditasi 165/BAP-SM/XI/2017 pada 9 November 2017.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg p-4" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="1200">
                        <h3><?= $siswaData['total_siswa'] ?></h3>
                        <p>Total Murid</p>
                        <p class="text-muted">SMP IBU KARTINI memiliki total <?= $siswaData['total_siswa'] ?> siswa yang terdiri dari <?= $siswaData['siswa_laki'] ?> siswa laki-laki dan <?= $siswaData['siswa_perempuan'] ?> siswa perempuan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-lg p-4" data-aos="zoom-in" data-aos-delay="800" data-aos-duration="1200">
                        <h3><?= $guruData['total_guru'] ?></h3>
                        <p>Total Guru</p>
                        <p class="text-muted">SMP IBU KARTINI memiliki total guru <?= $guruData['total_guru'] ?>  yang terdiri dari <?= $guruData['guru_laki'] ?> guru laki-laki dan <?= $guruData['guru_perempuan'] ?> guru perempuan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Visi & Misi -->
    <?php
        $visi_misi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM visi_misi WHERE ID_Visi_Misi=1"));
    ?>
    
    <section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#EFF8FF" fill-opacity="1" d="M0,192L40,181.3C80,171,160,149,240,138.7C320,128,400,128,480,128C560,128,640,128,720,144C800,160,880,192,960,208C1040,224,1120,224,1200,213.3C1280,203,1360,181,1400,170.7L1440,160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
        <div class="container text-center">
            <h2 class="fw-bold" data-aos="fade-up" data-aos-duration="1200">VISI & MISI <span class="text-primary">SMP IBU KARTINI</span></h2>
            <h3 class="mt-3" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1000" data-aos-delay="400">Visi</h3>
            <p data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1000" data-aos-delay="600"><?= $visi_misi['Visi'] ?></p>
            <h3 class="mt-4" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1000" data-aos-delay="800">Misi</h3>
            <ul class="list-unstyled" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1000" data-aos-delay="1000">
                <li><?= $visi_misi['Misi'] ?></li>
            </ul>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#EFF8FF" fill-opacity="1" d="M0,128L48,133.3C96,139,192,149,288,170.7C384,192,480,224,576,240C672,256,768,256,864,224C960,192,1056,128,1152,106.7C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>

    <!-- Informasi Lainnya -->
    <section class="py-5 bg-custom">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-center fw-bold">Informasi Lainnya <span class="text-primary">SMP IBU KARTINI</span></h2>
            <div class="row mt-4">
                <!-- Kolom Peta Lokasi -->
                <div class="col-md-6 mb-5" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <h3>Peta Lokasi SMP IBU KARTINI</h3>
                    <div class="map-container mt-4" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="600">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2331769847597!2d110.4075078748361!3d-6.981787693019066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4ac35e6376b%3A0x528c6f2e8e8e0fbd!2sSMP%20Ibu%20Kartini!5e0!3m2!1sen!2sid!4v1734831128380!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Kolom Informasi Kontak -->
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="800">
                    <h3>Informasi Kontak</h3>
                    <ul class="list-unstyled mt-4" style="color: #595C5F;" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1000">
                        <li><strong>Alamat:</strong> JL Imam Bonjol No. 193, Kota Semarang</li>
                        <li><strong>NPSN:</strong> 20331854</li>
                        <li><strong>No. SK Operasional:</strong> 0070/I.4/P/78</li>
                        <li><strong>No. Telepon:</strong> (0243) 515441</li>
                        <li><strong>Email:</strong> smpkartini21@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


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
    <script>
        AOS.init();
    </script>
</body>

</html>