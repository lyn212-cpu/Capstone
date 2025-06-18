<?php
include '../Backend/connect.php';
session_start();

$error = "";

$school_number = trim($_POST['school_number'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($school_number && $password) {
        $stmt = $conn->prepare("SELECT user_id, password, role FROM users WHERE school_number = ?");
        $stmt->bind_param("s", $school_number);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($user_id, $hashed_password, $role);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['role'] = $role;

                switch ($school_number) {
                    case 'superadmin':
                        header("Location: ../Admin/super_admin/Dashboard.php");
                        break;
                    case 'staffadmin':
                        header("Location: ../Admin/admin/Dashboard.php");
                        break;
                    case 'centeradmin':
                        header("Location: ../Admin/center_admin/Courses.php");
                        break;
                    default:
                        header("Location: index.php");
                        break;
                }
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NC Finder - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-cover bg-center flex items-center justify-center"
    style="background-image: url('background1.jpg');">
    <div class="bg-indigo-900 bg-opacity-90 p-8 rounded-2xl shadow-2xl max-w-sm w-full text-white">
        <div class="flex flex-col items-center mb-6">
            <img src="white logo.png" alt="NC Finder Logo" class="h-16 mb-2" />
            <h2 class="text-lg font-semibold mb-4">Enter Your Account</h2>

            <?php if ($error): ?>
                <div id="errorMessage"
                    class="bg-red-500 text-white p-2 rounded mb-4 w-full text-center transition-opacity duration-500 opacity-100">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form class="space-y-4" method="POST" action="">
                <!-- Student Number -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="10 0 20 20"
                        class="h-5 w-10 text-black mr-2">
                        <path fill-rule="evenodd"
                            d="M11.097 1.515a.75.75 0 0 1 .589.882L10.666 7.5h4.47l1.079-5.397a.75.75 0 1 1 1.47.294L16.665 7.5h3.585a.75.75 0 0 1 0 1.5h-3.885l-1.2 6h3.585a.75.75 0 0 1 0 1.5h-3.885l-1.08 5.397a.75.75 0 1 1-1.47-.294l1.02-5.103h-4.47l-1.08 5.397a.75.75 0 1 1-1.47-.294l1.02-5.103H3.75a.75.75 0 0 1 0-1.5h3.885l1.2-6H5.25a.75.75 0 0 1 0-1.5h3.885l1.08-5.397a.75.75 0 0 1 .882-.588ZM10.365 9l-1.2 6h4.47l1.2-6h-4.47Z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="school_number" placeholder="2022-12345-MN-0"
                        class="w-full text-black focus:outline-none" required autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                        class="h-5 w-5 text-black mr-2">
                        <path
                            d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-6V9a6 6 0 00-12 0v2H4v10h16V11h-2zm-8-2a4 4 0 118 0v2H10V9z" />
                    </svg>
                    <input type="password" name="password" id="signInPassword" placeholder="Password"
                        class="w-full text-black focus:outline-none pr-10" required />
                    <button type="button" id="signInTogglePassword" class="absolute right-3">
                        <svg id="signInEyeSlash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="h-5 w-5 text-black">
                            <path
                                d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                            <path
                                d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                            <path
                                d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                        </svg>
                        <svg id="signInEyeOpen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="h-5 w-5 text-black hidden">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <button type="submit"
                    class="w-full bg-sky-400 hover:bg-sky-500 text-white py-2 rounded-lg font-semibold">
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

        <!-- JavaScript -->
        <script>
            // Eye toggle logic
            const signInPassword = document.getElementById("signInPassword");
            const signInToggle = document.getElementById("signInTogglePassword");
            const eyeOpen = document.getElementById("signInEyeOpen");
            const eyeSlash = document.getElementById("signInEyeSlash");

            signInToggle.addEventListener("click", () => {
                const isHidden = signInPassword.type === "password";
                signInPassword.type = isHidden ? "text" : "password";
                eyeOpen.classList.toggle("hidden", !isHidden);
                eyeSlash.classList.toggle("hidden", isHidden);
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

            document.querySelector('form').addEventListener('submit', function(e) {
                if (!mainTermsCheckbox.checked) {
                    e.preventDefault();
                    alert('You must agree to the Terms and Conditions before logging in.');
                }
            });

            // Fade out error message after 2 seconds
            window.addEventListener("DOMContentLoaded", () => {
                const errorBox = document.getElementById("errorMessage");
                if (errorBox) {
                    setTimeout(() => {
                        errorBox.style.opacity = "0";
                        setTimeout(() => errorBox.remove(), 500);
                    }, 2000);
                }
            });
        </script>
</body>

</html>