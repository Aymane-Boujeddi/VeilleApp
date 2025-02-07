<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50">

<?php require_once __DIR__ . "/partials/homeheader.php"?>!

    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <div class="mx-auto w-48 h-48 mb-8 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center">
                    <span class="text-white text-4xl font-bold">VH</span>
                </div>

                <h1 class="text-5xl font-extrabold text-gray-900 sm:text-6xl mb-6">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                        Welcome to VeilleHub

                    </span>
                </h1>

                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-600 sm:mt-4">
                    Transform your presentations into powerful stories. Schedule, organize, and deliver
                    with confidence using our intuitive management system.
                </p>

                <div class="mt-10 flex justify-center gap-4">
                    <a href="#" class="px-8 py-3 text-base font-medium rounded-md text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition duration-150 ease-in-out shadow-lg hover:shadow-xl">
                        Get Started
                    </a>
                    <a href="#" class="px-8 py-3 text-base font-medium rounded-md text-indigo-600 bg-white border border-indigo-200 hover:bg-indigo-50 transition duration-150 ease-in-out shadow-md hover:shadow-lg">
                        Learn More
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute top-0 left-0 -translate-x-1/2 -translate-y-1/2 w-96 h-96">
            <div class="absolute w-full h-full bg-gradient-to-br from-indigo-300 to-purple-300 rounded-full filter blur-3xl opacity-20"></div>
        </div>
        <div class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 w-96 h-96">
            <div class="absolute w-full h-full bg-gradient-to-br from-purple-300 to-indigo-300 rounded-full filter blur-3xl opacity-20"></div>
        </div>
    </div>
</body>

</html>