    let pengumumans = [];
    let currentEditIndex = null;

    // Display data in the table
    function displayData() {
        const tableBody = document.getElementById('pengumuman-table');
        tableBody.innerHTML = '';
        pengumumans.forEach((pengumuman, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${pengumuman.title1}</td>
            <td><img src="${pengumuman.thumbnail1}" alt="Thumbnail 1" width="100"></td>
            <td>${pengumuman.title2}</td>
            <td><img src="${pengumuman.thumbnail2}" alt="Thumbnail 2" width="100"></td>
            <td>${pengumuman.title3}</td>
            <td><img src="${pengumuman.thumbnail3}" alt="Thumbnail 3" width="100"></td>
            <td>${pengumuman.title4}</td>
            <td><img src="${pengumuman.thumbnail4}" alt="Thumbnail 4" width="100"></td>
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
        document.getElementById('form-title').textContent = 'Add Pengumuman';
        document.getElementById('pengumuman-form').reset();
        currentEditIndex = null;
        const previewImages = document.querySelectorAll('#pengumuman-form img');
        previewImages.forEach(img => img.remove()); // Remove image previews when reset
    }

    // Save data (add or update)
    document.getElementById('pengumuman-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const title1 = document.getElementById('pengumuman-title1').value;
        const thumbnail1 = document.getElementById('pengumuman-thumbnail1').files[0];
        const title2 = document.getElementById('pengumuman-title2').value;
        const thumbnail2 = document.getElementById('pengumuman-thumbnail2').files[0];
        const title3 = document.getElementById('pengumuman-title3').value;
        const thumbnail3 = document.getElementById('pengumuman-thumbnail3').files[0];
        const title4 = document.getElementById('pengumuman-title4').value;
        const thumbnail4 = document.getElementById('pengumuman-thumbnail4').files[0];

        const reader1 = new FileReader();
        const reader2 = new FileReader();
        const reader3 = new FileReader();
        const reader4 = new FileReader();

        reader1.onloadend = function() {
            const thumbnail1Data = reader1.result;
            reader2.onloadend = function() {
                const thumbnail2Data = reader2.result;
                reader3.onloadend = function() {
                    const thumbnail3Data = reader3.result;
                    reader4.onloadend = function() {
                        const thumbnail4Data = reader4.result;
                        const newData = {
                            title1,
                            thumbnail1: thumbnail1Data,
                            title2,
                            thumbnail2: thumbnail2Data,
                            title3,
                            thumbnail3: thumbnail3Data,
                            title4,
                            thumbnail4: thumbnail4Data
                        };

                        if (currentEditIndex !== null) {
                            pengumumans[currentEditIndex] = newData; // Update existing data
                        } else {
                            pengumumans.push(newData); // Add new data
                        }

                        resetForm();
                        displayData();
                    };
                    if (thumbnail4) {
                        reader4.readAsDataURL(thumbnail4);
                    }
                };
                if (thumbnail3) {
                    reader3.readAsDataURL(thumbnail3);
                }
            };
            if (thumbnail2) {
                reader2.readAsDataURL(thumbnail2);
            }
        };

        if (thumbnail1) {
            reader1.readAsDataURL(thumbnail1);
        }
    });

    // Edit data
    function editData(index) {
        currentEditIndex = index;
        const pengumuman = pengumumans[index];

        document.getElementById('form-title').textContent = 'Edit Pengumuman';
        document.getElementById('pengumuman-title1').value = pengumuman.title1;
        document.getElementById('pengumuman-title2').value = pengumuman.title2;
        document.getElementById('pengumuman-title3').value = pengumuman.title3;
        document.getElementById('pengumuman-title4').value = pengumuman.title4;

        // Handle image previews
        const preview1 = document.createElement('img');
        preview1.src = pengumuman.thumbnail1;
        preview1.width = 100;
        document.getElementById('pengumuman-thumbnail1').parentElement.appendChild(preview1);

        const preview2 = document.createElement('img');
        preview2.src = pengumuman.thumbnail2;
        preview2.width = 100;
        document.getElementById('pengumuman-thumbnail2').parentElement.appendChild(preview2);

        const preview3 = document.createElement('img');
        preview3.src = pengumuman.thumbnail3;
        preview3.width = 100;
        document.getElementById('pengumuman-thumbnail3').parentElement.appendChild(preview3);

        const preview4 = document.createElement('img');
        preview4.src = pengumuman.thumbnail4;
        preview4.width = 100;
        document.getElementById('pengumuman-thumbnail4').parentElement.appendChild(preview4);
    }

    // Delete data
    function deleteData(index) {
        if (confirm('Are you sure you want to delete this pengumuman?')) {
            pengumumans.splice(index, 1);
            displayData();
        }
    }

    // Initial display
    displayData();