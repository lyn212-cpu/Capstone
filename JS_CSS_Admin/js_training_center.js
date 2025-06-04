document.addEventListener('DOMContentLoaded', function () {
    // DataTable initialization
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    // Sidebar menu toggle
    const Nav = document.getElementById('collapseExample');
    const btn_menu = document.getElementById('btn_menu');
    if (btn_menu && Nav) {
        btn_menu.addEventListener('click', () => {
            Nav.classList.toggle('d-none');
            Nav.classList.add('nav_active');
        });

        if (window.innerWidth < 768) {
            Nav.classList.add('d-none');
        }
    }

    // Toggle visibility of action buttons
    const toggleActionsBtn = document.getElementById('toggleActionsBtn');
    if (toggleActionsBtn) {
        toggleActionsBtn.addEventListener('click', () => {
            const actionButtons = document.querySelectorAll('.edit-btn, .delete-btn');
            actionButtons.forEach(button => {
                button.classList.toggle('d-none');
            });
        });
    }

    // Show/hide the 'Other Requirement' input and add more fields (Add Modal)
    window.toggleOtherRequirement = function () {
        const requirements = document.getElementById('requirements');
        const otherDiv = document.getElementById('otherRequirementDiv');
        const addRequirementBtn = document.getElementById('addRequirementBtn');
        const selected = Array.from(requirements.selectedOptions).map(opt => opt.value);

        if (selected.includes("other")) {
            otherDiv.style.display = "block";
            addRequirementBtn.style.display = "inline-block";
        } else {
            otherDiv.style.display = "none";
            addRequirementBtn.style.display = "none";
            document.getElementById("otherRequirement").value = "";
            document.getElementById("additionalRequirements").innerHTML = "";
        }
    };

    // Add functionality to dynamically add more "Other Requirement" fields (Add Modal)
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

    // Edit button click
    document.querySelectorAll(".edit-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
            document.getElementById("editCenterId").value = btn.getAttribute("data-center_id");
            document.getElementById("editCenterName").value = btn.getAttribute("data-center_name");
            document.getElementById("editLocation").value = btn.getAttribute("data-location");
            document.getElementById("editContactInfo").value = btn.getAttribute("data-contact_info");
            document.getElementById("editRequirements").value = btn.getAttribute("data-requirements");
            document.getElementById("editOperationHours").value = btn.getAttribute("data-operation_hours");
            document.getElementById("editAvailableCoursesInput").value = btn.getAttribute("data-available_courses");
            document.getElementById("editStudentSlot").value = btn.getAttribute("data-student_slot");
            var editModal = new bootstrap.Modal(document.getElementById("editModal"));
            editModal.show();
        });
    });

    // Edit form submit
    const editForm = document.getElementById("editForm");
    if (editForm) {
        editForm.addEventListener("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            fetch("editTrainingCenter.php", {
                method: "POST",
                body: formData,
            })
                .then((res) => res.json())
                .then((data) => {
                    alert(data.message);
                    if (data.success) location.reload();
                })
                .catch(() => alert("An error occurred."));
        });
    }

    // Delete button click
    let centerIdToDelete = null;
    document.querySelectorAll(".delete-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
            centerIdToDelete = btn.closest("tr").querySelector(".edit-btn").getAttribute("data-center_id");
            var deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
            deleteModal.show();
        });
    });

    // Confirm delete
    const confirmDeleteBtn = document.getElementById("confirmDelete");
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener("click", function () {
            if (!centerIdToDelete) return;
            fetch("deleteTrainingCenter.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "center_id=" + encodeURIComponent(centerIdToDelete),
            })
                .then((res) => res.json())
                .then((data) => {
                    alert(data.message);
                    if (data.success) location.reload();
                })
                .catch(() => alert("An error occurred."));
        });
    }

    // Add Center form submit (Add Modal)
    const addCenterForm = document.getElementById("addCenterForm");
    if (addCenterForm) {
        addCenterForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch("addTrainingCenter.php", {
                method: "POST",
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) location.reload();
                })
                .catch(() => alert("An error occurred."));
        });
    }
});