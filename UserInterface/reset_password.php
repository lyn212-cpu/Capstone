<?php
include '../Backend/connect.php';
session_start();

$message = "";
$error = "";
$showSuccessBelowLogin = false;

$user_id = $_GET['user'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'] ?? null;
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if (!empty($password) && !empty($confirm)) {
        if ($password === $confirm) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
            $stmt->bind_param("si", $hashed, $user_id);
            if ($stmt->execute()) {
                $message = "Password has been reset successfully.";
                $showSuccessBelowLogin = true;
            } else {
                $error = "Failed to update password. Try again.";
            }
            $stmt->close();
        } else {
            $error = "Passwords do not match.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NC Finder - Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('background.jpg');">
    <div class="bg-indigo-900 bg-opacity-90 p-8 rounded-2xl shadow-2xl max-w-sm w-full text-white">
        <div class="flex flex-col items-center mb-6">
            <img src="white logo.png" alt="NC Finder Logo" class="h-16 mb-2" />
            <h2 class="text-lg font-semibold mb-4 text-center">Reset Your Password</h2>

            <?php if (!$showSuccessBelowLogin && $error): ?>
                <div class="bg-red-500 text-white p-2 rounded mb-4 w-full text-center"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form class="space-y-4 w-full" method="POST" action="">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">

                <!-- New Password Field -->
                <div class="relative flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-5 w-5 text-black mr-2">
                        <path d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-6V9a6 6 0 00-12 0v2H4v10h16V11h-2zm-8-2a4 4 0 118 0v2H10V9z"/>
                    </svg>
                    <input type="password" id="password" name="password" placeholder="New Password" class="w-full text-black focus:outline-none pr-8" required />
                    <button type="button" class="absolute right-2" onclick="togglePassword('password', 'eye1')">
                        <svg id="eye1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

                <!-- Confirm Password Field -->
                <div class="relative flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-5 w-5 text-black mr-2">
                        <path d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-6V9a6 6 0 00-12 0v2H4v10h16V11h-2zm-8-2a4 4 0 118 0v2H10V9z"/>
                    </svg>
                    <input type="password" id="confirm" name="confirm" placeholder="Confirm Password" class="w-full text-black focus:outline-none pr-8" required />
                    <button type="button" class="absolute right-2" onclick="togglePassword('confirm', 'eye2')">
                        <svg id="eye2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-sky-400 hover:bg-sky-500 text-white py-2 rounded-lg font-semibold">
                    Reset Password
                </button>

                <div class="text-center text-sm mt-4">
                    <a href="sign_ins.php" class="text-sky-400 hover:underline">Back to Login</a>

                    <?php if ($showSuccessBelowLogin): ?>
                        <div class="bg-green-500 text-white mt-2 p-2 rounded text-center text-sm">
                            <?= htmlspecialchars($message) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Toggle Password Script -->
    <script>
    function togglePassword(fieldId, iconId) {
        const input = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);

        const isVisible = input.type === "text";
        input.type = isVisible ? "password" : "text";

        icon.innerHTML = isVisible
            ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M13.875 18.825A10.05 10.05 0 0112 19
                     c-5.523 0-10-5.373-10-7s4.477-7 10-7
                     c1.176 0 2.296.24 3.324.675
                     m3.351 2.349A9.964 9.964 0 0122 12
                     c0 1.627-4.477 7-10 7a9.953 9.953 0 01-4.901-1.274
                     M15 12a3 3 0 11-6 0 3 3 0 016 0z" />`
            : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M15 12a3 3 0 11-6 0 3 3 0 016 0z
                     M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7
                     c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />`;
    }
    </script>
</body>
</html>
