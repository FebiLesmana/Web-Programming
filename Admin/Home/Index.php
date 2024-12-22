<?php include "../../koneksi.php" ?>
<?php

    // tambah siswa (INSERT)
    if(isset($_POST['tambahSiswa'])) {
        // menangkap input sesuai dengan attribute name
        $username = $_POST['username'];
        $password = $_POST['password'];
        $namaLengkap = $_POST['namalengkap'];
        $jeniskelamin = $_POST['jeniskelamin'];

        // query untuk ke database
        $query = mysqli_query($conn, "INSERT INTO siswa (Username, Password, Nama_Lengkap, Jenis_Kelamin) VALUES ('$username','$password','$namaLengkap', '$jeniskelamin')");

        // cek kondisi, jika berhasil maka muncul alert tambah data berhasil, jika tidak maka muncul alert tambah data gagal
        if($query) {
            echo "<script>alert('Tambah data berhasil');</script>";
        } else {
            echo "<script>alert('Tambah data gagal');</script>";
        }
    }

    // edit siswa (UPDATE)
    if(isset($_POST['editSiswa'])) {
        // menangkap input
        $ID_siswa = $_POST['ID_Siswa'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $namaLengkap = $_POST['namalengkap'];
        $jeniskelamin = $_POST['jeniskelamin'];

        // query untuk ke database
        $query = mysqli_query($conn, "UPDATE siswa SET Username='$username', Password='$password', Nama_Lengkap='$namaLengkap', Jenis_Kelamin='$jeniskelamin' WHERE ID_Siswa='$ID_siswa'");

        // mengecek query berhasil atau tidak
        if($query) {
            echo "<script>alert('Edit data berhasil');</script>";
        } else {
            echo "<script>alert('Edit data gagal');</script>";
        }
    }

    // hapus (DELETE)
    if(isset($_GET['hapusSiswa'])) {
        $id = $_GET['hapusSiswa'];
        $delete = mysqli_query($conn, "DELETE FROM siswa WHERE ID_Siswa='$id'");

        if($delete) {
            echo "<script>alert('Hapus data berhasil');</script>";
        } else {
            echo "<script>alert('Hapus data gagal');</script>";
        }
    }

?>

<?php
// tambah guru (INSERT)
    if(isset($_POST['tambahGuru'])) {
        $usernameGuru = $_POST['usernameGuru'];
        $passwordGuru = $_POST['passwordGuru'];
        $namaLengkapGuru = $_POST['namalengkapGuru'];
        $jeniskelaminGuru = $_POST['jeniskelaminGuru'];

        $query = mysqli_query($conn, "INSERT INTO guru (Username, Password, Nama_Lengkap, Jenis_Kelamin) VALUES ('$usernameGuru','$passwordGuru','$namaLengkapGuru', '$jeniskelaminGuru')");

        if($query) {
            echo "<script>alert('Tambah data berhasil');</script>";
        } else {
            echo "<script>alert('Tambah data gagal');</script>";
        }
    }

    // edit guru (UPDATE)
    if(isset($_POST['editGuru'])) {
        $ID_guru = $_POST['ID_Guru'];
        $usernameGuru = $_POST['usernameGuru'];
        $passwordGuru = $_POST['passwordGuru'];
        $namaLengkapGuru = $_POST['namalengkapGuru'];
        $jeniskelaminGuru = $_POST['jeniskelaminGuru'];

        $query = mysqli_query($conn, "UPDATE guru SET Username='$usernameGuru', Password='$passwordGuru', Nama_Lengkap='$namaLengkapGuru', Jenis_Kelamin='$jeniskelaminGuru' WHERE ID_Guru='$ID_guru'");

        if($query) {
            echo "<script>alert('Edit data berhasil');</script>";
        } else {
            echo "<script>alert('Edit data gagal');</script>";
        }
    }

    // hapus guru (DELETE)
    if(isset($_GET['hapus'])) {
        $idGuru = $_GET['hapus'];
        $delete = mysqli_query($conn, "DELETE FROM guru WHERE ID_Guru='$idGuru'");

        if($delete) {
            echo "<script>alert('Hapus data berhasil');</script>";
        } else {
            echo "<script>alert('Hapus data gagal');</script>";
        }
    }

?>

<?php
// tambah Visi&Misi (INSERT)
if(isset($_POST['tambahVisiMisi'])) {
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    $query = mysqli_query($conn, "INSERT INTO visi_misi (Visi, Misi) VALUES ('$visi', '$misi')");

    if($query) {
        echo "<script>alert('Tambah data berhasil');</script>";
    } else {
        echo "<script>alert('Tambah data gagal');</script>";
    }
}

// edit visi misi (UPDATE)
if(isset($_POST['editVisiMisi'])) {
    $ID_visimisi = $_POST['IDVisiMisi']; // Pastikan nama variabelnya konsisten
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    $query = mysqli_query($conn, "UPDATE visi_misi SET Visi='$visi', Misi='$misi' WHERE ID_Visi_Misi='$ID_visimisi'");

    if($query) {
        echo "<script>alert('Edit data berhasil');</script>";
    } else {
        echo "<script>alert('Edit data gagal');</script>";
    }
}

// hapus visi misi (DELETE)
if(isset($_GET['hapusVisiMisi'])) {
    $idVisiMisi = $_GET['hapusVisiMisi']; // Pastikan nama parameter konsisten
    $delete = mysqli_query($conn, "DELETE FROM visi_misi WHERE ID_Visi_Misi='$idVisiMisi'");

    if($delete) {
        echo "<script>alert('Hapus data berhasil');</script>";
    } else {
        echo "<script>alert('Hapus data gagal');</script>";
    }
}

?>

<!-- Your HTML content here... -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Management</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">Dashboard</div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="profile">Admin Profile</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#">Dashboard</a>
        <a href="../E-Learning/learning.php">E-Learning</a>
        <a href="../My-Ujian/e-ujian.php">E-Ujian</a>
        <a href="../Pendaftaran/Pendaftaran.php">Pendaftaran</a>
        <a href="../Pengumuman/New folder/index.php">Pengumuman</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Student Management -->
        <div class="siswa-management">
            <h1>Student Management</h1>
            <!-- Formulir Langsung di Halaman -->
            <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = mysqli_query($conn, "SELECT * FROM siswa WHERE ID_Siswa='$id'");
                $data_edit = mysqli_fetch_array($query);
                ?>
                    <form action="" method="POST">
                        <h2 id="formTitle">Edit Student</h2>
                        <input type="hidden" name="ID_Siswa" value="<?php echo $data_edit['ID_Siswa'] ?>" required>

                        <label for="username">Username</label>
                        <input type="text" value="<?php echo $data_edit['Username'] ?>" name="username" required>

                        <label for="password">Password</label>
                        <input type="text" value="<?php echo $data_edit['Password'] ?>" name="password" required>

                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" value="<?php echo $data_edit['Nama_Lengkap'] ?>" name="namalengkap" required>

                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <input type="text" value="<?php echo $data_edit['Jenis_Kelamin'] ?>" name="jeniskelamin" required>

                        <button type="submit" name="editSiswa">Save</button>
                    </form>
                <?php
            } else {
                ?>
                    <form action="" method="POST">
                        <h2 id="formTitle">Add New Student</h2>
                        <input type="hidden" name="ID_Siswa" value="">

                        <label for="username">Username</label>
                        <input type="text" name="username" required>

                        <label for="password">Password</label>
                        <input type="text" name="password" required>

                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" name="namalengkap" required>

                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <input type="text" name="jeniskelamin" required>

                        <button type="submit" name="tambahSiswa">Save</button>
                    </form>
                <?php
            }
            ?>

            <!-- Student Table -->
            <table class="siswa-table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM siswa";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                            <td><?php echo $row['Username'] ?></td>
                            <td><?php echo $row['Password'] ?></td>
                            <td><?php echo $row['Nama_Lengkap'] ?></td>
                            <td><?php echo $row['Jenis_Kelamin'] ?></td>
                            <td><a href='index.php?id=<?php echo $row['ID_Siswa'] ?>'>Edit</a> | <a href='index.php?hapus=<?php echo $row['ID_Siswa'] ?>'>Delete</a></td>
                            </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>No students found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="guru-management">
            <h1>Teacher Management</h1>
            <!-- Formulir Langsung di Halaman -->
            <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = mysqli_query($conn, "SELECT * FROM guru WHERE ID_Guru='$id'");
                $data_edit = mysqli_fetch_array($query);
                ?>
                    <form action="" method="POST">
                        <h2 id="formTitle">Edit Teacher</h2>
                        <input type="hidden" name="ID_Guru" value="<?php echo $data_edit['ID_Guru'] ?>" required>

                        <label for="username">Username</label>
                        <input type="text" value="<?php echo $data_edit['Username'] ?>" name="usernameGuru" required>

                        <label for="password">Password</label>
                        <input type="text" value="<?php echo $data_edit['Password'] ?>" name="passwordGuru" required>

                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" value="<?php echo $data_edit['Nama_Lengkap'] ?>" name="namalengkapGuru" required>

                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <input type="text" value="<?php echo $data_edit['Jenis_Kelamin'] ?>" name="jeniskelaminGuru" required>

                        <button type="submit" name="editGuru">Save</button>
                    </form>
                <?php
            } else {
                ?>
                    <form action="" method="POST">
                        <h2 id="formTitle">Add New Teacher</h2>
                        <input type="hidden" name="ID_Guru" value="">

                        <label for="username">Username</label>
                        <input type="text" name="usernameGuru" required>

                        <label for="password">Password</label>
                        <input type="text" name="passwordGuru" required>

                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" name="namalengkapGuru" required>

                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <input type="text" name="jeniskelaminGuru" required>

                        <button type="submit" name="tambahGuru">Save</button>
                    </form>
                <?php
            }
            ?>

            <!-- Student Table -->
            <table class="guru-table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM guru";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                            <td><?php echo $row['Username'] ?></td>
                            <td><?php echo $row['Password'] ?></td>
                            <td><?php echo $row['Nama_Lengkap'] ?></td>
                            <td><?php echo $row['Jenis_Kelamin'] ?></td>
                            <td><a href='index.php?idGuru=<?php echo $row['ID_Guru'] ?>'>Edit</a> | <a href='index.php?hapus=<?php echo $row['ID_Guru'] ?>'>Delete</a></td>
                            </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>No students found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="visimisi-management">
    <h1>Visi&Misi Management</h1>

    <!-- Formulir Langsung di Halaman -->
    <?php
    if(isset($_GET['idVisiMisi'])) { // Pastikan ini sesuai dengan parameter yang digunakan
        $idVisiMisi = $_GET['idVisiMisi']; 
        $query = mysqli_query($conn, "SELECT * FROM visi_misi WHERE ID_Visi_Misi='$idVisiMisi'");
        $data_edit = mysqli_fetch_array($query);
    ?>
        <form action="" method="POST">
            <h2 id="formTitle">Edit Visi&Misi</h2>
            <input type="hidden" name="IDVisiMisi" value="<?php echo $data_edit['ID_Visi_Misi'] ?>" required>

            <label for="visi">Visi</label>
            <input type="text" value="<?php echo $data_edit['Visi'] ?>" name="visi" required>

            <label for="misi">Misi</label>
            <input type="text" value="<?php echo $data_edit['Misi'] ?>" name="misi" required>

            <button type="submit" name="editVisiMisi">Save</button>
        </form>
    <?php
    } else {
    ?>
        <form action="" method="POST">
            <h2 id="formTitle">Add New Visi&Misi</h2>
            <input type="hidden" name="IDVisiMisi" value="">

            <label for="visi">Visi</label>
            <input type="text" name="visi" required>

            <label for="misi">Misi</label>
            <input type="text" name="misi" required>

            <button type="submit" name="tambahVisiMisi">Save</button>
        </form>
    <?php
    }
    ?>

    <!-- Visi&Misi Table -->
    <table class="visimisi-table">
        <thead>
            <tr>
                <th>Visi</th>
                <th>Misi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM visi_misi";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                    <td><?php echo $row['Visi'] ?></td>
                    <td><?php echo $row['Misi'] ?></td>
                    <td><a href='index.php?idVisiMisi=<?php echo $row['ID_Visi_Misi'] ?>'>Edit</a> | <a href='index.php?hapusVisiMisi=<?php echo $row['ID_Visi_Misi'] ?>'>Delete</a></td>
                    </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='3'>No Visi&Misi found</td></tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
</div>
   


    <script src="script.js"></script>
</body>
</html>
