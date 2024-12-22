<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "db_smpkartini");
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk mengupdate data card (siswa, guru, dll)
function updateCard($conn, $id, $value, $description) {
    // Escape data untuk keamanan
    $value = mysqli_real_escape_string($conn, $value);
    $description = mysqli_real_escape_string($conn, $description);

    // Query untuk mengupdate data
    $query = "UPDATE data_cards SET Value='$value', Description='$description' WHERE ID='$id'";

    // Menjalankan query dan memeriksa apakah berhasil
    if (mysqli_query($conn, $query)) {
        return "Card updated successfully";
    } else {
        return "Error: " . mysqli_error($conn);
    }
}

// Perbarui data berdasarkan ID
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Jika yang diperbarui adalah Visi dan Misi
        if ($id === 'visi_misi') {
            $visi = mysqli_real_escape_string($conn, $_POST['visi']);
            $misi = mysqli_real_escape_string($conn, $_POST['misi']);

            // Memanggil fungsi update untuk visi dan misi
            $result = updateVisionMission($conn, $visi, $misi);
            echo $result;
        } else {
            // Jika yang diperbarui adalah card (e.g., students or teachers)
            $value = mysqli_real_escape_string($conn, $_POST['value']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);

            // Memanggil fungsi update untuk card
            $result = updateCard($conn, $id, $value, $description);
            echo $result;
        }
    }
}

// Fungsi untuk mengupdate Visi dan Misi
function updateVisionMission($conn, $visi, $misi) {
    // Escape data untuk keamanan
    $visi = mysqli_real_escape_string($conn, $visi);
    $misi = mysqli_real_escape_string($conn, $misi);

    // Query untuk mengupdate visi dan misi
    $query = "UPDATE visi_misi SET Visi='$visi', Misi='$misi' WHERE ID_VisiMisi=1";

    // Menjalankan query dan memeriksa apakah berhasil
    if (mysqli_query($conn, $query)) {
        return "Visi dan Misi updated successfully";
    } else {
        return "Error: " . mysqli_error($conn);
    }
}
?>

