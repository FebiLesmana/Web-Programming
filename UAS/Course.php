<?php include "./koneksi.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP IBU KARTINI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_course.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                    <li class="nav-item"><a class="nav-link active" href="#">E-Learning</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pendaftaran.php">Pendaftaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pengumuman.php">Pengumuman</a></li>
                </ul>
            </div>
        </div>
    </nav>
    </header>

    <div class="container">
        <h2>My Courses</h2>
        <div class="filters">
            <select>
                <option>Sort by last accessed</option>
                <option>Sort by A-Z</option>
            </select>
            <select>
                <option>Kelas 7</option>
                <option>Kelas 8</option>
                <option>Kelas 9</option>
            </select>
        </div>


        <!-- MAPEL -->
<?php
// Mengambil data dari database
$query = mysqli_query($conn, "SELECT * FROM pelajaran ORDER BY ID_Pelajaran ASC");

// Memeriksa apakah ada hasil
if(mysqli_num_rows($query) > 0) {
    while($data = mysqli_fetch_array($query)) {
?>
        <div class="course-card">
            <img src="<?php echo $data['Link_Image'] ?>" alt="Mathematics related drawings and formulas">
            <div>
                <h3>
                    <a href="Materi.php?id=<?php echo $data['ID_Pelajaran']; ?>" style="text-decoration: none; color: inherit;">
                        <?php echo $data['Nama_Pelajaran']; ?>
                    </a>
                </h3>
                <p><?php echo $data['Deskripsi']; ?></p>
            </div>
        </div>
<?php
    }
} else {
    echo "<p>No courses available.</p>";
}
?>

        
        <div class="back-to-top">
            <a href="#">Kembali Ke Atas</a>
        </div>
    </div>

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