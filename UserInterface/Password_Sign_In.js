// Toggle password visibility and icons
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordInput');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeSlash = document.getElementById('eyeSlash');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeSlash.classList.remove('hidden');
    } else {
        passwordInput.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeSlash.classList.add('hidden');
    }
}

// Attach event listener
document.getElementById('togglePassword').addEventListener('click', togglePasswordVisibility);
