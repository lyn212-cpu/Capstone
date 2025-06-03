// Document Objective Model and DataTable script
window.addEventListener("DOMContentLoaded", (event) => {
  const datatablesSimple = document.getElementById("datatablesSimple");
  if (datatablesSimple) {
    new simpleDatatables.DataTable(datatablesSimple);
  }
});

const Nav = document.getElementById("collapseExample");
const btn_menu = document.getElementById("btn_menu");

btn_menu.addEventListener("click", () => {
  Nav.classList.toggle("d-none");
  Nav.classList.add("nav_active");
});

if (window.innerWidth < 768) {
  Nav.classList.add("d-none");
}

// Toggle visibility of action buttons
document.addEventListener("DOMContentLoaded", () => {
  const toggleActionsBtn = document.getElementById("toggleActionsBtn");
  if (toggleActionsBtn) {
    toggleActionsBtn.addEventListener("click", () => {
      const actionButtons = document.querySelectorAll(".edit-btn, .delete-btn");
      actionButtons.forEach((button) => {
        button.classList.toggle("d-none"); // Add or remove the 'd-none' class to hide/show buttons
      });
    });
  }
});

// JavaScript to show/hide the 'Other Requirement' input and add more fields
function toggleOtherRequirement() {
  const requirements = document.getElementById("requirements");
  const otherDiv = document.getElementById("otherRequirementDiv");
  const addRequirementBtn = document.getElementById("addRequirementBtn");
  const selected = Array.from(requirements.selectedOptions).map(
    (opt) => opt.value
  );

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
const addRequirementBtn = document.getElementById("addRequirementBtn");
if (addRequirementBtn) {
  addRequirementBtn.addEventListener("click", () => {
    const additionalRequirements = document.getElementById(
      "additionalRequirements"
    );
    const newField = document.createElement("div");
    newField.classList.add("form-floating", "mt-2");
    newField.innerHTML = `
            <input type="text" class="form-control" placeholder="Other Requirement">
            <label>Specify Another Requirement</label>
        `;
    additionalRequirements.appendChild(newField);
  });
}

// Function to toggle the visibility of the "Other Requirement" input in the Edit Modal
function toggleOtherRequirementEdit() {
  const editRequirements = document.getElementById("editRequirements");
  const otherRequirementEditDiv = document.getElementById(
    "otherRequirementEditDiv"
  );
  const selected = Array.from(editRequirements.selectedOptions).map(
    (opt) => opt.value
  );

  if (selected.includes("other")) {
    otherRequirementEditDiv.style.display = "block";
  } else {
    otherRequirementEditDiv.style.display = "none";
    document.getElementById("otherRequirementEdit").value = ""; // Clear the input field
    document.getElementById("additionalRequirementsEdit").innerHTML = ""; // Clear additional fields
  }
}

// Add functionality to dynamically add more "Other Requirement" fields
document
  .getElementById("addRequirementEditBtn")
  .addEventListener("click", () => {
    const additionalRequirementsEdit = document.getElementById(
      "additionalRequirementsEdit"
    );
    const newField = document.createElement("div");
    newField.classList.add("form-floating", "mt-2");
    newField.innerHTML = `
        <input type="text" class="form-control" placeholder="Additional Requirement">
        <label>Specify Another Requirement</label>
    `;
    additionalRequirementsEdit.appendChild(newField);
  });

document.addEventListener("DOMContentLoaded", function () {
  // Edit button click
  document.querySelectorAll(".edit-btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      document.getElementById("editCourseId").value =
        btn.getAttribute("data-course_id");
      document.getElementById("editCourseName").value =
        btn.getAttribute("data-course_name");
      document.getElementById("editTrainingCenterName").value =
        btn.getAttribute("data-training_center_name");
      document.getElementById("editDuration").value =
        btn.getAttribute("data-duration");
      document.getElementById("editSlotsAvailable").value = btn.getAttribute(
        "data-slots_available"
      );
      document.getElementById("editLocation").value =
        btn.getAttribute("data-location");
      document.getElementById("editContactInfo").value =
        btn.getAttribute("data-contact_info");
      document.getElementById("editCourseDescription").value = btn.getAttribute(
        "data-course_description"
      );
      document.getElementById("editRequirements").value =
        btn.getAttribute("data-requirements");
      var editModal = new bootstrap.Modal(document.getElementById("editModal"));
      editModal.show();
    });
  });

  // Edit form submit
  document.getElementById("editForm").addEventListener("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    fetch("editCourse.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        alert(data.message);
        if (data.success) location.reload();
      });
  });

  // Delete button click
  let courseIdToDelete = null;
  document.querySelectorAll(".delete-btn").forEach(function (btn) {
    btn.addEventListener("click", function () {
      courseIdToDelete = btn
        .closest("tr")
        .querySelector(".edit-btn")
        .getAttribute("data-course_id");
      var deleteModal = new bootstrap.Modal(
        document.getElementById("deleteModal")
      );
      deleteModal.show();
    });
  });

  // Confirm delete
  document
    .getElementById("confirmDelete")
    .addEventListener("click", function () {
      if (!courseIdToDelete) return;
      fetch("deleteCourse.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "course_id=" + encodeURIComponent(courseIdToDelete),
      })
        .then((res) => res.json())
        .then((data) => {
          alert(data.message);
          if (data.success) location.reload();
        });
    });
});

// Toggle Actions Button
document
  .getElementById("toggleActionsBtn")
  .addEventListener("click", function () {
    document
      .getElementById("datatablesSimple")
      .classList.toggle("actions-hidden");
  });
