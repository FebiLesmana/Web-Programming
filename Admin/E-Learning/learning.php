<?php include "../../koneksi.php"?>
<?php

    // tambah pelajaran (INSERT)
    if(isset($_POST['tambahPelajaran'])) {
        // menangkap input sesuai dengan attribute name
        $courseName = $_POST['courseName'];
        $courseDescription = $_POST['courseDescription'];
        $courseImage = $_POST['courseImage'];

        // query untuk ke database
        $query = mysqli_query($conn, "INSERT INTO pelajaran (Link_Image, Nama_Pelajaran, Deskripsi) VALUES ('$courseImage','$courseName','$courseDescription')");

        // cek kondisi, jika behrasil maka muncul alert tambah data berhasil, jika tidak maka muncul alert tambah data gagal
        if($query) {
            ?>
                <script>
                    alert('Tambah data berhasil')
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('Tambah data gagal')
                </script>
            <?php
        }
    }

    // edit pelajaran (UPDATE)
    if(isset($_POST['editPelajaran'])) {
        // menangkap input
        $ID_Pelajaran = $_POST['ID_Pelajaran'];
        $courseName = $_POST['courseName'];
        $courseDescription = $_POST['courseDescription'];
        $courseImage = $_POST['courseImage'];

        // query untuk ke database
        $query = mysqli_query($conn, "UPDATE pelajaran SET Link_Image='$courseImage', Nama_Pelajaran='$courseName', Deskripsi='$courseDescription' WHERE ID_Pelajaran='$ID_Pelajaran'");

        // mengecek query berhasil atau tidak
        if($query) {
            ?>
                <script>
                    alert('Edit data berhasil')
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('Edit data gagal')
                </script>
            <?php
        }
    }

    // hapus (DELETE)
    if(isset($_GET['hapus'])) {
        // menangkap data get dari link learning.php?hapus
        $id = $_GET['hapus'];

        // query untuk ke database
        $delete = mysqli_query($conn, "DELETE FROM pelajaran WHERE ID_Pelajaran='$id'");

        // mengecek kondisi delete berhasil atau tidak
        if($delete) {
            ?>
                <script>
                    alert('Hapus data berhasil')
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('Hapus data gagal')
                </script>
            <?php
        }
    }

?>

