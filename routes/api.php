<?php
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepOptionController;
use App\Http\Controllers\GradeController;
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
use App\Http\Controllers\FieldRequireController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\Slot_ShowController;
use App\Http\Controllers\TimeTableSlotController;
use App\Models\TimeTableSlot;

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
Route::get('fields',[FieldRequireController::class,"index"]);
//get room api
Route::prefix('rooms')->group(function () {
    Route::get('/get_room', [RoomController::class, 'get_room']);
    Route::post('/insert_room_into_timetable_slot/{id}',[RoomController::class,'insert_room_into_timetable_slot']);
    Route::get('/get_room_by_id/{id}',[RoomController::class, 'get_room_by_id']);
});

//get lecturer
Route::prefix('employees')->group(function(){
    Route::get('/get_lecturer',[EmployeeController::class, 'get_lecturer']);
});

//get course
Route::prefix('courses')->group(function(){
    Route::get('/get_course',[CourseController::class, 'get_course']);
    Route::get('/get_course_id/{id}',[CourseController::class, 'get_course_id']);
    Route::get('/get_course_program',[CourseController::class, 'get_course_program']);
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

Route::prefix('timetables')->group(function () {
    Route::get('/list',[TimeTableController::class, 'get_all_timetable']);
    Route::get('/list/{id}',[TimeTableController::class, 'listByID']);
});

//@Do on Slot
Route::prefix('slots')->group(function () {
    Route::post('/query_and_post_slot',[SlotController::class, 'list']);
    Route::get('/get_slots/{id}', [SlotController::class, 'get_slot']);
    // Route::post('/create_slot',[SlotController::class, 'create_slote']);
    Route::put('/update_slot/{id}', [SlotController::class, 'update_slot']);
    Route::delete('/delete_slot/{id}', [SlotController::class, 'delete_slot']);
});

//@Do on timetable slot
Route::prefix('timetable_slots')->group(function(){
    Route::post('/create',[TimeTableSlotController::class, 'create_timetable_slot']);
    Route::get('/read',[TimeTableSlotController::class, 'get_timetable_slot']);
    Route::post('/update/{id}',[TimeTableSlotController::class, 'update_timetable_slot']);
    Route::delete('/delete/{id}',[TimeTableSlotController::class, 'delete_timetable_slot']);
});

// Route::prefix('genders')->group(function(){
//     Route::get('/list',[GenderController::class, 'list']);
// });


// course_annual
Route::prefix('course_annuals')->group(function(){
    Route::get('/get_course_annual',[CourseAnnualController::class, 'get_course_annual']);
    Route::get('/get_course',[CourseAnnualController::class, 'get_courses']);
});
//den api end




// API for provide data to Sidebar
Route::get('/get_all_academicYears',[AcademicYearController::class,'index']);
Route::get('/get_all_departments',[DepartmentController::class,'index']);
Route::get('/get_all_degrees',[DegreeController::class,'index']);
Route::get('/get_all_depOptions',[DepOptionController::class,'index']);
Route::get('/get_all_grades',[GradeController::class,'index']);
Route::get('/get_all_semesters',[SemesterController::class,'index']);
Route::get('/get_all_weeks',[WeekController::class,'index']);

Route::get('/get_all_groups', [GroupController::class, 'getGroups']);

// Route::get('/get_all_timeTable',[TimeTableController::class,'get_all_timetable']);
// Route::get('/get_one_groups/{id}',[TimeTableController::class,'get_one_timetable']);
// Route::post('/create_timetable', [TimeTableController::class, 'create']);
// Route::put('/update_TimeTable/{id}',[TimeTableController::class,'update']);

Route::post('/createSlot',[SlotController::class,'createSlot']);
Route::post('/query_and_post_timetables', [TimetableController::class, 'getAll_TimeTable']);

//@ Get slot (timetable_slot join slot and join timetable)

Route::get('/get_slot_from_timetable_slote/{timetableId}', [Slot_ShowController::class, 'index']);

