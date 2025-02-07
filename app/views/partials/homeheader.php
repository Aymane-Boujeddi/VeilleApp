<?php
if (isset($_SESSION['userID']) && isset($_SESSION['username'])) {
    $navlinks = "
    <a href='#' class='text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium'>
                            <i class='far fa-calendar-alt mr-2'></i>Calendar
                        </a>
                        <a href='student/dashboard' class='text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium'>
                                 <i class='fas fa-chart-bar mr-2'></i>Dashboard
                        </a>
                         <button  class='nav-btn text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium'>
                                <i class='fas fa-user-circle mr-2'></i>" . $_SESSION['username'] . " 
                                </button>
                                  <button onclick='window.location.href='../logout'' class='nav-btn text-red hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium'>
                                <i class='fas fa-sign-out-alt mr-2'></i>Logout
                            </button>

    ";
} else {
    $navlinks = "
    <a href='#' class='text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium'>
                            <i class='far fa-calendar-alt mr-2'></i>Calendar
                        </a>
                        <a href='login' class='text-white hover:bg-indigo-700 px-3 py-2 rounded-md text-sm font-medium'>
                            Sign In
                        </a>
                        <a href='register' class='bg-white text-indigo-600 hover:bg-indigo-100 px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out'>
                            Sign Up
                        </a>
    ";
}


?>
<nav class="bg-gradient-to-r from-indigo-600 to-purple-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="#" class="text-white text-2xl font-bold">VeilleHub</a>
            </div>
            <div class="hidden md:block">
                <div class="flex items-center space-x-4">
                    <?= $navlinks ?>
                </div>
            </div>
            <div class="md:hidden">
                <button type="button" class="text-white hover:bg-indigo-700 p-2 rounded-md">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>