<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - VeilleHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="#" class="text-white text-2xl font-bold">VeilleHub</a>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-center space-x-4">
                        <button onclick="showContent('presentations')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-presentation mr-2"></i>My Presentations
                        </button>
                        <button onclick="showContent('stats')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-chart-bar mr-2"></i>Dashboard
                        </button>
                        <button onclick="showContent('suggestions')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-lightbulb mr-2"></i>Subject Suggestions
                        </button>
                        
                            <button  class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                                <i class="fas fa-user-circle mr-2"></i><?= $_SESSION['username'] ?>
                                </button>
                            <button onclick="window.location.href='../logout'" class="nav-btn text-red hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- My Presentations Section -->
        <div id="presentations" class="content-section">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">My Presentations</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Presentation Card -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Presentation Title</h3>
                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Scheduled</span>
                    </div>
                    <p class="text-gray-600 mb-4">Brief description of the presentation topic and its main points.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500"><i class="far fa-calendar mr-2"></i>Dec 15, 2023</span>
                    </div>
                    <button onclick="window.location.href=''" class="float-right text-red-600 hover:text-red-800 hover:scale-110 transition duration-150 ease-in-out p-2 rounded-full hover:bg-red-100">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
                <!-- Add more presentation cards here -->
            </div>
        </div>

        <!-- Stats Section -->
        <div id="stats" class="content-section hidden">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Performance Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Total Presentations</h3>
                    <p class="text-3xl font-bold text-indigo-600">12</p>
                </div>
                <!-- Add more stat cards here -->
            </div>
        </div>

        <!-- Subject Suggestions Section -->
        <div id="suggestions" class="content-section hidden">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Subject Suggestions</h2>

            <!-- Add Subject Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Submit New Subject</h3>
                <form action="suggest" method="POST" class="space-y-4">
                    <div>
                        <label for="subject_name" class="block text-sm font-medium text-gray-700 mb-1">Subject Name</label>
                        <input type="text"
                            id="subject_name"
                            name="subject_name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter your subject suggestion"
                            required>
                    </div>
                    
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-150 ease-in-out">
                        Submit Subject
                    </button>
                </form>
            </div>

            <!-- Existing Suggestions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Suggestion Card -->
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">AI in Healthcare</h3>
                    <p class="text-gray-600 mb-4">Explore the impact of artificial intelligence in modern healthcare systems.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">Suggested by: John Doe</span>
                        <button class="text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-md text-sm font-medium">
                            Choose Topic
                        </button>
                    </div>
                </div>
                <!-- Add more suggestion cards here -->
            </div>
        </div>
    </div>

    <script>
        // Function to show selected content and hide others
        function showContent(sectionId) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Show selected section
            document.getElementById(sectionId).classList.remove('hidden');

            // Update active state of navigation buttons
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('bg-indigo-700');
            });
            event.currentTarget.classList.add('bg-indigo-700');
        }

        // Function to toggle profile dropdown
        function toggleProfile() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profileDropdown');
            const profileButton = event.target.closest('button');

            if (!profileButton && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });

        // Show presentations section by default
        document.addEventListener('DOMContentLoaded', function() {
            showContent('presentations');
        });
    </script>
</body>

</html>