<?php
// tambah materi (INSERT)
    if(isset($_POST['tambahMateri'])) {
        // menangkap input sesuai dengan attribute name
        $judulMateri = $_POST['judulMateri'];
        $deskripsiMateri = $_POST['deskripsiMateri'];
        $gambarMateri = $_POST['gambarMateri'];
        $linkMateri = $_POST['linkMateri'];
        $keteranganMateri = $_POST['ketMateri'];

        // query untuk ke database
        $query = mysqli_query($conn, "INSERT INTO materi (Judul_Materi, Deskripsi_Materi, Gambar_Materi, Link_Materi, Keterangan) VALUES ('$judulMateri',' $deskripsiMateri','$gambarMateri','$linkMateri','$keteranganMateri')");

        // cek kondisi, jika behrasil maka muncul alert tambah data berhasil, jika tidak maka muncul alert tambah data gagal
        if($query) {
            ?>
                <script>
                    alert('Tambah data berhasil')
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('Tambah data gagal')
                </script>
            <?php
        }
    }

    // edit pelajaran (UPDATE)
    if(isset($_POST['editPelajaran'])) {
        // menangkap input
        $ID_Pelajaran = $_POST['ID_Pelajaran'];
        $courseName = $_POST['courseName'];
        $courseDescription = $_POST['courseDescription'];
        $courseImage = $_POST['courseImage'];

        // query untuk ke database
        $query = mysqli_query($conn, "UPDATE pelajaran SET Link_Image='$courseImage', Nama_Pelajaran='$courseName', Deskripsi='$courseDescription' WHERE ID_Pelajaran='$ID_Pelajaran'");

        // mengecek query berhasil atau tidak
        if($query) {
            ?>
                <script>
                    alert('Edit data berhasil')
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('Edit data gagal')
                </script>
            <?php
        }
    }

    // hapus (DELETE)
    if(isset($_GET['hapus'])) {
        // menangkap data get dari link learning.php?hapus
        $id = $_GET['hapus'];

        // query untuk ke database
        $delete = mysqli_query($conn, "DELETE FROM pelajaran WHERE ID_Pelajaran='$id'");

        // mengecek kondisi delete berhasil atau tidak
        if($delete) {
            ?>
                <script>
                    alert('Hapus data berhasil')
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('Hapus data gagal')
                </script>
            <?php
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Management</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">E-Learning</div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="profile">Admin Profile</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="../Home/index.php">Dashboard</a>
        <a href="#">E-Learning</a>
        <a href="../My-Ujian/e-ujian.php">E-Ujian</a>
        <a href="../Pendaftaran/Pendaftaran.php">Pendaftaran</a>
        <a href="../Pengumuman/New folder/index.php">Pengumuman</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Course Management -->
        <div class="course-management">
            <h1>Course Management</h1>
            <!-- Formulir Langsung di Halaman -->
            <?php
            // mengecek apakah user menekan tombol edit atau tidak, ditandai dengan adanya id pada link, learning.php?id
                if(isset($_GET['id'])) {
                    // memasukkan get id ke dalam variabel id
                    $id = $_GET['id'];
                    // query untuk database
                    $query = mysqli_query($conn, "SELECT * FROM pelajaran WHERE ID_Pelajaran='$id'");
                    $data_edit = mysqli_fetch_array($query);
                    ?>
                        <form action="" method="POST">
                            <h2 id="formTitle">Add New Course</h2>
                            <input type="hidden" name="ID_Pelajaran" value="<?php echo $data_edit['ID_Pelajaran'] ?>" required>
                            
                            <label for="courseName">Course Name</label>
                            <input type="text" value="<?php echo $data_edit['Nama_Pelajaran'] ?>" name="courseName" required>

                            <label for="courseDescription">Description</label>
                            <textarea name="courseDescription" required><?php echo $data_edit['Deskripsi'] ?></textarea>

                            <label for="courseImage">Course Image URL</label>
                            <input type="text" name="courseImage" value="<?php echo $data_edit['Link_Image'] ?>" required>

                            <button type="submit" name="editPelajaran">Save</button>
                        </form>
                    <?php
                } else {
                    ?>
                        <form action="" method="POST">
                            <h2 id="formTitle">Add New Course</h2>
                            <label for="courseName">Course Name</label>
                            <input type="text" name="courseName" required>

                            <label for="courseDescription">Description</label>
                            <textarea name="courseDescription" required></textarea>

                            <label for="courseImage">Course Image URL</label>
                            <input type="text" name="courseImage" required>

                            <button type="submit" name="tambahPelajaran">Save</button>
                        </form>
                    <?php
                }
            ?>
            <!-- Table Courses -->
            
            
            <table class="course-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Course Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM pelajaran";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data untuk setiap baris
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                            <td><img src='<?php echo $row['Link_Image'] ?>' alt='courseImage' width='50'></td>
                            <td><?php echo $row['Nama_Pelajaran'] ?></td>
                            <td><?php echo $row['Deskripsi'] ?></td>
                            <td><a href='learning.php?id=<?php echo $row['ID_Pelajaran'] ?>'>Edit</a> | <a href='learning.php?hapus=<?php echo $row['ID_Pelajaran'] ?>'>Delete</a></td>
                            </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No courses found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Material Management -->
        <div class="material-management">
            <h1>Material Management</h1>
            <!-- Formulir Langsung di Halaman -->
            <form action="" method="POST">
                <h2 id="materialFormTitle">Add New Material</h2>
                <label for="materialTitle">Material Title</label>
                <input type="text" name="judulMateri" required>

                <label for="materialDescription">Description</label>
                <textarea name="deskripsiMateri" required></textarea>

                <label for="materialImage">Material Image URL</label>
                <input type="text" name="gambarMateri" required>

                <label for="materialLink">Material Link</label>
                <input type="text" name="linkMateri" required>

                <label for="materialNotes">Notes</label>
                <textarea name="ketMateri" required></textarea>

                <button type="submit" name="tambahMateri">save</button>
            </form>

            <!-- Table Materials -->
            <table class="material-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Link</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody >
                <?php
                $sql = "SELECT * FROM materi";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data untuk setiap baris
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                            <td><img src='<?php echo $row['Gambar_Materi'] ?>' alt='Course Image' width='50'></td>
                            <td><?php echo $row['Judul_Materi'] ?></td>
                            <td><?php echo $row['Deskripsi_Materi'] ?></td>
                            <td><?php echo $row['Link_Materi'] ?></td>
                            <td><?php echo $row['Keterangan'] ?></td>
                            <td><a href='learning.php?id_materi=<?php echo $row['ID_Materi'] ?>'>Edit</a> | <a href='learning.php?hapus=<?php echo $row['ID_Materi'] ?>'>Delete</a></td>
                            </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No courses found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="script.js"></script>


</body>

</html>