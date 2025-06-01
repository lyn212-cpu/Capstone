<?php
include '../Backend/connect.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $school_number = $_POST['school_number'] ?? '';
    $password = $_POST['password'] ?? '';

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
    <title>Nc Finder - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-cover bg-center flex items-center justify-center"
    style="background-image: url('background.jpg');">
    <div class="bg-indigo-900 bg-opacity-90 p-8 rounded-2xl shadow-2xl max-w-sm w-full text-white">
        <div class="flex flex-col items-center mb-6">
            <img src="white logo.png" alt="NC Finder Logo" class="h-16 mb-2" />
            <h2 class="text-lg font-semibold mb-4">Enter Your Account</h2>

            <?php if ($error): ?>
                <div class="bg-red-500 text-white p-2 rounded mb-2 w-full text-center"><?= $error ?></div>
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
                        class="w-full text-black focus:outline-none" required />
                </div>

                <!-- Password -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="10 0 20 20" fill="currentColor"
                        class="h-5 w-10 text-black mr-2">
                        <path fill-rule="evenodd"
                            d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="password" name="password" id="passwordInput" placeholder="Enter Password"
                        class="w-full text-black focus:outline-none" required />

                    <button type="button" id="togglePassword" class="absolute right-3">
                        <!-- Eye Icon (show password) -->
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 text-black">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <!-- Eye Slash Icon (hide password) -->
                        <svg id="eyeSlash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 hidden text-black">
                            <path
                                d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                            <path
                                d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                            <path
                                d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                        </svg>
                    </button>
                </div>

                <!-- Sign In Button -->
                <button type="submit"
                    class="w-full bg-sky-400 hover:bg-sky-500 text-white py-2 rounded-lg font-semibold">
                    Sign In
                </button>
            </form>

            <script src="Password_Sign_In.js"></script>

            <!-- Links -->
            <div class="text-center text-sm mt-4">
                <p class="text-gray-300">
                    Doesn't have an account?
                    <a href="Sign_Up.php" class="text-sky-400 hover:underline">Sign Up</a>
                </p>
                <p class="mt-1">
                    <a href="#" class="text-sky-400 hover:underline">Forgot your Password?</a>
                </p>
                <div class="mt-3 flex items-center justify-center space-x-2">
                    <input type="checkbox" id="terms" class="accent-sky-400">
                    <label for="terms" class="text-gray-300">Terms of Service</label>
                </div>
            </div>
        </div>
</body>

</html>