<?php
// backend.php
header("Content-Type: application/json");
$host = "localhost";
$user = "root"; // Sesuaikan dengan konfigurasi database Anda
$pass = "";
$dbname = "db_smpkartini"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi database
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed"]));
}

// Handle request berdasarkan method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Ambil semua data pendaftaran
        $sql = "SELECT * FROM pendaftaran";
        $result = $conn->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    case 'POST':
        // Tambahkan data baru
        $tahun_ajaran = $_POST['Tahun_Ajaran'];
        $poster_1 = '';

        if (isset($_FILES['Poster_1'])) {
            $file_tmp = $_FILES['Poster_1']['tmp_name'];
            $poster_1 = 'uploads/' . basename($_FILES['Poster_1']['name']);
            move_uploaded_file($file_tmp, $poster_1);
        }
        if (isset($_FILES['Poster_2'])) {
            $file_tmp = $_FILES['Poster_2']['tmp_name'];
            $poster_2 = 'uploads/' . basename($_FILES['Poster_2']['name']);
            move_uploaded_file($file_tmp, $poster_2);
        }

        $sql = "INSERT INTO pendaftaran (Tahun_Ajaran, Poster_1, Poster_2) VALUES ('$tahun_ajaran', '$poster_1', '$poster_2')";
        if ($conn->query($sql)) {
            echo json_encode(["status" => "success", "message" => "Data added successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => $conn->error]);
        }
        break;

    case 'PUT':
        // Update data
        parse_str(file_get_contents("php://input"), $_PUT);
        $id = $_PUT['ID_Pendaftaran'];
        $tahun_ajaran = $_PUT['Tahun_Ajaran'];

        $sql = "UPDATE pendaftaran SET Tahun_Ajaran='$tahun_ajaran' WHERE ID_Pendaftaran=$id";
        if ($conn->query($sql)) {
            echo json_encode(["status" => "success", "message" => "Data updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => $conn->error]);
        }
        break;

    case 'DELETE':
        // Hapus data
        parse_str(file_get_contents("php://input"), $_DELETE);
        $id = $_DELETE['ID_Pendaftaran'];

        $sql = "DELETE FROM pendaftaran WHERE ID_Pendaftaran=$id";
        if ($conn->query($sql)) {
            echo json_encode(["status" => "success", "message" => "Data deleted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => $conn->error]);
        }
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Invalid request"]);
        break;
}

$conn->close();
?>
