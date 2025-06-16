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
