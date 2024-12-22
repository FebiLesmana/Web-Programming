<?php include '../../koneksi.php'; // Koneksi database ?>

<?php
// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tahunAjaran = $_POST['tahunAjaran'];
    $poster_1 = $_FILES['poster1']['name'];
    $poster_2 = $_FILES['poster2']['name'];
    $poster_tmp1 = $_FILES['poster1']['tmp_name'];
    $poster_tmp2 = $_FILES['poster2']['tmp_name'];

    // Validasi data
    if (!empty($tahunAjaran) && !empty($poster_1) && !empty($poster_2)) {
        // Tentukan lokasi penyimpanan file
        $upload_dir = "uploads/";
        $target_file1 = $upload_dir . basename($poster_1);
        $target_file2 = $upload_dir . basename($poster_2);

        // Pindahkan file yang diunggah ke folder uploads
        if (move_uploaded_file($poster_tmp1, $target_file1) && move_uploaded_file($poster_tmp2, $target_file2)) {
            // Query SQL untuk menyimpan data ke database
            $query = "INSERT INTO pendaftaran (Tahun_Ajaran, Poster_1, Poster_2) VALUES ('$tahunAjaran', '$poster_1', '$poster_2')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Tambah data berhasil'); window.location='Pendaftaran.php';</script>";
            } else {
                echo "<script>alert('Tambah data gagal: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('File upload gagal');</script>";
        }
    }
}

// Edit pendaftaran (UPDATE)
if (isset($_POST['editPendaftaran'])) {
    $ID_pendaftaran = $_POST['ID_Pendaftaran'];
    $tahunAjaran = $_POST['tahunAjaran'];
    $poster_1 = $_FILES['poster1']['name'];
    $poster_2 = $_FILES['poster2']['name'];
    $poster_tmp1 = $_FILES['poster1']['tmp_name'];
    $poster_tmp2 = $_FILES['poster2']['tmp_name'];

    // Memulai query update
    $query = "UPDATE pendaftaran SET Tahun_Ajaran='$tahunAjaran'";

    // Mengecek dan memindahkan file jika ada yang diupload
    if (!empty($poster_1)) {
        move_uploaded_file($poster_tmp1, "uploads/" . $poster_1);
        $query .= ", Poster_1='$poster_1'";
    }

    if (!empty($poster_2)) {
        move_uploaded_file($poster_tmp2, "uploads/" . $poster_2);
        $query .= ", Poster_2='$poster_2'";
    }

    // Menambahkan kondisi WHERE
    $query .= " WHERE ID_Pendaftaran='$ID_pendaftaran'";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Edit data berhasil'); window.location='Pendaftaran.php';</script>";
    } else {
        echo "<script>alert('Edit data gagal: " . mysqli_error($conn) . "');</script>";
    }
}

// Hapus pendaftaran (DELETE)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $delete = mysqli_query($conn, "DELETE FROM pendaftaran WHERE ID_Pendaftaran='$id'");
    if ($delete) {
        echo "<script>alert('Hapus data berhasil'); window.location='Pendaftaran.php';</script>";
    } else {
        echo "<script>alert('Hapus data gagal: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">School Admin Dashboard</div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="profile">Admin Profile</div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="../../Admin/Home/Index.php">Dashboard</a>
        <a href="../../Admin/E-Learning/learning.php">E-Learning</a>
        <a href="../../Admin/My-Ujian/e-ujian.php">E-Ujian</a>
        <a href="#">Pendaftaran</a>
        <a href="../Pengumuman/New folder/index.php">Pengumuman</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header-bar">
            <h1>Pendaftaran Management</h1>
        </div>

        <!-- Form Tambah/Edit Data -->
        <div class="form-section">
            <h2 id="form-title">Edit Pendaftaran</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="tahunAjaran">Tahun Ajaran</label>
                <input type="text" name="tahunAjaran" id="tahunAjaran" placeholder="Tahun Ajaran" required>
                <label for="poster1">Poster 1</label>
                <input type="file" name="poster1" id="poster1">
                <label for="poster2">Poster 2</label>
                <input type="file" name="poster2" id="poster2">
                <button type="submit" name="save">Save</button>
            </form>
        </div>

        <!-- Table Data -->
        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Poster 1</th>
                        <th>Poster 2</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM pendaftaran";
                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['Tahun_Ajaran']}</td>
                            <td><img src='uploads/{$row['Poster_1']}' width='50'></td>
                            <td><img src='uploads/{$row['Poster_2']}' width='50'></td>
                            <td>
                                <a href='Pendaftaran.php?id={$row['ID_Pendaftaran']}'>Edit</a> | 
                                <a href='Pendaftaran.php?hapus={$row['ID_Pendaftaran']}'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="script.js"></script>

    <?php mysqli_close($conn); ?> <!-- Tutup koneksi di bagian akhir -->
</body>
</html>
