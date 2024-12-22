let pendaftarans = [];
let currentEditIndex = null;

// Display data in the table
function displayData() {
    const tableBody = document.getElementById('pendaftaran-table');
    tableBody.innerHTML = '';
    pendaftarans.forEach((pendaftaran, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
                    <td>${pendaftaran.title}</td>
                    <td><img src="${pendaftaran.poster1}" alt="Poster 1" width="100"></td>
                    <td><img src="${pendaftaran.poster2}" alt="Poster 2" width="100"></td>
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
    document.getElementById('form-title').textContent = 'Add Pendaftaran';
    document.getElementById('pendaftaran-form').reset();
    currentEditIndex = null;
    const previewImages = document.querySelectorAll('#pendaftaran-form img');
    previewImages.forEach(img => img.remove()); // Remove image previews when reset
}

// Save data (add or update)
document.getElementById('pendaftaran-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const title = document.getElementById('pendaftaran-title').value;
    const poster1 = document.getElementById('pendaftaran-poster1').files[0];
    const poster2 = document.getElementById('pendaftaran-poster2').files[0];

    const reader1 = new FileReader();
    const reader2 = new FileReader();

    reader1.onloadend = function() {
        const poster1Data = reader1.result;
        reader2.onloadend = function() {
            const poster2Data = reader2.result;
            const newData = {
                title,
                poster1: poster1Data,
                poster2: poster2Data
            };

            if (currentEditIndex !== null) {
                pendaftarans[currentEditIndex] = newData; // Update existing data
            } else {
                pendaftarans.push(newData); // Add new data
            }

            resetForm();
            displayData();
        };

        if (poster2) {
            reader2.readAsDataURL(poster2);
        }
    };

    if (poster1) {
        reader1.readAsDataURL(poster1);
    }
});

// Edit data
function editData(index) {
    currentEditIndex = index;
    const pendaftaran = pendaftarans[index];

    document.getElementById('form-title').textContent = 'Edit Pendaftaran';
    document.getElementById('pendaftaran-title').value = pendaftaran.title;

    // Handle image previews
    const preview1 = document.createElement('img');
    preview1.src = pendaftaran.poster1;
    preview1.width = 100;
    document.getElementById('pendaftaran-poster1').parentElement.appendChild(preview1);

    const preview2 = document.createElement('img');
    preview2.src = pendaftaran.poster2;
    preview2.width = 100;
    document.getElementById('pendaftaran-poster2').parentElement.appendChild(preview2);
}

// Delete data
function deleteData(index) {
    if (confirm('Are you sure you want to delete this pendaftaran?')) {
        pendaftarans.splice(index, 1);
        displayData();
    }
}

// Initial display
displayData();