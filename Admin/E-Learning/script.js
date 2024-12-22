let courses = [{
    name: 'Matematika',
    description: 'Pelajaran konsep dasar matematika.',
    image: 'https://storage.googleapis.com/a1aa/image/OH89iMNz4roSCtjShj1fXfemv08mrOh8SKtyw7KbBTgqkv1nA.jpg'
}, {
    name: 'Bahasa Inggris',
    description: 'Pelajaran keterampilan berbahasa Inggris.',
    image: 'https://storage.googleapis.com/a1aa/image/GLK8fe4huJiTH0KZ2OTiYhgJKFsC1ufeYtFR3ilCXRVcJfWfE.jpg'
}];

let materials = [];
let currentEditIndex = null;
let currentEditMaterialIndex = null;

// Course Functions
function displayCourses() {
    const courseList = document.getElementById('courseList');
    courseList.innerHTML = '';
    courses.forEach((course, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
                    <td><img src="${course.image}" alt="${course.name}" width="100"></td>
                    <td>${course.name}</td>
                    <td>${course.description}</td>
                    <td>
                        <button onclick="editCourse(${index})">Edit</button>
                        <button onclick="deleteCourse(${index})">Delete</button>
                    </td>
                `;
        courseList.appendChild(row);
    });
}

function saveCourse(event) {
    event.preventDefault();
    const name = document.getElementById('courseName').value;
    const description = document.getElementById('courseDescription').value;
    const image = document.getElementById('courseImage').value;

    if (currentEditIndex !== null) {
        courses[currentEditIndex] = {
            name,
            description,
            image
        };
    } else {
        courses.push({
            name,
            description,
            image
        });
    }
    resetForm();
    displayCourses();
}

function editCourse(index) {
    currentEditIndex = index;
    const course = courses[index];
    document.getElementById('formTitle').textContent = 'Edit Course';
    document.getElementById('courseName').value = course.name;
    document.getElementById('courseDescription').value = course.description;
    document.getElementById('courseImage').value = course.image;
}

function deleteCourse(index) {
    if (confirm('Are you sure you want to delete this course?')) {
        courses.splice(index, 1);
        displayCourses();
    }
}

function resetForm() {
    document.getElementById('courseForm').reset();
    document.getElementById('formTitle').textContent = 'Add New Course';
    currentEditIndex = null;
}

// Material Functions
function displayMaterials() {
    const materialList = document.getElementById('materialList');
    materialList.innerHTML = '';
    materials.forEach((material, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
                    <td><img src="${material.image}" alt="${material.title}" width="100"></td>
                    <td>${material.title}</td>
                    <td>${material.description}</td>
                    <td><a href="${material.link}" target="_blank">View</a></td>
                    <td>${material.notes}</td>
                    <td>
                        <button onclick="editMaterial(${index})">Edit</button>
                        <button onclick="deleteMaterial(${index})">Delete</button>
                    </td>
                `;
        materialList.appendChild(row);
    });
}

function saveMaterial(event) {
    event.preventDefault();
    const title = document.getElementById('materialTitle').value;
    const description = document.getElementById('materialDescription').value;
    const image = document.getElementById('materialImage').value;
    const link = document.getElementById('materialLink').value;
    const notes = document.getElementById('materialNotes').value;

    if (currentEditMaterialIndex !== null) {
        materials[currentEditMaterialIndex] = {
            title,
            description,
            image,
            link,
            notes
        };
    } else {
        materials.push({
            title,
            description,
            image,
            link,
            notes
        });
    }
    resetMaterialForm();
    displayMaterials();
}

function editMaterial(index) {
    currentEditMaterialIndex = index;
    const material = materials[index];
    document.getElementById('materialFormTitle').textContent = 'Edit Material';
    document.getElementById('materialTitle').value = material.title;
    document.getElementById('materialDescription').value = material.description;
    document.getElementById('materialImage').value = material.image;
    document.getElementById('materialLink').value = material.link;
    document.getElementById('materialNotes').value = material.notes;
}

function deleteMaterial(index) {
    if (confirm('Are you sure you want to delete this material?')) {
        materials.splice(index, 1);
        displayMaterials();
    }
}

function resetMaterialForm() {
    document.getElementById('materialForm').reset();
    document.getElementById('materialFormTitle').textContent = 'Add New Material';
    currentEditMaterialIndex = null;
}

document.getElementById('courseForm').addEventListener('submit', saveCourse);
document.getElementById('materialForm').addEventListener('submit', saveMaterial);
displayCourses();
displayMaterials();