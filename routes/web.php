<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Public\CarController as PublicCarController;
use App\Models\Category;
use App\Models\Message;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
// view is just for GET
Route::POST('/contact', [MessageController::class, 'store'])->name('message.store');

Route::resource('cars', PublicCarController::class);

Route::group(['as'=>'admin.','prefix'=>'admin'] , function(){

    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message:name}', [MessageController::class, 'show'])->name('messages.show');
    Route::resource('cars', CarController::class);
    Route::resource('categories', CategoryController::class);

    //admin/messages' must defined before '/admin/messages/{message:name}' ALWays because if we swipe them it
    // Route::get('cars/create',[CarController::class,'create'])->name('cars.create');
    // Route::get('cars', [CarController::class,'index'])-> name('cars.index');
    // Route::POST('cars', [CarController::class,'store'])-> name('cars.store');
    // Route::get('cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    // Route::put('cars/{car}', [CarController::class, 'update'])->name('cars.update');
    // Route::delete('cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
});
