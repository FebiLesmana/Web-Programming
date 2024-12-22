<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Pendaftaran Management</h2>
        <form id="pendaftaranForm" enctype="multipart/form-data">
            <input type="hidden" id="ID_Pendaftaran">
            <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" id="Tahun_Ajaran" class="form-control" placeholder="Masukkan Tahun Ajaran" required>
            </div>
            <div class="form-group">
                <label>Upload Poster 1</label>
                <input type="file" id="Poster_1" class="form-control-file">
                <label>Upload Poster 2</label>
                <input type="file" id="Poster_2" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        <hr>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tahun Ajaran</th>
                    <th>Poster 1</th>
                    <th>Poster 2</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="pendaftaranTable"></tbody>
        </table>
    </div>

    <script>
        const backendUrl = "backend.php";

        document.addEventListener("DOMContentLoaded", loadData);

        async function loadData() {
            const response = await fetch(backendUrl);
            const data = await response.json();

            let tableBody = '';
            data.forEach(row => {
                tableBody += `
                    <tr>
                        <td>${row.ID_Pendaftaran}</td>
                        <td>${row.Tahun_Ajaran}</td>
                        <td><img src="${row.Poster_1}" alt="Poster" width="100"></td>
                        <td><img src="${row.Poster_2}" alt="Poster" width="100"></td>
                        <td>
                            <button class="btn btn-warning" onclick="editData(${row.ID_Pendaftaran}, '${row.Tahun_Ajaran}')">Edit</button>
                            <button class="btn btn-danger" onclick="deleteData(${row.ID_Pendaftaran})">Delete</button>
                        </td>
                    </tr>
                `;
            });
            document.getElementById('pendaftaranTable').innerHTML = tableBody;
        }

        document.getElementById('pendaftaranForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('Tahun_Ajaran', document.getElementById('Tahun_Ajaran').value);
            formData.append('Poster_1', document.getElementById('Poster_1').files[0]);
            formData.append('Poster_2', document.getElementById('Poster_2').files[0]);

            const response = await fetch(backendUrl, {
                method: 'POST',
                body: formData
            });

            alert('Data berhasil disimpan');
            loadData();
        });

        async function deleteData(id) {
            await fetch(backendUrl, {
                method: 'DELETE',
                body: `ID_Pendaftaran=${id}`,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            });
            alert('Data berhasil dihapus');
            loadData();
        }

        function editData(id, tahunAjaran) {
            document.getElementById('ID_Pendaftaran').value = id;
            document.getElementById('Tahun_Ajaran').value = tahunAjaran;
        }
    </script>
</body>
</html>
