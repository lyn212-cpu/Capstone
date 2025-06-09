<?php
include '../Backend/connect.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $school_number = $_POST['school_number'] ?? '';
    $password = $_POST['password'] ?? '';

    // Hardcoded super admin check
    if ($school_number === '0000-11111-MN-0' && $password === '123456') {
        $_SESSION['user_id'] = 'super_admin';
        header("Location: ../Admin/super_admin/Dashboard.php");
        exit;
    }

    if ($school_number && $password) {
        $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE school_number = ?");
        $stmt->bind_param("s", $school_number);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                header("Location: index.php");
                exit;
            } else {
                $error = "Invalid school number or password.";
            }
        } else {
            $error = "Invalid school number or password.";
        }
        $stmt->close();
    } else {
        $error = "Please enter both school number and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NC Finder - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('background.jpg');">
    <div class="bg-indigo-900 bg-opacity-90 p-8 rounded-2xl shadow-2xl max-w-sm w-full text-white">
        <div class="flex flex-col items-center mb-6">
            <img src="white logo.png" alt="NC Finder Logo" class="h-16 mb-2" />
            <h2 class="text-lg font-semibold mb-4">Enter Your Account</h2>

            <?php if ($error): ?>
                <div class="bg-red-500 text-white p-2 rounded mb-4 w-full text-center"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form class="space-y-4" method="POST" action="">
                <!-- Student Number -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="10 0 20 20" class="h-5 w-10 text-black mr-2">
                        <path fill-rule="evenodd" d="M11.097 1.515a.75.75 0 0 1 .589.882L10.666 7.5h4.47l1.079-5.397a.75.75 0 1 1 1.47.294L16.665 7.5h3.585a.75.75 0 0 1 0 1.5h-3.885l-1.2 6h3.585a.75.75 0 0 1 0 1.5h-3.885l-1.08 5.397a.75.75 0 1 1-1.47-.294l1.02-5.103h-4.47l-1.08 5.397a.75.75 0 1 1-1.47-.294l1.02-5.103H3.75a.75.75 0 0 1 0-1.5h3.885l1.2-6H5.25a.75.75 0 0 1 0-1.5h3.885l1.08-5.397a.75.75 0 0 1 .882-.588ZM10.365 9l-1.2 6h4.47l1.2-6h-4.47Z" clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="school_number" placeholder="2022-12345-MN-0" class="w-full text-black focus:outline-none" required autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2 relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-5 w-5 text-black mr-2">
                    <path d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-6V9a6 6 0 00-12 0v2H4v10h16V11h-2zm-8-2a4 4 0 118 0v2H10V9z" />
                </svg>
                <input type="password" name="password" id="password" placeholder="Password" class="w-full text-black focus:outline-none pr-10" required>

                <!-- Eye toggle button -->
                <button type="button" id="togglePassword" class="absolute right-3 focus:outline-none">
                    <!-- Start with closed eye (hidden password) -->
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19
                            c-5.523 0-10-5.373-10-7s4.477-7 10-7
                            c1.176 0 2.296.24 3.324.675
                            m3.351 2.349A9.964 9.964 0 0122 12
                            c0 1.627-4.477 7-10 7a9.953 9.953 0 01-4.901-1.274
                            M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>

                <button type="submit" class="w-full bg-sky-400 hover:bg-sky-500 text-white py-2 rounded-lg font-semibold">
                    Sign In
                </button>
            </form>

            <!-- Links -->
            <div class="text-center text-sm mt-4">
                <p class="text-gray-300">
                    Don't have an account?
                    <a href="Sign_Up.php" class="text-sky-400 hover:underline">Sign Up</a>
                </p>
                <p class="mt-1">
                    <a href="forgot_password.php" class="text-sky-400 hover:underline">Forgot your Password?</a>
                </p>
                <div class="mt-2">
                    <input type="checkbox" id="mainTermsCheckbox" name="terms" required>
                    <label for="mainTermsCheckbox" class="text-xs">
                        I agree to the 
                        <button type="button" id="openTerms" class="text-blue-400 underline">Terms and Conditions</button>
                    </label>
                </div>
            </div>
        </div>

    <!-- Modal -->
    <div id="termsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative text-black">
                <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl font-bold">&times;</button>
                <h3 class="text-lg font-bold mb-4 text-center text-indigo-900">Terms and Conditions</h3>
                <div class="overflow-y-auto max-h-60 text-sm text-gray-700 space-y-2">
                    <p>Welcome to NC Finder. By signing in, you agree to the following terms and conditions:</p>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>Your login credentials are confidential and must not be shared.</li>
                        <li>You are responsible for all activity under your account.</li>
                        <li>Do not use the system for illegal or harmful activities.</li>
                        <li>We may collect anonymous usage data to improve the service.</li>
                        <li>Violation of terms may result in account suspension.</li>
                    </ul>
                    <p>Thank you for using NC Finder responsibly!</p>
                </div>
                <div class="mt-4 text-right">
                    <button onclick="closeModal()" class="bg-sky-400 hover:bg-sky-500 text-white px-4 py-2 rounded-md">Close</button>
                </div>
            </div>
        </div>

    <!-- JavaScript -->
    <script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    let isVisible = false;

    togglePassword.addEventListener('click', () => {
        isVisible = !isVisible;

        if (isVisible) {
            passwordInput.type = 'text';
            // Eye Open Icon (👁️)
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z
                    M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7
                    c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />
            `;
        } else {
            passwordInput.type = 'password';
            // Eye Closed/Slashed Icon (🙈)
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19
                    c-5.523 0-10-5.373-10-7s4.477-7 10-7
                    c1.176 0 2.296.24 3.324.675
                    m3.351 2.349A9.964 9.964 0 0122 12
                    c0 1.627-4.477 7-10 7a9.953 9.953 0 01-4.901-1.274
                    M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            `;
        }
    });

    // Terms Modal
    const openTerms = document.getElementById('openTerms');
    const termsModal = document.getElementById('termsModal');
    const mainTermsCheckbox = document.getElementById('mainTermsCheckbox');

    openTerms.addEventListener('click', () => {
        termsModal.classList.remove('hidden');
        termsModal.classList.add('flex');
    });

    function closeModal() {
        termsModal.classList.add('hidden');
        termsModal.classList.remove('flex');
    }
    document.querySelector('form').addEventListener('submit', function (e) {
        const checkbox = document.getElementById('mainTermsCheckbox');
        if (!checkbox.checked) {
            e.preventDefault(); // Stop form submission
            alert('You must agree to the Terms and Conditions before logging in.');
        }
    });

</script>

</body>
</html>
