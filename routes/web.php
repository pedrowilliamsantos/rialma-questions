<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', [Controller::class, 'index']);
Route::get('/questions', 'Controller@index');
Route::post('/questions', [Controller::class, 'getNextQuestion'])->name('questions');
