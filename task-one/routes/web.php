<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/users', function () {
//     $users = [
//         ["id" => 1, "name" => "ayaat", "age" => 24],
//         ["id" => 2, "name" => "nada", "age" => 26],
//         ["id" => 3, "name" => "mohammed", "age" => 22],
//         ["id" => 4, "name" => "ameena", "age" => 18],

//     ];
//     return view('usersView', ["users" => $users]);
// });


// Route::get('/user/{id}', function ($id) {
//     $users = [
//         ["id" => 1, "name" => "ayaat", "age" => 24, "email" => "ayaat@api.com"],
//         ["id" => 2, "name" => "mostafa", "age" => 26, "email" => "mostafa@api.com"],
//         ["id" => 3, "name" => "mohammed", "age" => 22, "email" => "mohamed@api.com"],
//         ["id" => 4, "name" => "ameena", "age" => 18, "email" => "Mahmoud@api.com"],
//     ];
//     if (count($users) < $id) {
//         return abort(404);
//     }

//     $user = $users[$id - 1];
//     return view('userView', ["user" => $user]);
// });
// //delete user
// Route::get('/delete/{id}', function ($id) {
//    $users = [
//         ["id" => 1, "name" => "ayaat", "age" => 24, "email" => "ayaat@api.com"],
//         ["id" => 2, "name" => "mostafa", "age" => 26, "email" => "mostafa@api.com"],
//         ["id" => 3, "name" => "mohammed", "age" => 22, "email" => "mohamed@api.com"],
//         ["id" => 4, "name" => "ameena", "age" => 18, "email" => "Mahmoud@api.com"],
//     ];
//     if (count($users) < $id) {
//         return abort(404);
//     }
//     // delete user from list
//     unset($users[$id - 1]);


// });
//student
Route::get('/Student', [StudentController::class, 'index']);
Route::get('/register', [StudentController::class, 'create']);
Route::post('/store', [StudentController::class, 'store'])->name('create-student');
Route::get('/student/{id}', [StudentController::class, 'show'])->name('students.getStudent');
Route::delete('student/{id}', [TrackController::class, ''])->name('students.deleteStudent');
Route::put('student/{id}', [TrackController::class, ''])->name('students.edit');


Route::get('/', [TrackController::class, 'all'])->name('studentAndTrack');


// tracks routes
Route::get('/Tracks', [TrackController::class, 'index']);
Route::get('/create-track', [TrackController::class, 'create']);
Route::post('/create-track', [TrackController::class, 'createTrack']);
Route::delete('track/{id}', [TrackController::class, 'destroy'])->name('tracks.deleteTrack');
Route::get('track/{id}', [TrackController::class, 'show'])->name('tracks.getTrack');
Route::get('track-update/{id}', [TrackController::class, 'edit'])->name('tracks.edit');
Route::put('track-update/{id}', [TrackController::class, 'update'])->name('tracks.update');


