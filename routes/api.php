<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepOptionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RoomController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\WeekController;

//den
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\CourseAnnualController;
use App\Http\Controllers\GenderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//den Api Start

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get room api
Route::prefix('rooms')->group(function () {
    Route::get('/get_room', [RoomController::class, 'get_room']);
});

//get lecturer
Route::prefix('employees')->group(function(){
    Route::get('/get_lecturer',[EmployeeController::class, 'get_lecturer']);
});

//get course
Route::prefix('courses')->group(function(){
    Route::get('/get_course',[CourseController::class, 'get_course']);
});

// Route::prefix('buildings')->group(function () {
//     Route::get('/list', [BuildingController::class, 'list']);
//     Route::get('/list/{id}', [BuildingController::class, 'listByID']);
// });
// Route::post('/users/create', [UserController::class, 'store']);
// Route::get('/users/list', [UserController::class, 'list']);

// Route::prefix('roomtypes')->group(function () {
//     // Route::get('/list', [RoomTypeController::class, 'list']);
//     // Route::get('/list/{id}', [RoomTypeController::class, 'listByID']);

//     // Route::get('/test', [RoomTypeController::class, 'listRooms']);
//     // Route::get('/test/{id}', [RoomTypeController::class, 'listRoom']);

// });

// Route::prefix('timetables')->group(function () {
//     Route::get('/list',[TimeTableController::class, 'list']);
//     Route::get('/list/{id}',[TimeTableController::class, 'listByID']);
// });
// Route::prefix('slots')->group(function () {
//     Route::get('/list',[SlotController::class, 'list']);
//     Route::get('/list/{id}',[SlotController::class, 'listByID']);
//     Route::post('/create',[SlotController::class, 'create']);
// });



// Route::prefix('genders')->group(function(){
//     Route::get('/list',[GenderController::class, 'list']);
// });

//course_annual
// Route::prefix('course_annuals')->group(function(){
//     Route::get('/get_course',[CourseAnnualController::class, 'get_course']);
// });

// Route::prefix('slots')->group(function(){
//     Route::post('/create',[SlotController::class, 'create']);
// });

//den api end




// API for provide data to Sidebar
Route::get('/get-all-AcademicYears',[AcademicYearController::class,'index']);
Route::get('/get-all-Departments',[DepartmentController::class,'index']);
Route::get('/get-all-Degrees',[DegreeController::class,'index']);
Route::get('/get-all-DepOptions',[DepOptionController::class,'index']);
Route::get('/get-all-Grades',[GradeController::class,'index']);
Route::get('/get-all-Semesters',[SemesterController::class,'index']);
Route::get('/get-all-Weeks',[WeekController::class,'index']);
Route::get('/get-all-Groups',[GroupController::class,'index']);
