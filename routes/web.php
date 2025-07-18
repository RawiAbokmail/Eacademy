<?php

use App\Http\Controllers\dashboard\BlogController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\CourseController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\EventController;
use App\Http\Controllers\dashboard\LectureController;
use App\Http\Controllers\dashboard\TagController;
use App\Http\Controllers\dashboard\TeacherController;
use App\Http\Controllers\dashboard\TestController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckType;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdminOrTeacher;

Route::prefix('/')->name('eacademy.')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/courses', [FrontController::class, 'courses'])->name('courses');
    Route::get('/courses-single/{course}', [FrontController::class, 'courses_single'])->name('courses-single');
    Route::get('/events', [FrontController::class, 'events'])->name('events');
    Route::get('/events-single/{event}', [FrontController::class, 'events_single'])->name('events-single');
    Route::get('/teachers', [FrontController::class, 'teachers'])->name('teachers');
    Route::get('/teachers-single/{teacher}', [FrontController::class, 'teachers_single'])->name('teachers-single');
    Route::get('/blogs', [FrontController::class, 'blog'])->name('blogs');

    Route::get('/blog-single/{blog}', [FrontController::class, 'blog_single'])->name('blog-single');
    Route::get('/shop', [FrontController::class, 'shop'])->name('shop');
    Route::get('/shop-single', [FrontController::class, 'shop_single'])->name('shop-single');
    Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
    Route::get('/cart', [FrontController::class, 'cart'])->name('cart');
    Route::get('/checkout', [FrontController::class, 'checkout'])->name('checkout');

});



Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', CheckType::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('users', UserController::class);
    Route::resource('teachers', TeacherController::class)->except(['show']);
    Route::resource('blogs', BlogController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class)->except(['show']);
    Route::resource('courses', CourseController::class);
    Route::resource('lectures', LectureController::class);
    Route::resource('events', EventController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';