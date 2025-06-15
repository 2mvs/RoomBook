<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\auth\AuthController;

Route::get('/', [HomeController::class, 'homeView'])->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('category')->group(function(){
        Route::get('/all', [CategoryController::class, 'allCategories'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'showCategoryForm'])->name('category.create');
        Route::post('/create', [CategoryController::class, 'createCategory'])->name('category.store');
        Route::get('/{category}/edit', [CategoryController::class, 'editCategory'])->name('category.edit');
        Route::put('/{category}', [CategoryController::class, 'updateCategory'])->name('category.update');
        Route::delete('/{category}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    });

    Route::get('/admin/room', [RoomController::class, 'getRooms'])->name('admin.room');
    Route::post('/admin/room', [RoomController::class, 'createRoom'])->name('room.post');
    Route::get('/admin/room/{room}/edit', [RoomController::class, 'editRoom'])->name('room.edit');
    Route::get('/admin/room/{room}', [RoomController::class, 'showRoom'])->name('room.show');
    Route::put('/admin/room/{room}', [RoomController::class, 'updateRoom'])->name('room.update');
    Route::delete('/admin/room/{room}', [RoomController::class, 'deleteRoom'])->name('room.delete');
    Route::get('admin/add', [RoomController::class, 'roomForm'])->name('room.add');
});

Route::get('/home', [ReservationController::class, 'index'])->name('reservation')->middleware(['auth']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showSignupForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('home')->group( function(){
    Route::get('/salles', [HomeController::class, 'allRooms'])->name('home.rooms');
    Route::get('/salle/{room}', [HomeController::class, 'roomDetails'])->name('home.roomDetails');

    Route::post('/reservation', [ReservationController::class, 'storeBookind'])->name('reservation.store')->middleware(['auth']);
});


