// Toggle password visibility and icons
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordInput');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeSlash = document.getElementById('eyeSlash');

    if (passwordInput.type === 'password') {
        // Show password
        passwordInput.type = 'text';
        eyeOpen.classList.remove('hidden');    // Show open eye
        eyeSlash.classList.add('hidden');      // Hide slashed eye
    } else {
        // Hide password
        passwordInput.type = 'password';
        eyeOpen.classList.add('hidden');       // Hide open eye
        eyeSlash.classList.remove('hidden');   // Show slashed eye
    }
}

// Attach event listener
document.getElementById('togglePassword').addEventListener('click', togglePasswordVisibility);
