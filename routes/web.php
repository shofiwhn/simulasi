<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/simulasi', function () {
    return view('simulasi');
});

Route::get('/cloth', function () {
    return view('cloth');
});

Route::get('/quiz', function () {
    return view('quiz');
});