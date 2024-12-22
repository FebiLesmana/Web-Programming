// Function to enable editing for individual cards (e.g., students, teachers)
function editCard(id) {
    const input = document.getElementById(id);
    const textArea = document.getElementById(id + 'Desc');

    // Enable input and textarea editing
    input.removeAttribute('readonly');
    textArea.removeAttribute('readonly');
    input.style.borderColor = '#000';
    textArea.style.borderColor = '#000';

    // Enable the save button
    const saveButton = input.parentElement.querySelector('button[onclick^="saveCard"]');
    saveButton.removeAttribute('disabled');
}

// Function to save card data
function saveCard(id) {
    const input = document.getElementById(id);
    const textArea = document.getElementById(id + 'Desc');

    // Disable editing
    input.setAttribute('readonly', true);
    textArea.setAttribute('readonly', true);
    input.style.borderColor = '#ddd';
    textArea.style.borderColor = '#ddd';

    // Disable the save button
    const saveButton = input.parentElement.querySelector('button[onclick^="saveCard"]');
    saveButton.setAttribute('disabled', true);

    // AJAX request to update data in the database
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert(`Data saved: ${input.value}, Description: ${textArea.value}`);
        } else {
            alert('Error saving data. Please try again.');
        }
    };

    xhr.send(`id=${id}&value=${encodeURIComponent(input.value)}&description=${encodeURIComponent(textArea.value)}`);
}

// Function to enable editing for Visi and Misi
function editVisionMission() {
    const vision = document.getElementById('vision');
    const mission = document.getElementById('mission');

    // Enable editing
    vision.removeAttribute('readonly');
    mission.removeAttribute('readonly');
    vision.style.borderColor = '#000';
    mission.style.borderColor = '#000';

     // Enable the save button
     const saveButton = document.querySelector('.button-group button[type="submit"]');
     saveButton.removeAttribute('disabled');
 }

// Function to save Visi and Misi
function saveVisionMission() {
    const vision = document.getElementById('vision');
    const mission = document.getElementById('mission');

    // Disable editing
    vision.setAttribute('readonly', true);
    mission.setAttribute('readonly', true);
    vision.style.borderColor = '#ddd';
    mission.style.borderColor = '#ddd';

    // Disable the save button
    const saveButton = document.querySelector('.button-group button:nth-child(2)');
    saveButton.setAttribute('disabled', true);

    // AJAX request to update Visi and Misi
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert(`Visi and Misi saved:\nVisi: ${vision.value}\nMisi: ${mission.value}`);
        } else {
            alert('Error saving Visi and Misi. Please try again.');
        }
    };

    xhr.send(`id=visi_misi&visi=${encodeURIComponent(vision.value)}&misi=${encodeURIComponent(mission.value)}`);
}
