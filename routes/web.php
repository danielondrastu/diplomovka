<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllCoursesController;
use App\Http\Controllers\TeachingActivitiesController;
use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CoursebaseController;
use App\Http\Controllers\LimitationsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [DashboardController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('dashboard/{id}', [DashboardController::class, 'showActivityDetail']);


require __DIR__.'/auth.php';

// for teachers
Route::group(['middleware' => ['auth', 'role:teacher|power|admin']], function() { 

    Route::get('myTeaching', [TeachingActivitiesController::class, 'showMyTeaching'])->name('myTeaching');
    Route::get('myTeachingDetail/{id}', [TeachingActivitiesController::class, 'showStudentsList']);
    Route::get('removeFromMyActivity/{record_id}', [TeachingActivitiesController::class, 'removeFromActivity']);

    Route::get('myLimits', [LimitationsController::class, 'index'])->name('myLimits');
    Route::post('updatePref', [LimitationsController::class, 'store']);

});

// for powers
Route::group(['middleware' => ['auth', 'role:power|admin']], function() { 
    Route::get('allCourses', [AllCoursesController::class, 'index'])->name('allCourses');
    Route::get('editCourse/{id}', [AllCoursesController::class, 'showData']);
    Route::post('updateCourse', [AllCoursesController::class, 'editCourse']);

    Route::get('newTerm', [CoursebaseController::class, 'index']);
    Route::post('createNewTerm', [CoursebaseController::class, 'store']);

    Route::get('teachingActivities/{id}', [TeachingActivitiesController::class, 'index']);
    Route::get('editTeachingActivity/{id}', [TeachingActivitiesController::class, 'showActivity']);
    Route::post('updateActivity', [TeachingActivitiesController::class, 'updateActivity']);
    Route::get('newTeachingActivity/{id}', [TeachingActivitiesController::class, 'newActivity']);
    Route::post('createActivity', [TeachingActivitiesController::class, 'createActivity']);
    Route::get('deleteActivity/{course_id}/{activity_id}', [TeachingActivitiesController::class, 'deleteActivity']);
    Route::post('registerUserToActivity', [TeachingActivitiesController::class, 'registerUserToActivity']);
    Route::get('removeStudentFromActivity/{record_id}/{activity_id}', [TeachingActivitiesController::class, 'removeStudentFromActivity']);

});

// for admins
Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    
    Route::get('allUsers', [AllUsersController::class, 'index'])->name('allUsers');
    Route::get('editUser/{id}', [AllUsersController::class, 'showUser']);
    Route::post('registerToActivity', [AllUsersController::class, 'registerToActivity']);
    Route::get('removeFromActivity/{record_id}/{user_id}', [AllUsersController::class, 'removeFromActivity']);
    Route::post('updateUser', [AllUsersController::class, 'updateUser']);


});







