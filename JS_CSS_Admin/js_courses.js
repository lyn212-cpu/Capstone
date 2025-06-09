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
});

function approveCourse(courseName) {
  if (
    confirm("Are you sure you want to approve this course: " + courseName + "?")
  ) {
    window.location.href =
      "updateCourseStatus.php?course_name=" +
      encodeURIComponent(courseName) +
      "&status=approved";
  }
}

function disapproveCourse(courseName) {
  if (
    confirm(
      "Are you sure you want to **remove** this course from the database?"
    )
  ) {
    window.location.href =
      "deleteCourse.php?course_name=" + encodeURIComponent(courseName);
  }
}
