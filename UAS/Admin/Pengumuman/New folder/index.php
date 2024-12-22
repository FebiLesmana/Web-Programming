<?php
include '../../../koneksi.php'; // Koneksi database

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_pengumuman = $_POST['judul_pengumuman'];
    $thumbnail_name = $_FILES['thumbnail']['name'];
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];

    // Validasi data
    if (!empty($judul_pengumuman) && !empty($thumbnail_name)) {
        // Tentukan lokasi penyimpanan file
        $upload_dir = "uploads/";
        $target_file = $upload_dir . basename($thumbnail_name);

        // Pindahkan file yang diunggah ke folder uploads
        if (move_uploaded_file($thumbnail_tmp, $target_file)) {
            // Query SQL untuk menyimpan data ke database
            $query = "INSERT INTO pengumuman (Judul_Pengumuman, Thumbnail) VALUES ('$judul_pengumuman', '$thumbnail_name')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Tambah data berhasil')</script>";
            } else {
                echo "<script>alert('Tambah data gagal: " . mysqli_error($conn) . "')</script>";
            }
        }
    }
}

// Edit pengumuman (UPDATE)
if (isset($_POST['editPengumuman'])) {
    $ID_Pengumuman = $_POST['ID_Pengumuman'];
    $judul_pengumuman = $_POST['Judul_Pengumuman'];
    $thumbnail_name = $_FILES['thumbnail']['name'];
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];

    if (!empty($thumbnail_name)) {
        move_uploaded_file($thumbnail_tmp, "uploads/" . $thumbnail_name);
        $query = "UPDATE pengumuman SET Judul_Pengumuman='$judul_pengumuman', Thumbnail='$thumbnail_name' WHERE ID_Pengumuman='$ID_Pengumuman'";
    } else {
        $query = "UPDATE pengumuman SET Judul_Pengumuman='$judul_pengumuman' WHERE ID_Pengumuman='$ID_Pengumuman'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Edit data berhasil')</script>";
    } else {
        echo "<script>alert('Edit data gagal: " . mysqli_error($conn) . "')</script>";
    }
}

// Hapus pengumuman (DELETE)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $delete = mysqli_query($conn, "DELETE FROM pengumuman WHERE ID_Pengumuman='$id'");
    if ($delete) {
        echo "<script>alert('Hapus data berhasil')</script>";
    } else {
        echo "<script>alert('Hapus data gagal: " . mysqli_error($conn) . "')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Management</title>
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
        <a href="../../Home/index.php">Dashboard</a>
        <a href="../../E-Learning/learning.php">E-Learning</a>
        <a href="../../My-Ujian/e-ujian.php">E-Ujian</a>
        <a href="../../Pendaftaran/Pendaftaran.php">Pendaftaran</a>
        <a href="#">Pengumuman</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header-bar">
            <h1>Pengumuman Management</h1>
        </div>

        <!-- Form Tambah/Edit Data -->
        <div class="form-section">
            <h2 id="form-title">Add Pengumuman</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="pengumuman-title">Judul Pengumuman</label>
                <input type="text" name="judul_pengumuman" id="pengumuman-title" placeholder="Judul Pengumuman" required>
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" required>
                <button type="submit" name="save">Save</button>
            </form>
        </div>

        <!-- Table Data -->
        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Judul Pengumuman</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM pengumuman";
                $result = mysqli_query($conn, $query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['Judul_Pengumuman']}</td>
                            <td><img src='uploads/{$row['Thumbnail']}' width='50'></td>
                            <td>
                                <a href='index.php?id={$row['ID_Pengumuman']}'>Edit</a> | 
                                <a href='index.php?hapus={$row['ID_Pengumuman']}'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found</td></tr>";
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
