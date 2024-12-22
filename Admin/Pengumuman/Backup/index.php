<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pengumuman</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Admin Pengumuman</h1>
    <form id="form-pengumuman" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="action" id="action" value="create">
        <label for="judul">Judul Pengumuman:</label>
        <input type="text" name="judul" id="judul" required>
        <label for="thumbnail">Thumbnail:</label>
        <input type="file" name="thumbnail" id="thumbnail">
        <button type="submit">Submit</button>
    </form>

    <h2>Daftar Pengumuman</h2>
    <table border="1" id="table-pengumuman">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        function loadPengumuman() {
            $.post('backend.php', { action: 'read' }, function(data) {
                const pengumuman = JSON.parse(data);
                const tbody = $('#table-pengumuman tbody');
                tbody.empty();
                pengumuman.forEach(item => {
                    tbody.append(`
                        <tr>
                            <td>${item.ID_Pengumuman}</td>
                            <td><img src="uploads/${item.Thumbnail}" width="100"></td>
                            <td>${item.Judul_Pengumuman}</td>
                            <td>
                                <button onclick="editPengumuman(${item.ID_Pengumuman}, '${item.Judul_Pengumuman}')">Edit</button>
                                <button onclick="deletePengumuman(${item.ID_Pengumuman})">Hapus</button>
                            </td>
                        </tr>
                    `);
                });
            });
        }

        function editPengumuman(id, judul) {
            $('#id').val(id);
            $('#judul').val(judul);
            $('#action').val('update');
        }

        function deletePengumuman(id) {
            if (confirm('Yakin ingin menghapus pengumuman ini?')) {
                $.post('backend.php', { action: 'delete', id }, function(response) {
                    alert(JSON.parse(response).message);
                    loadPengumuman();
                });
            }
        }

        $('#form-pengumuman').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: 'backend.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(JSON.parse(response).message);
                    $('#form-pengumuman')[0].reset();
                    $('#action').val('create');
                    loadPengumuman();
                }
            });
        });

        $(document).ready(function() {
            loadPengumuman();
        });
    </script>
</body>
</html>
