<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\expensesController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\PDFController;

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

Auth::routes(['verify' => true]);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'verified'], function() {
    Route::get('/', function () { return view('index'); })->name('home');
    Route::get('settings', [SettingController::class, 'settings'])->name('settings');

    Route::group(['prefix' => 'expenses'], function() {
        Route::get('/', [expensesController::class, 'expenses'])->name('expenses');
        Route::post('/add', [expensesController::class, 'add_expense'])->name('add_expense');
    });

    Route::group(['prefix' => 'report'], function() {
        Route::get('/', function () { return view('daily-reports.report'); })->name('report');
    });

    Route::group(['prefix' => 'notice'], function() {
        Route::get('/', function () { return view('notice.notice'); })->name('notice');
    });

    Route::group(['prefix' => 'attendance'], function() {
        Route::get('/', [attendanceController::class, 'attendance'])->name('attendance');
        Route::get('/detail/{id}', [attendanceController::class, 'attendance_detail'])->name('attendance_detail');
    });

    Route::group(['prefix' => 'employee'], function() {
        Route::get('/', [UserController::class, 'employee'])->name('employee');
        Route::post('/form/submit', [UserController::class, 'employee_form_submit'])->name('employee_form_submit');
    });

    Route::group(['prefix' => 'registration'], function() {
        Route::get('/new', [registrationController::class, 'registration'])->name('registration');
        Route::post('/review', [registrationController::class, 'registration_submit'])->name('registration_submit');
        Route::get('/review/{id}', [registrationController::class, 'registration_review'])->name('registration_review');
    });
});

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

require __DIR__.'/auth.php';
