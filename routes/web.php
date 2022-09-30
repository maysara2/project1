<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Auth;

Route::prefix(LaravelLocalization::setLocale())->group(function(){



    Route::prefix('admin')->name('admin')->middleware('auth','check_user')
    ->group( function() {

        Route::get('/',[AdminController::class,'index'])->name('index');


        Route::get('categories/trash',[CategoryController::class,'trash'])
        ->name('categories.trash');

        Route::get('categories/{id}/restore',[CategoryController::class,'restore'])
        ->name('categories.restore');

        Route::delete('categories/{id}/forcedelete',[CategoryController::class,'forcedelete'])
        ->name('categories.forcedelete');

        Route::resource('categories',CategoryController::class);







            //products routes
        Route::get('products/trash',[ProductController::class,'trash'])
        ->name('products.trash');

        Route::get('products/{id}/restore',[ProductController::class,'restore'])
        ->name('products.restore');

        Route::delete('products/{id}/forcedelete',[ProductController::class,'forcedelete'])
        ->name('products.forcedelete');

        Route::resource('products',ProductController::class);


    });


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('not_allowed','not_allowed');


Route::get('/',function(){
    return 'فيديو 21  دقيقة 20';
})->name('site.index');
