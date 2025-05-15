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

document.getElementById('toggleActionsBtn').addEventListener('click', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    // Toggle the 'd-none' class to show/hide buttons
    deleteButtons.forEach(button => button.classList.toggle('d-none'));
});