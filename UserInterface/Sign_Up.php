<?php
include '../Backend/connect.php';
session_start();

$success = ""; // For success messages
$error = "";   // For error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data safely
    $school_number = $_POST['school_number'] ?? '';
    $full_name = $_POST['full_name'] ?? '';
    $course = $_POST['course'] ?? '';
    $year_level = $_POST['year_level'] ?? '';
    $password = $_POST['password'] ?? '';

    $pattern = '/^20\d{2}-\d{5}-MN-\d$/';

    if (!preg_match($pattern, $school_number)) {
        $error = "Invalid school number format. Use: 20XX-12345-MN-X";
    } elseif ($school_number && $full_name && $course && $year_level && $password) {
        // ✅ Step 1: Check if school number already exists
        $checkStmt = $conn->prepare("SELECT user_id FROM users WHERE school_number = ?");
        $checkStmt->bind_param("s", $school_number);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $error = "School number already exists.";
        } else {
            // ✅ Step 2: Proceed to insert
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'Student';
            $stmt = $conn->prepare("INSERT INTO users (school_number, full_name, course, year_level, password, role) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $school_number, $full_name, $course, $year_level, $hashed_password, $role);

            if ($stmt->execute()) {
                $success = "Account created successfully!";
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }

        $checkStmt->close();
    } else {
        $error = "All fields are required.";
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

            <h2 class="text-lg font-semibold mb-4">Enter Your Information</h2>

            <?php if ($success): ?>
                <div id="successMsg" class="bg-green-500 text-white p-2 rounded mb-2 w-full text-center">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div id="errorMsg" class="bg-red-500 text-white p-2 rounded mb-2 w-full text-center">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <script>
                setTimeout(function () {
                    var success = document.getElementById('successMsg');
                    var error = document.getElementById('errorMsg');
                    if (success) success.style.display = 'none';
                    if (error) error.style.display = 'none';
                }, 3000); // hide after 3 seconds
            </script>

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

                <!-- Username -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="10 0 20 20"
                        class="h-5 w-10 text-black mr-2">
                        <path fill-rule="evenodd"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="full_name" placeholder="Juan Dela Cruz"
                        class="w-full text-black focus:outline-none" required />
                </div>

                <!-- Course -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="8 0 20 20" fill="currentColor"
                        class="h-5 w-10 text-black mr-2">
                        <path fill-rule="evenodd"
                            d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                    <select class="w-full text-black focus:outline-none bg-white" name="course" required>
                        <option disabled selected>Select Course</option>
                        <option>Diploma in Information Technology</option>
                        <option>Diploma in Computer Engineering Technology</option>
                        <option>Diploma in Office Management Technology</option>
                        <option>Diploma in Electronics Engineering Technology</option>
                        <option>Diploma in Electrical Technology</option>
                        <option>Diploma in Mechanical Engineering Technology</option>
                        <option>Diploma in Civil Engineering Technology</option>
                        <option>Diploma in Railway Engineering Technology</option>
                    </select>
                </div>

                <!-- Year Level / Course Selection Dropdown -->
                <div class="flex items-center bg-white rounded-lg px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="10 0 20 20" fill="currentColor"
                        class="h-5 w-10 text-black mr-2">
                        <path
                            d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z"
                            clip-rule="evenodd" />
                    </svg>

                    <select class="w-full text-black focus:outline-none bg-white" name="year_level" required>
                        <option disabled selected>Select Year Level</option>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                    </select>
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
                        <!-- Eye Slash Icon (password hidden, click to show) -->
                        <svg id="eyeSlash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 text-black">
                            <path
                                d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                            <path
                                d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                            <path
                                d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                        </svg>

                        <!-- Eye Icon (password visible, click to hide) -->
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 hidden text-black">
                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path fill-rule="evenodd"
                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                </div>

                <!-- Sign In Button -->
                <button type="submit"
                    class="w-full bg-sky-400 hover:bg-sky-500 text-white py-2 rounded-lg font-semibold">
                    Sign Up
                </button>
            </form>
            <script src="Password_Sign_Up.js"></script>

            <!-- Links -->
            <div class="text-center text-sm mt-4">
                <p class="text-gray-300">
                    Already have an account?
                    <a href="Sign_In.php" class="text-sky-400 hover:underline">Sign In</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>