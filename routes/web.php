<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PageController;
use Symfony\Component\CssSelector\Node\FunctionNode;

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



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


 

    // Route::middleware('lang')->group(function() {

        // Route::get('/{lang}', [LangController::class, 'index']);
        Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('homepage');
        Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
        Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'books']);
        Route::get('/collections/{category_slug}/{book_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'bookDetail']);
        Route::get('/book', [App\Http\Controllers\Frontend\FrontendController::class, 'bookAll']);
        Route::get('/newbook', [App\Http\Controllers\Frontend\FrontendController::class, 'newBook']);


        Route::get('/profile', [App\Http\Controllers\Frontend\UserProfileController::class, 'profileIndex']);
        Route::get('/profile/{id}/edit', [App\Http\Controllers\Frontend\UserProfileController::class, 'profileEdit']);
        Route::put('/profile/{id}', [App\Http\Controllers\Frontend\UserProfileController::class, 'profileUpdate']);

        Route::get('/updatepassword/{id}/edit', [App\Http\Controllers\Frontend\UserPasswordController::class, 'passwordEdit']);
       
        Route::put('/updatepassword/{id}', [App\Http\Controllers\Frontend\UserPasswordController::class, 'passwordUpdate']);
       


    // });
    
   




// Admin 


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin_dashboard');

// Category Route 

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');
        Route::get('category/{id}/edit', 'edit');
        Route::put('category/{id}', 'update');
        Route::delete('category/{id}', 'destroy');
});       

// Books route 

Route::controller(App\Http\Controllers\Admin\BookController::class)->group(function () {
    Route::get('book', 'index');
    Route::get('book/create', 'create');
    Route::post('book', 'store');
    Route::get('book/{id}', 'show');
    Route::get('book/{id}/edit', 'edit');
    Route::put('book/{id}', 'update');
    Route::delete('book/{id}', 'destroy');
});       

// Profile Route 

Route::controller( App\Http\Controllers\Admin\ProfileController::class)->group(function () {
  
    Route::get('profile/', 'index');
    Route::get('profile/{id}/edit', 'edit');
    Route::put('profile/{id}', 'update');
    Route::delete('profile/{id}', 'destroy');
});

// Password Update 

Route::controller( App\Http\Controllers\Admin\PasswordUpdateController::class)->group(function () {
    Route::get('passwordupdate/{id}/edit', 'edit');
    Route::put('passwordupdate/{id}', 'update');
});

// Color 

Route::controller( App\Http\Controllers\Admin\ColorController::class)->group(function () {
  
    Route::get('color', 'index');
    Route::get('color/create', 'create');
    Route::post('color', 'store');
    Route::get('color/{id}', 'show');
    Route::get('color/{id}/edit', 'edit');
    Route::put('color/{id}', 'update');
    Route::delete('color/{id}', 'destroy');

});

//home slider 

Route::controller( App\Http\Controllers\Admin\SliderController::class)->group(function () {
  
    Route::get('slider', 'index');
    Route::get('slider/create', 'create');
    Route::post('slider', 'store');
    // Route::get('slider/{id}', 'show');
    Route::get('slider/{id}/edit', 'edit');
    Route::put('slider/{id}', 'update');
    Route::delete('slider/{id}', 'destroy');
});

// User route 
            Route::controller( App\Http\Controllers\Admin\UserController::class)->group(function () {
                    Route::get('user', 'index');
                    Route::get('user/create', 'create');
                    Route::post('user', 'store');
                    // Route::get('user/{id}', 'show');
                    Route::get('user/{id}/edit', 'edit');
                    Route::put('user/{id}', 'update');
                    Route::delete('user/{id}', 'destroy');
            });

    });

  