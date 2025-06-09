window.addEventListener("DOMContentLoaded", (event) => {
  const datatablesSimple = document.getElementById("datatablesSimple");
  if (datatablesSimple) {
    new simpleDatatables.DataTable(datatablesSimple, {
      columns: [
        { select: 0, sortable: false }, // Disable sorting on checkbox column
      ],
      searchable: true, // Enable search bar
      fixedHeight: true, // Optional: for visual consistency
    });
  }
});

// Sidebar toggle logic
const Nav = document.getElementById("collapseExample");
const btn_menu = document.getElementById("btn_menu");

btn_menu.addEventListener("click", () => {
  Nav.classList.toggle("d-none");
  Nav.classList.add("nav_active");
});

if (window.innerWidth < 768) {
  Nav.classList.add("d-none");
}

// Delete button notification
function confirmDelete() {
  return confirm("Are you sure you want to delete the selected user(s)?");
}
