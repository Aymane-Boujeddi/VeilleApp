<?php

session_start();


require_once('core/BaseController.php');
require_once 'core/Route.php';
require_once 'core/Router.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/AdminController.php';
require_once 'app/controllers/StudentController.php';
require_once 'app/controllers/TeacherController.php';
require_once 'app/config/db.php';



$router = new Router();
Route::setRouter($router);



// Define routes
// auth routes 
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'handleRegister']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/home' , [HomeController::class , 'showHome']);
Route::get('/',[HomeController::class , 'showHome']);
// admin routers

Route::get('/student/dashboard', [StudentController::class , 'showDashboard']);
Route::post('/student/suggest' ,[StudentController::class , 'addSuggestion']);

Route::get('/teacher/dashboard' ,[TeacherController::class , 'showDashboard']);
Route::get('/teacher/dashboard/validate/{userID}' , [TeacherController::class , 'validateAccount']);
Route::get('/teacher/dashboard/reject/{userID}' , [TeacherController::class , 'rejectAccount']);

Route::get("/teacher/dashboard/test", [TeacherController::class , 'pendingSubjects']);
Route::get("")

// $router->showRoutes();
// die();

// end admin routes 

// client Routes 
// Route::get('/client/dashboard', [ClientController::class, 'index']);



// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
