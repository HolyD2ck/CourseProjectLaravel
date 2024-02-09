<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\CalcController;

//HOME ROUTS:
Route::get('/', function () {
    return view('main');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//EMPLOYERS ROUTS:
Route::get('/Employers/create', function () {
    return view('Employers/create');
});
Route::get('/Employers/index', [EmployersController::class, 'index']);
Route::get('/Employers/edit/{id}',[EmployersController::class, 'edit']); 
Route::post('/Employers/update/{id}',[EmployersController::class, 'update']);
Route::delete('/Employers/delete/{id}', [EmployersController::class, 'destroy'])->name('employers.destroy');
Route::post('/Employers/create', [EmployersController::class, 'create']);


//APPLICANTS ROUTS:
Route::get('/Applicants/create', function () {
    return view('Applicants/create');
});
Route::get('/Applicants/index', [ApplicantsController::class, 'index']);
Route::get('/Applicants/edit/{id}',[ApplicantsController::class, 'edit']); 
Route::post('/Applicants/update/{id}',[ApplicantsController::class, 'update']);
Route::delete('/Applicant/delete/{id}', [ApplicantsController::class, 'destroy'])->name('applicants.destroy');
Route::post('/Applicants/create', [ApplicantsController::class, 'create']);

//CALC
Route::get('/calc', function () {
    return view('calc');
});

Route::post('/calc',[CalcController::class, 'result']);


//CHECK ROUTS:
Auth::routes();
Route::get('/check-connection', function() {
    try {
        DB::connection()->getPdo();
        return "Успешно подключено к базе данных.";
    } catch (\Exception $e) {
        die("Не удалось подключиться к базе данных. Пожалуйста, проверьте свои настройки. Ошибка: " . $e->getMessage());
    }
});
//EXPORT ROUTS:
Route::get('/Applicants/export', [ApplicantsController::class, 'export']);
Route::get('/Applicants/export2', [ApplicantsController::class, 'export2']);

Route::get('/Employers/export', [EmployersController::class, 'export']);
Route::get('/Employers/export2', [EmployersController::class, 'export2']);

Route::get('/Applicants/word', [ApplicantsController::class, 'word']);
Route::get('/Applicants/word2', [ApplicantsController::class, 'word2']);

Route::get('/Employers/word', [EmployersController::class, 'word']);
Route::get('/Employers/word2', [EmployersController::class, 'word2']);