<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nc Finder - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('background.jpg');">
    <div class="bg-indigo-900 bg-opacity-90 p-8 rounded-2xl shadow-2xl max-w-sm w-full text-white">
        <div class="flex flex-col items-center mb-6"> 




        <h2 class="text-lg font-semibold mb-4">Enter Your Account</h2>

        <form class="space-y-4">
            <!-- Student Number -->
            <div class="flex items-center bg-white rounded-lg px-3 py-2">
                <span class="text-gray-500 mr-2">#</span>
                <input 
                    type="text" 
                    placeholder="2022-12345-MN-0"
                    class="w-full text-black focus:outline-none"
                />
            </div>

            <!-- Password -->
            <div class="flex items-center bg-white rounded-lg px-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v2H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-1V6a4 4 0 00-4-4zM8 6a2 2 0 114 0v2H8V6zm-3 4h10v6H5v-6z" clip-rule="evenodd" />
                </svg>
                <input 
                    type="password" 
                    placeholder="Password"
                    class="w-full text-black focus:outline-none"
                />
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="w-full bg-sky-400 hover:bg-sky-500 text-white py-2 rounded-lg font-semibold">
                Sign In
            </button>
        </form>

        <!-- Links -->
        <div class="text-center text-sm mt-4">
            <p class="text-gray-300">
                Doesn't have an account? 
                <a href="#" class="text-sky-400 hover:underline">Sign Up</a>
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
