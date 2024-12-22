<?php include "./koneksi.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP IBU KARTINI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_uts.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <a class="navbar-brand fw-bold" href="#">SMP IBU KARTINI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">E-Ujian</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pendaftaran.php">Pendaftaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pengumuman.php">Pengumuman</a></li>
                </ul>
            </div>
    </nav>

    <div class="container">
        <div class="title">Ujian Tengah Semester Matematika</div>
        <div class="scoreboard">
            <div class="score blue">
                <p>Total Jawaban Benar</p>
                <h2>4/5</h2>
            </div>
            <div class="score">
                <p>Nilai Akhir</p>
                <h2>80</h2>
            </div>
        </div>

        <div class="question">
            <div class="number">20</div>
            <div class="content">
                <p>Hasil dari 2 + (-5) adalah....</p>
                <p>Pilih Satu:</p>
                <ul class="options">
                    <li><input type="radio" name="q1" checked> -3</li>
                    <li><input type="radio" name="q1"> 3</li>
                    <li><input type="radio" name="q1"> 6</li>
                </ul>
            </div>
            <div class="answer">Jawaban Benar</div>
        </div>

        <div class="question">
            <div class="number">0</div>
            <div class="content">
                <p>Hasil komutatif dari 19 + (-28) adalah....</p>
                <p>Pilih Satu:</p>
                <ul class="options">
                    <li><input type="radio" name="q2" checked> 19 x (-28)</li>
                    <li><input type="radio" name="q2"> (-28) + 19</li>
                    <li><input type="radio" name="q2"> 19 -28</li>
                </ul>
            </div>
            <div class="answer red">Jawaban Salah</div>
        </div>

        <div class="question">
            <div class="number">20</div>
            <div class="content">
                <p>Hasil dari -2 2/5 + 45% adalah....</p>
                <p>Pilih Satu:</p>
                <ul class="options">
                    <li><input type="radio" name="q3" checked> -195/100</li>
                    <li><input type="radio" name="q3"> 95/100</li>
                    <li><input type="radio" name="q3"> 195/100</li>
                </ul>
            </div>
            <div class="answer">Jawaban Benar</div>
        </div>

        <div class="question">
            <div class="number">20</div>
            <div class="content">
                <p>Bentuk persentase dari 17/25 adalah .....</p>
                <p>Pilih Satu:</p>
                <ul class="options">
                    <li><input type="radio" name="q4"> 66%</li>
                    <li><input type="radio" name="q4"> 67%</li>
                    <li><input type="radio" name="q4" checked> 68%</li>
                </ul>
            </div>
            <div class="answer">Jawaban Benar</div>
        </div>

        <div class="question">
            <div class="number">20</div>
            <div class="content">
                <p>Hasil pengurangan dari -7-(-4) adalah.....</p>
                <p>Pilih Satu:</p>
                <ul class="options">
                    <li><input type="radio" name="q5"> 3</li>
                    <li><input type="radio" name="q5"> 6</li>
                    <li><input type="radio" name="q5" checked> -3</li>
                </ul>
            </div>
            <div class="answer">Jawaban Benar</div>
        </div>

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
</body>

</html>