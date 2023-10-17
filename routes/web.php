<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [FormController::class, 'showForm']);
Route::post('/form', [FormController::class, 'submitForm']);

Route::get('/success', function () {
    return view('success');
});
