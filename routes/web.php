<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;

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

Route::get('/', [HomeController::class, "index"]);

Route::get("/movie", [MovieController::class, "index"]);

Route::get("/movie/create", [MovieController::class, "create"]);

Route::post("/movie", [MovieController::class, "store"]);

Route::get("/movie/{movie}/edit", [MovieController::class, "edit"]);

Route::put("/movie/{movie}", [MovieController::class, "update"]);

Route::delete("/movie/{movie}", [MovieController::class, "destroy"]);

Route::get("/genre", [GenreController::class, "index"]);

Route::get("/genre/create", [GenreController::class, "create"]);

Route::post("/genre", [GenreController::class, "store"]);

Route::get("/genre/{genre}/edit", [GenreController::class, "edit"]);

Route::get("/genre/{genre}", [GenreController::class, "show"]);

Route::put("/genre/{genre}", [GenreController::class, "update"]);

Route::delete("/genre/{genre}", [GenreController::class, "destroy"]);