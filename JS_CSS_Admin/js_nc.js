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

    // Toggle visibility of delete buttons
    const toggleActionsBtn = document.getElementById('toggleActionsBtn');
    if (toggleActionsBtn) {
        toggleActionsBtn.addEventListener('click', () => {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => button.classList.toggle('d-none'));
        });
    }

    // Delete logic
    let certificateIdToDelete = null;
    document.querySelectorAll('.delete-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            certificateIdToDelete = btn.getAttribute('data-certificate_id');
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        });
    });

    // Confirm delete
    const confirmDeleteBtn = document.getElementById('confirmDelete');
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', function () {
            if (!certificateIdToDelete) return;
            fetch('deleteNC.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'certificate_id=' + encodeURIComponent(certificateIdToDelete),
            })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) location.reload();
                })
                .catch(() => alert('An error occurred.'));
        });
    }
});