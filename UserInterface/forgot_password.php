<?php
include '../Backend/connect.php';
session_start();

$message = "";
$error = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $isResend = isset($_POST['resend']);

    if (!empty($email)) {
        // Check if email exists in the database
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            // Simulate sending/resetting email
            $message = $isResend ? "A new reset link has been sent to your email." : "A reset link has been sent to your email.";
        } else {
            $error = "Email not found in our records.";
        }

        $stmt->close();
    } else {
        $error = "Please enter your email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NC Finder - Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('background.jpg');">
    <div class="bg-indigo-900 bg-opacity-90 p-8 rounded-2xl shadow-2xl max-w-sm w-full text-white">
        <div class="flex flex-col items-center mb-6">
            <img src="white logo.png" alt="NC Finder Logo" class="h-16 mb-2" />
            <h2 class="text-lg font-semibold mb-4 text-center">Forgot Your Password?</h2>

            <?php if ($message): ?>
                <div class="bg-green-500 text-white p-2 rounded mb-4 w-full text-center"><?= htmlspecialchars($message) ?></div>
            <?php elseif ($error): ?>
                <div class="bg-red-500 text-white p-2 rounded mb-4 w-full text-center"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form class="space-y-4 w-full" method="POST" action="">
                <!-- Email Field -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="h-5 w-10 text-black mr-2">
                        <path d="M2 4a2 2 0 012-2h12a2 2 0 012 2v.217l-8 5.333-8-5.333V4zm0 2.383l7.555 5.037a1 1 0 001.11 0L18 6.383V16a2 2 0 01-2 2H4a2 2 0 01-2-2V6.383z" />
                    </svg>
                    <input type="email" name="email" placeholder="Enter your registered email" value="<?= htmlspecialchars($email) ?>" class="w-full text-black focus:outline-none" required />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-sky-400 hover:bg-sky-500 text-white py-2 rounded-lg font-semibold">
                    Send Reset Link
                </button>
            </form>

            <div class="text-center text-sm mt-4">
                <a href="sign_in.php" class="text-sky-400 hover:underline block">Back to Login</a>

                <!-- Show Resend Option Only If Reset Was Sent -->
                <?php if (!empty($email) && $message): ?>
                    <form method="POST" class="mt-2">
                        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
                        <input type="hidden" name="resend" value="1">
                        <button type="submit" class="text-sky-300 hover:underline text-sm">
                            Didn't get the link? <span class="underline">Resend it</span>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
