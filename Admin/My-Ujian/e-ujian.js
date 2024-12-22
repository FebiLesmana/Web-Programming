    let ujians = [];
    let currentEditIndex = null;

    // Display data in the table
    function displayData() {
        const tableBody = document.getElementById('ujian-table');
        tableBody.innerHTML = '';
        ujians.forEach((ujian, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                    <td>${ujian.title}</td>
                    <td>${ujian.date}</td>
                    <td>${ujian.sifat}</td>
                    <td>${ujian.durasi} menit</td>
                    <td>${ujian.batas}</td>
                    <td>
                        <button onclick="editData(${index})">Edit</button>
                        <button onclick="deleteData(${index})">Delete</button>
                    </td>
                `;
            tableBody.appendChild(row);
        });
    }

    // Reset form fields
    function resetForm() {
        document.getElementById('form-title').textContent = 'Add Ujian';
        document.getElementById('ujian-form').reset();
        currentEditIndex = null;
    }

    // Save data (add or update)
    document.getElementById('ujian-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const title = document.getElementById('ujian-title').value;
        const date = document.getElementById('ujian-date').value;
        const sifat = document.getElementById('ujian-sifat').value;
        const durasi = document.getElementById('ujian-durasi').value;
        const batas = document.getElementById('ujian-batas').value;

        const newData = {
            title,
            date,
            sifat,
            durasi,
            batas
        };

        if (currentEditIndex !== null) {
            ujians[currentEditIndex] = newData; // Update existing data
        } else {
            ujians.push(newData); // Add new data
        }

        resetForm();
        displayData();
    });

    // Edit data
    function editData(index) {
        currentEditIndex = index;
        const ujian = ujians[index];

        document.getElementById('form-title').textContent = 'Edit Ujian';
        document.getElementById('ujian-title').value = ujian.title;
        document.getElementById('ujian-date').value = ujian.date;
        document.getElementById('ujian-sifat').value = ujian.sifat;
        document.getElementById('ujian-durasi').value = ujian.durasi;
        document.getElementById('ujian-batas').value = ujian.batas;
    }

    // Delete data
    function deleteData(index) {
        if (confirm('Are you sure you want to delete this ujian?')) {
            ujians.splice(index, 1);
            displayData();
        }
    }

    // Initial display
    displayData();