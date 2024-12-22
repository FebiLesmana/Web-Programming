<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'create') {
        $judul = $_POST['judul'];
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $fileName = basename($_FILES['thumbnail']['name']);
            $targetFilePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetFilePath)) {
                $thumbnail = $fileName;
                $stmt = $conn->prepare("INSERT INTO pengumuman (Thumbnail, Judul_Pengumuman) VALUES (?, ?)");
                $stmt->bind_param("ss", $thumbnail, $judul);
                if ($stmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Pengumuman berhasil ditambahkan"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Gagal menambahkan pengumuman"]);
                }
                $stmt->close();
            } else {
                echo json_encode(["status" => "error", "message" => "Gagal mengupload gambar"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "File thumbnail tidak valid"]);
        }
    } elseif ($action === 'read') {
        $result = $conn->query("SELECT * FROM pengumuman");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $thumbnail = null;

        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $fileName = basename($_FILES['thumbnail']['name']);
            $targetFilePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetFilePath)) {
                $thumbnail = $fileName;
            }
        }

        if ($thumbnail) {
            $stmt = $conn->prepare("UPDATE pengumuman SET Thumbnail = ?, Judul_Pengumuman = ? WHERE ID_Pengumuman = ?");
            $stmt->bind_param("ssi", $thumbnail, $judul, $id);
        } else {
            $stmt = $conn->prepare("UPDATE pengumuman SET Judul_Pengumuman = ? WHERE ID_Pengumuman = ?");
            $stmt->bind_param("si", $judul, $id);
        }

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Pengumuman berhasil diperbarui"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal memperbarui pengumuman"]);
        }
        $stmt->close();
    } elseif ($action === 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM pengumuman WHERE ID_Pengumuman = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Pengumuman berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Gagal menghapus pengumuman"]);
        }
        $stmt->close();
    }
}

$conn->close();
?>
