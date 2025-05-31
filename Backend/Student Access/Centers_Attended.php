<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Centers Attended</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen text-center font-sans">
    <div class="sidebar relative w-[250px] bg-[#1a0a5c] text-white px-5 py-8 flex flex-col items-center">
        <img src="" alt="" class="w-[100px] h-[100px] object-cover rounded-full mb-4 bg-gray-300 mx-auto" />
        <h2 class="text-[20px] font-bold">Lorem Lepsum</h2>
        <p class="my-1 text-[14px]">loremlepsum2234@gmail.com</p>
        <p class="my-1 text-[14px]">2021-16613-MN-0</p>

        <nav class="mt-8 w-full">
            <a href="#" class="flex items-center font-bold text-white my-4 no-underline hover:underline">Profile</a>
            <a href="#"
                class="flex items-center font-bold text-white my-4 no-underline hover:underline">Certificates</a>
            <a href="#" class="flex items-center font-bold text-white my-4 underline">Centers Attended</a>
            <a href="#" class="flex items-center font-bold text-white my-4 no-underline hover:underline">Feedbacks</a>
        </nav>
        <div class="logout absolute bottom-5 left-5 flex items-center gap-2 text-[14px]">Logout</div>
    </div>

    <div class="main flex-1 bg-white">
        <div class="navbar flex justify-between items-center bg-white px-10 py-5 border-b-4 border-[#1a0a5c]">
            <nav>
                <a href="#" class="mx-4 font-bold text-[#1a0a5c] no-underline">Home</a>
                <a href="#" class="mx-4 font-bold text-[#1a0a5c] no-underline">Courses</a>
                <a href="#" class="mx-4 font-bold text-[#1a0a5c] no-underline">About us</a>
            </nav>
            <div class="top-right-logo">
                <img src="logo.png" alt="NC Finder">
            </div>
        </div>

        <div class="content p-10">
            <h1 class="text-[#1a0a5c] mb-8 text-left text-2xl font-bold">Centers Attended</h1>
            <table class="w-full text-white text-[14px] border-collapse">
                <thead>
                    <tr>
                        <th class="bg-[#1a0a5c] px-4 py-3 text-left">Training Center Name</th>
                        <th class="bg-[#1a0a5c] px-4 py-3 text-left">Location</th>
                        <th class="bg-[#1a0a5c] px-4 py-3 text-left">Course Taken</th>
                        <th class="bg-[#1a0a5c] px-4 py-3 text-left">Date Attended</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Mindtech Training and Development Institute Inc.
                        </td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Tutuban Center C.M., Recto Avenue Tondo, Manila
                        </td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Computer System Servicing NC II</td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">01/02/2025</td>
                    </tr>
                    <tr>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Pasay City Man Power Training Center</td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Pasay City</td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Technical Drafting NC II</td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">03/05/2025</td>
                    </tr>
                    <tr>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Aureate Training and Assessment Center, Inc.</td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Quezon City</td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">Java Programming NC III</td>
                        <td class="bg-[#11004c] px-4 py-3 text-left">05/10/2025</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>