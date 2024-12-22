<?php include "../../koneksi.php" ?>
<?php

// tambah Ujian (INSERT)
if (isset($_POST['tambahUjian'])) {
    $judulUjian = $_POST['judulUjian'];
    $tanggalUjian = $_POST['tanggalUjian'];
    $sifatUjian = $_POST['sifatUjian'];
    $durasiUjian = $_POST['durasiUjian'];
    $batasPengerjaan = $_POST['batasPengerjaan'];

    $query = mysqli_query($conn, "INSERT INTO ujian (Judul_Ujian, Tanggal, Sifat, Durasi, Batas) VALUES ('$judulUjian','$tanggalUjian','$sifatUjian', '$durasiUjian', '$batasPengerjaan')");

    if ($query) {
        echo "<script>alert('Tambah data berhasil'); window.location.href='e-ujian.php';</script>";
    } else {
        echo "<script>alert('Tambah data gagal');</script>";
    }
}

// edit pelajaran (UPDATE)
if (isset($_POST['editUjian'])) {
    $ID_Ujian =  $_POST['ID_Ujian'];
    $judulUjian =  $_POST['judulUjian'];
    $tanggalUjian =  $_POST['tanggalUjian'];
    $sifatUjian =  $_POST['sifatUjian'];
    $durasiUjian =  $_POST['durasiUjian'];
    $batasPengerjaan = $_POST['batasPengerjaan'];

    $query = mysqli_query($conn, "UPDATE ujian SET Judul_Ujian='$judulUjian', Tanggal='$tanggalUjian', Sifat='$sifatUjian', Durasi='$durasiUjian', Batas='$batasPengerjaan' WHERE ID_Ujian='$ID_Ujian'");

    if ($query) {
        echo "<script>alert('Edit data berhasil'); window.location.href='e-ujian.php';</script>";
    } else {
        echo "<script>alert('Edit data gagal');</script>";
    }
}

// hapus (DELETE)
if (isset($_GET['hapus'])) {
    $id_Ujian = mysqli_real_escape_string($conn, $_GET['hapus']);
    $delete = mysqli_query($conn, "DELETE FROM ujian WHERE ID_Ujian='$id_Ujian'");

    if ($delete) {
        echo "<script>alert('Hapus data berhasil'); window.location.href='e-ujian.php';</script>";
    } else {
        echo "<script>alert('Hapus data gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ujian Management</title>
    <link rel="stylesheet" href="e-ujian.css">
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
        <a href="../Home/index.php">Dashboard</a>
        <a href="../E-Learning/learning.php">E-Learning</a>
        <a href="#">E-Ujian</a>
        <a href="../Pendaftaran/Pendaftaran.php">Pendaftaran</a>
        <a href="../Pengumuman/index.php">Pengumuman</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header-bar">
            <h1>E-Ujian Management</h1>

            <?php
            if(isset($_GET['id_Ujian'])) {
                    // memasukkan get id ke dalam variabel id
                    $id_Ujian= $_GET['id_Ujian'];
                    // query untuk database
                    $query = mysqli_query($conn, "SELECT * FROM ujian WHERE ID_Ujian='$id_Ujian'");
                    $data_edit = mysqli_fetch_array($query);
                    ?>
                        <form action="" method="POST">
                        <input type="hidden" name="ID_Ujian" value="<?php echo $data_edit['ID_Ujian'] ?>" required>
                        
                        <label for="ujian-title">Ujian Title</label>
                        <input type="text" name="judulUjian" value="<?php echo $data_edit['Judul_Ujian'] ?>" required>

                        <label for="ujian-date">Tanggal Mulai</label>
                        <input type="date" name="tanggalUjian" value="<?php echo $data_edit['Tanggal'] ?>" required>

                        <label for="ujian-sifat">Sifat Ujian</label>
                        <input type="text" name="sifatUjian" value="<?php echo $data_edit['Sifat'] ?>" required>

                        <label for="ujian-durasi">Durasi (menit)</label>
                        <input type="number" name="durasiUjian" value="<?php echo $data_edit['Durasi'] ?>" required>

                        <label for="ujian-batas">Batas Pengerjaan</label>
                        <input type="datetime-local" name="batasPengerjaan" value="<?php echo $data_edit['Batas'] ?>" required>

                        <button type="submit" name="tambahUjian">Save</button>
                    </form>
                    <?php
                } else {
                    ?>
                    <!-- Form Tambah/Edit Data -->
                    <div class="form-section">
                    <h2 id="form-title">Add Ujian</h2>
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label for="ujian-title">Ujian Title</label>
                        <input type="text" name="judulUjian" placeholder="Nama Ujian" required>

                        <label for="ujian-date">Tanggal Mulai</label>
                        <input type="date" name="tanggalUjian" required>

                        <label for="ujian-sifat">Sifat Ujian</label>
                        <input type="text" name="sifatUjian" placeholder="Sifat Ujian" required>

                        <label for="ujian-durasi">Durasi (menit)</label>
                        <input type="number" name="durasiUjian" placeholder="Durasi dalam menit" required>

                        <label for="ujian-batas">Batas Pengerjaan</label>
                        <input type="datetime-local" name="batasPengerjaan" required>

                        <button type="submit" name="tambahUjian">Save</button>
                    </form>
                </div>
                    <?php
                }
            ?>

        </div>


        <!-- Table Data -->
        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>Ujian Title</th>
                        <th>Tanggal Mulai</th>
                        <th>Sifat</th>
                        <th>Durasi</th>
                        <th>Batas Pengerjaan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM ujian";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['Judul_Ujian']}</td>
                                <td>{$row['Tanggal']}</td>
                                <td>{$row['Sifat']}</td>
                                <td>{$row['Durasi']}</td>
                                <td>{$row['Batas']}</td>
                                <td><a href='e-ujian.php?id_ujian={$row['ID_Ujian']}'>Edit</a> | <a href='e-ujian.php?hapus={$row['ID_Ujian']}'>Delete</a></td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>SMP IBU KARTINI</h3>
            <p>Selamat Datang di Admin Page</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Admin Page SMP IBU KARTINI, All rights reserved.</p>
    </div>
</footer>
        
    </div>

    <script src="e-ujian.js"></script>
</body>

</html>
