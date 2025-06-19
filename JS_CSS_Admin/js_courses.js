document.addEventListener("DOMContentLoaded", function () {
  // ✅ Initialize DataTable with custom options
  const table = document.getElementById("datatablesSimple");
  if (table) {
    new simpleDatatables.DataTable(table, {
      searchable: true,
      sortable: true,
      fixedHeight: true,
      perPage: 10,
      perPageSelect: [5, 10, 25, 50, -1],
      labels: {
        placeholder: "Search...",
        perPage: "{select} entries per page",
        noRows: "No courses found",
        info: "Showing {start} to {end} of {rows} courses",
      },
      columns: [
        {},
        {},
        {},
        {},
        {},
        {},
        {},
        {},
        {},
        { sortable: false }, // disable for last column
      ],
    });
  }

  // ✅ Sidebar toggle
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
});

// ✅ Approve course
function approveCourse(courseId) {
  if (confirm("Are you sure you want to approve this course?")) {
    window.location.href =
      "updateCourseStatus.php?course_id=" +
      encodeURIComponent(courseId) +
      "&status=approved";
  }
}

// ✅ Disapprove course
function disapproveCourse(courseId) {
  if (confirm("Are you sure you want to **disapprove** this post?")) {
    window.location.href =
      "deleteCourse.php?course_id=" + encodeURIComponent(courseId);
  }
}
