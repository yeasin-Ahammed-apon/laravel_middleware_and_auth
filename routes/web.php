<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dev;
use App\Http\Controllers\login;

//middleware for user check
Route::middleware(['user_check'])->group(function () {
        Route::get('/', [dev::class, 'home']);
        Route::get('/view/{id}', [dev::class, 'view']);
        Route::get('/add_page', [dev::class, 'add_page']);
        Route::post('/add', [dev::class, 'add']);
        Route::get('/edit_page/{id}', [dev::class, 'edit_page']);
        Route::post('/update', [dev::class, 'update']);
        Route::get("/delete/{id}",[dev::class, 'delete']);
});
// login
Route::middleware(['if_loged'])->group(function () {
        Route::get("/login_page",[login::class, 'login_page']);
        Route::post("/login",[login::class, 'login']);
        Route::get("/register_page",[login::class, 'register_page']);
        Route::post("/register",[login::class, 'register']);
});
//logout
Route::get("/logout",[login::class, 'logout']);

