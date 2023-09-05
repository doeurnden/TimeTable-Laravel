<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepOptionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\WeekController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('rooms')->group(function(){
    Route::get('/list',[RoomController::class, 'list']);
});



// API for provide data to Sidebar
Route::get('/get_all_AcademicYears',[AcademicYearController::class,'index']);
Route::get('/get_all_Departments',[DepartmentController::class,'index']);
Route::get('/get_all_Degrees',[DegreeController::class,'index']);
Route::get('/get_all_DepOptions',[DepOptionController::class,'index']);
Route::get('/get_all_Grades',[GradeController::class,'index']);
Route::get('/get_all_Semesters',[SemesterController::class,'index']);
Route::get('/get_all_Weeks',[WeekController::class,'index']);
Route::get('/get_all_Groups',[GroupController::class,'index']);
