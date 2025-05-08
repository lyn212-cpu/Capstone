// Document Objective Model and DataTable script
window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});

const Nav = document.getElementById('collapseExample');
const btn_menu = document.getElementById('btn_menu');

btn_menu.addEventListener('click', () => {
    Nav.classList.toggle('d-none');
    Nav.classList.add('nav_active');
});

if (window.innerWidth < 768) {
    Nav.classList.add('d-none');
}

// Toggle visibility of action buttons
document.addEventListener('DOMContentLoaded', () => {
    const toggleActionsBtn = document.getElementById('toggleActionsBtn');
    if (toggleActionsBtn) {
        toggleActionsBtn.addEventListener('click', () => {
            const actionButtons = document.querySelectorAll('.edit-btn, .delete-btn');
            actionButtons.forEach(button => {
                button.classList.toggle('d-none'); // Add or remove the 'd-none' class to hide/show buttons
            });
        });
    }
});

// JavaScript to show/hide the 'Other Requirement' input and add more fields
function toggleOtherRequirement() {
    const requirements = document.getElementById('requirements');
    const otherDiv = document.getElementById('otherRequirementDiv');
    const addRequirementBtn = document.getElementById('addRequirementBtn');
    const selected = Array.from(requirements.selectedOptions).map(opt => opt.value);

    if (selected.includes("other")) {
        otherDiv.style.display = "block";
        addRequirementBtn.style.display = "inline-block"; // Show the "Add Another Requirement" button
    } else {
        otherDiv.style.display = "none";
        addRequirementBtn.style.display = "none";
        document.getElementById("otherRequirement").value = "";
        document.getElementById("additionalRequirements").innerHTML = ""; // Clear additional fields
    }
}

// Add functionality to dynamically add more "Other Requirement" fields
const addRequirementBtn = document.getElementById('addRequirementBtn');
if (addRequirementBtn) {
    addRequirementBtn.addEventListener('click', () => {
        const additionalRequirements = document.getElementById('additionalRequirements');
        const newField = document.createElement('div');
        newField.classList.add('form-floating', 'mt-2');
        newField.innerHTML = `
            <input type="text" class="form-control" placeholder="Other Requirement">
            <label>Specify Another Requirement</label>
        `;
        additionalRequirements.appendChild(newField);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // Handle Edit Button Click
    document.querySelectorAll('.edit-btn').forEach(editButton => {
        editButton.addEventListener('click', (event) => {
            const row = event.target.closest('tr'); // Get the row of the clicked button
            const courseName = row.querySelector('td:nth-child(1)').textContent; // Get course name
            const availableSlot = row.querySelector('td:nth-child(4)').textContent; // Get available slot

            // Populate the Edit Modal fields
            document.getElementById('editCourseName').value = courseName;
            document.getElementById('editAvailableSlot').value = availableSlot;
        });
    });

    // Handle Delete Button Click
    document.querySelectorAll('.delete-btn').forEach(deleteButton => {
        deleteButton.addEventListener('click', (event) => {
            const row = event.target.closest('tr'); // Get the row of the clicked button
            const courseName = row.querySelector('td:nth-child(1)').textContent; // Get course name

            // Optionally, display the course name in the delete confirmation modal
            const deleteModalBody = document.querySelector('#deleteModal .modal-body');
            deleteModalBody.textContent = `Are you sure you want to delete the course "${courseName}"?`;

            // Handle Confirm Delete
            const confirmDeleteBtn = document.getElementById('confirmDelete');
            if (confirmDeleteBtn) {
                confirmDeleteBtn.addEventListener('click', () => {
                    // Remove the row from the table
                    row.remove();

                    // Hide the Delete Modal
                    const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                    deleteModal.hide();
                }, { once: true }); // Ensure the event listener is only triggered once
            }
        });
    });
});


// Function to toggle the visibility of the "Other Requirement" input in the Edit Modal
function toggleOtherRequirementEdit() {
    const editRequirements = document.getElementById('editRequirements');
    const otherRequirementEditDiv = document.getElementById('otherRequirementEditDiv');
    const selected = Array.from(editRequirements.selectedOptions).map(opt => opt.value);

    if (selected.includes("other")) {
        otherRequirementEditDiv.style.display = "block";
    } else {
        otherRequirementEditDiv.style.display = "none";
        document.getElementById("otherRequirementEdit").value = ""; // Clear the input field
        document.getElementById("additionalRequirementsEdit").innerHTML = ""; // Clear additional fields
    }
}

// Add functionality to dynamically add more "Other Requirement" fields
document.getElementById('addRequirementEditBtn').addEventListener('click', () => {
    const additionalRequirementsEdit = document.getElementById('additionalRequirementsEdit');
    const newField = document.createElement('div');
    newField.classList.add('form-floating', 'mt-2');
    newField.innerHTML = `
        <input type="text" class="form-control" placeholder="Additional Requirement">
        <label>Specify Another Requirement</label>
    `;
    additionalRequirementsEdit.appendChild(newField);
});