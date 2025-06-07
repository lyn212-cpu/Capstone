document.addEventListener("DOMContentLoaded", function () {
  // DataTable
  const datatablesSimple = document.getElementById("datatablesSimple");
  if (datatablesSimple) {
    new simpleDatatables.DataTable(datatablesSimple);
  }

  // Sidebar toggle
  const Nav = document.getElementById("collapseExample");
  const btn_menu = document.getElementById("btn_menu");
  if (btn_menu && Nav) {
    btn_menu.addEventListener("click", () => {
      Nav.classList.toggle("d-none");
      Nav.classList.add("nav_active");
    });
    if (window.innerWidth < 768) {
      Nav.classList.add("d-none");
    }
  }

  // Toggle Actions Button
  const toggleActionsBtn = document.getElementById("toggleActionsBtn");
  if (toggleActionsBtn) {
    toggleActionsBtn.addEventListener("click", () => {
      const actionButtons = document.querySelectorAll(".edit-btn, .delete-btn");
      actionButtons.forEach((button) => {
        button.classList.toggle("d-none");
      });
    });
  }

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
      })
      .catch(() => alert("An error occurred."));
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
        })
        .catch(() => alert("An error occurred."));
    });
});

document.addEventListener("DOMContentLoaded", function () {
  const datatablesSimple = document.getElementById("datatablesSimple");
  let dataTable;
  if (datatablesSimple) {
    dataTable = new simpleDatatables.DataTable(datatablesSimple, {
      searchable: false, // because we're using custom search
    });
  }

  const searchInput = document.getElementById("searchInput");
  if (searchInput && dataTable) {
    searchInput.addEventListener("input", function () {
      const value = searchInput.value.trim().toLowerCase();
      if (value === "") {
        // Reset to show all records
        dataTable.search(""); // This resets the filter
      } else {
        dataTable.search(value);
      }
    });
  }
});
