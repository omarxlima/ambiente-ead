<?php

use App\Http\Controllers\Admin\{
    AdminController,
    CourseController,
    DashboardController,
    LessonController,
    ModuleController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    

      /**
     * routes coures
     */

     Route::resource('/modules/{moduleId}/lessons',controller: LessonController::class,
    );
    /**
     * routes coures
     */

    Route::resource(
        name: '/courses/{courseId}/modules',
        controller: ModuleController::class,
    );

    /**
     * routes coures
     */

    Route::resource('/courses', CourseController::class);
    Route::put('admins/{id}/update-photo', [CourseController::class, 'uploadFile'])->name('admins.update.image');
    Route::get('/admins/{id}/image', [CourseController::class, 'changeImage'])->name('admins.change.image');
    /**
     * routes admins
     */

    Route::resource('/admins', AdminController::class);
    Route::put('admins/{id}/update-photo', [AdminController::class, 'uploadFile'])->name('admins.update.image');
    Route::get('/admins/{id}/image', [AdminController::class, 'changeImage'])->name('admins.change.image');

    /**
     * routes Users
     */
    Route::put('users/{id}/update-photo', [UserController::class, 'uploadFile'])->name('users.update.image');
    Route::get('/users/{id}/image', [UserController::class, 'changeImage'])->name('users.change.image');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/', [DashboardController::class, 'index'])->name('admin.home');
});

Route::get('/', function () {
    return view('welcome');
});
