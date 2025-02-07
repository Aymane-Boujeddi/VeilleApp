<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - VeilleHub</title>
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
                        <button onclick="showContent('subject-validation')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-check-circle mr-2"></i>Subject Validation
                        </button>
                        <button onclick="showContent('account-validation')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-user-check mr-2"></i>Account Validation
                        </button>
                        <button onclick="showContent('subject-assignment')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-tasks mr-2"></i>Subject Assignment
                        </button>
                        <button onclick="showContent('user-management')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-users-cog mr-2"></i>User Management
                        </button>
                        <button onclick="showContent('presentation-management')" class="nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>Presentation Management
                        </button>
                        <button onclick="window.location.href='../logout'" class="nav-btn text-red-200 hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Content Sections -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Subject Validation Section -->
        <div id="subject-validation" class="content-section">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Subject Validation</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Subject Card -->
                <?php if (!empty($subjects)): ?>
                    <?php foreach ($subjects as $subject): ?>

                        <div class="bg-white rounded-lg shadow-md p-8 hover:shadow-lg transition duration-300">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-semibold text-gray-800"><?= $subject->subject_title ?></h3>
                                <span class="px-3 py-1 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full"><?= $subject->subject_status ?></span>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">
                                    <i class="fas fa-user mr-2"></i>
                                    Suggested by: <span class="font-medium"><?= $subject->username ?></span>
                                </p>
                                <p class="text-gray-600 mt-2">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    Submitted on: <span class="font-medium"><?= date('F j, Y', strtotime($subject->suggestion_date)) ?></span>
                                </p>
                            </div>

                            <div class="flex justify-end space-x-3">
                                <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-150 ease-in-out flex items-center">
                                    <i class="fas fa-check mr-2"></i>Approve
                                </button>
                                <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-150 ease-in-out flex items-center">
                                    <i class="fas fa-times mr-2"></i>Reject
                                </button>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-2 bg-white rounded-lg shadow-md p-6">
                        <p class="text-gray-500 text-center text-lg">
                            <i class="fas fa-inbox mb-2 text-4xl block"></i>
                            No subject suggestions found at this time.
                        </p>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <!-- Account Validation Section -->
        <div id="account-validation" class="content-section hidden">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Account Validation</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if (!empty($accounts)): ?>
                            <?php foreach ($accounts as $account): ?>
                                <tr>
                                    <td class="px-6 py-4"><?= $account->username ?></td>
                                    <td class="px-6 py-4"><?= $account->email ?></td>
                                    <td class="px-6 py-4"><?= $account->user_role ?></td>
                                    <td class="px-6 py-4"><?= $account->user_status ?></td>
                                    <td class="px-6 py-4">
                                        <button onclick="window.location.href='../teacher/dashboard/validate/<?= $account->userID ?>'" class="text-green-500 hover:text-green-700 mr-2">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button onclick="window.location.href='../teacher/dashboard/reject/<?= $account->userID ?>'" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No pending accounts found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Subject Assignment Section -->
        <div id="subject-assignment" class="content-section hidden">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Subject Assignment</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                <form class="space-y-4" action="assign-subject" method="POST">
                    <!-- Subject Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Select Subject</label>
                        <select name="subject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select a subject...</option>
                            <option value="1">AI in Healthcare</option>
                            <option value="2">Blockchain Technology</option>
                        </select>
                    </div>

                    <!-- Student Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Students (Minimum 2)</label>
                        <div class="relative">
                            <!-- Search Input -->
                            <input type="text"
                                id="student-search"
                                placeholder="Search students..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">

                            <!-- Selected Students Tags -->
                            <div id="selected-students" class="mt-2 flex flex-wrap gap-2">
                                <!-- Tags will be added here dynamically -->
                            </div>

                            <!-- Students Dropdown -->
                            <div id="students-dropdown" class="hidden absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base overflow-auto focus:outline-none sm:text-sm">
                                <!-- Student list will be populated here -->
                            </div>
                        </div>
                        <!-- Hidden inputs for selected students -->
                        <div id="student-inputs"></div>
                        <p class="mt-1 text-sm text-red-600 hidden" id="student-error">Please select at least 2 students</p>
                    </div>

                    <!-- Presentation Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Presentation Date</label>
                        <input type="date" name="presentation_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <button type="submit"
                        onclick="return validateForm(event)"
                        class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-150 ease-in-out">
                        Assign Subject
                    </button>
                </form>
            </div>
        </div>

        <!-- User Management Section -->
        <div id="user-management" class="content-section hidden">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">User Management</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <?php if(!empty($users)):?>
                <table class="min-w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                            <?php foreach($users as $user):?>
                        <tr>
                            <td class="px-6 py-4"><?= $user->username?></td>
                            <td class="px-6 py-4"><?= $user->email?></td>
                            <td class="px-6 py-4"><?= $user->user_role?></td>
                            <td class="px-6 py-4">
                                <button onclick="window.location.href=''" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition duration-150 ease-in-out text-sm">
                                    Suspend
                                </button>
                                <button onclick="window.location.href=''" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition duration-150 ease-in-out text-sm">
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else:?>
                    <div class="flex items-center justify-center p-8">
                        <p class="text-gray-500 text-lg">No users found in the system.</p>
                    </div>
                <?php endif;?>
            </div>
        </div>

        <!-- Presentation Management Section -->
        <div id="presentation-management" class="content-section hidden">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Presentation Management</h2>

            <!-- Filters and Search -->
            <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Filter by Status</label>
                        <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="all">All Presentations</option>
                            <option value="upcoming">Upcoming</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Filter by Date</label>
                        <input type="date" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                        <input type="text"
                            placeholder="Search by subject or student name..."
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>
            </div>

            <!-- Presentations Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Upcoming Presentation Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2">
                        <span class="text-white text-sm font-semibold">Upcoming</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">AI in Healthcare</h3>

                        <!-- Students -->
                        <div class="mb-3">
                            <h4 class="text-sm font-medium text-gray-600 mb-1">Presenting Students:</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-indigo-100 text-indigo-700">
                                    John Doe
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-indigo-100 text-indigo-700">
                                    Jane Smith
                                </span>
                            </div>
                        </div>

                        <!-- Date and Time -->
                        <div class="flex items-center text-sm text-gray-600 mb-3">
                            <i class="far fa-calendar mr-2"></i>
                            <span>Dec 15, 2023</span>
                            <i class="far fa-clock ml-4 mr-2"></i>
                            <span>14:00</span>
                        </div>

                        <!-- Progress Indicators -->
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">Preparation Progress</span>
                                <span class="text-indigo-600 font-medium">75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md hover:bg-indigo-200 text-sm">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </button>
                                <button class="px-3 py-1 bg-red-100 text-red-700 rounded-md hover:bg-red-200 text-sm">
                                    <i class="fas fa-times mr-1"></i>Cancel
                                </button>
                            </div>
                            <button class="px-3 py-1 bg-green-100 text-green-700 rounded-md hover:bg-green-200 text-sm">
                                <i class="fas fa-check mr-1"></i>Mark Complete
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Completed Presentation Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-green-600 px-4 py-2">
                        <span class="text-white text-sm font-semibold">Completed</span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Blockchain Technology</h3>

                        <!-- Students -->
                        <div class="mb-3">
                            <h4 class="text-sm font-medium text-gray-600 mb-1">Presented By:</h4>
                            <div class="flex flex-wrap gap-2">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                    Alice Johnson
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                    Bob Wilson
                                </span>
                            </div>
                        </div>

                        <!-- Date and Score -->
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="far fa-calendar mr-2"></i>
                                <span>Dec 10, 2023</span>
                            </div>
                            <div class="flex items-center text-sm font-medium text-green-600">
                                <i class="fas fa-star mr-2"></i>
                                <span>Score: 18/20</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-between items-center">
                            <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 text-sm">
                                <i class="fas fa-download mr-1"></i>Download Report
                            </button>
                            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 text-sm">
                                <i class="fas fa-eye mr-1"></i>View Details
                            </button>
                        </div>
                    </div>
                </div>
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

        // Sample student data - replace with your actual data
        const students = [{
                id: 1,
                name: 'John Doe'
            },
            {
                id: 2,
                name: 'Jane Smith'
            },
            {
                id: 3,
                name: 'Alice Johnson'
            },
            {
                id: 4,
                name: 'Bob Wilson'
            },
            {
                id: 5,
                name: 'Charlie Brown'
            },
            // Add more students as needed
        ];

        const selectedStudentsSet = new Set();
        const searchInput = document.getElementById('student-search');
        const dropdown = document.getElementById('students-dropdown');
        const selectedStudentsContainer = document.getElementById('selected-students');
        const studentInputsContainer = document.getElementById('student-inputs');

        // Initialize search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const filteredStudents = students.filter(student =>
                student.name.toLowerCase().includes(searchTerm) &&
                !selectedStudentsSet.has(student.id)
            );

            renderDropdown(filteredStudents);
            dropdown.classList.remove('hidden');
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

        function renderDropdown(students) {
            dropdown.innerHTML = students.map(student => `
                <div class="student-option cursor-pointer hover:bg-gray-100 px-4 py-2"
                     onclick="selectStudent(${student.id}, '${student.name}')">
                    ${student.name}
                </div>
            `).join('');
        }

        function selectStudent(id, name) {
            if (selectedStudentsSet.has(id)) return;

            selectedStudentsSet.add(id);

            // Add tag
            const tag = document.createElement('div');
            tag.className = 'inline-flex items-center px-2 py-1 rounded-full text-sm bg-indigo-100 text-indigo-700';
            tag.innerHTML = `
                ${name}
                <button type="button" onclick="removeStudent(${id})" class="ml-1 text-indigo-500 hover:text-indigo-700">
                    <i class="fas fa-times"></i>
                </button>
            `;
            selectedStudentsContainer.appendChild(tag);

            // Add hidden input
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'students[]';
            input.value = id;
            input.id = `student-input-${id}`;
            studentInputsContainer.appendChild(input);

            // Clear and hide dropdown
            searchInput.value = '';
            dropdown.classList.add('hidden');
        }

        function removeStudent(id) {
            selectedStudentsSet.delete(id);

            // Remove tag
            const tag = selectedStudentsContainer.querySelector(`div:has(button[onclick="removeStudent(${id})"])`);
            if (tag) tag.remove();

            // Remove hidden input
            const input = document.getElementById(`student-input-${id}`);
            if (input) input.remove();
        }

        function validateForm(event) {
            event.preventDefault();

            const errorMessage = document.getElementById('student-error');
            const subjectSelect = document.querySelector('select[name="subject"]');
            const dateInput = document.querySelector('input[name="presentation_date"]');

            // Reset error message
            errorMessage.classList.add('hidden');

            // Validate subject selection
            if (!subjectSelect.value) {
                alert('Please select a subject');
                return false;
            }

            // Validate date selection
            if (!dateInput.value) {
                alert('Please select a presentation date');
                return false;
            }

            // Validate minimum student selection
            if (selectedStudentsSet.size < 2) {
                errorMessage.classList.remove('hidden');
                return false;
            }

            // If all validations pass, submit the form
            event.target.closest('form').submit();
            return true;
        }

        // Show subject validation section by default
        document.addEventListener('DOMContentLoaded', function() {
            showContent('subject-validation');
        });
    </script>
</body>

</html>