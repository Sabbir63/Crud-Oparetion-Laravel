<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// AddpeopleController
Route::post('add/people', [App\Http\Controllers\AddpeopleController::class, 'addPeople'])->name('addPeople');
Route::get('all/people', [App\Http\Controllers\AddpeopleController::class, 'allPeople'])->name('allPeople');
Route::get('all/people/edit/{allpeopleId}', [App\Http\Controllers\AddpeopleController::class, 'allPeopleEdit'])->name('allPeopleEdit');
Route::get('all/people/delete/{allpeopleId}', [App\Http\Controllers\AddpeopleController::class, 'allPeopleDelete'])->name('allPeopleDelete');
Route::post('all/people/update/{allpeopleId}', [App\Http\Controllers\AddpeopleController::class, 'allPeopleUpdate'])->name('allPeopleUpdate');

// CategoryController
Route::get('add/category', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('addCategory');
Route::post('category/submit', [App\Http\Controllers\CategoryController::class, 'categorySubmit'])->name('categorySubmit');
Route::get('category/edit/{cateId}', [App\Http\Controllers\CategoryController::class, 'categoryEdit'])->name('categoryEdit');
Route::get('category/delete/{cateId}', [App\Http\Controllers\CategoryController::class, 'categorydelete'])->name('categorydelete');
Route::post('category/update/{cateId}', [App\Http\Controllers\CategoryController::class, 'categoryUpdate'])->name('categoryUpdate');

// SubcategoryController
Route::get('add/subcategory', [App\Http\Controllers\SubcategoryController::class, 'addSubCategory'])->name('addSubCategory');
Route::post('subcategory/submint', [App\Http\Controllers\SubcategoryController::class, 'subcategorySubmit'])->name('subcategorySubmit');
Route::get('subcategory/edit/{subcateId}', [App\Http\Controllers\SubcategoryController::class, 'subcategoryedit'])->name('subcategoryedit');
Route::get('subcategory/delete/{subcateId}', [App\Http\Controllers\SubcategoryController::class, 'subcategorydelete'])->name('subcategorydelete');
Route::post('subcategory/update/{subcateId}', [App\Http\Controllers\SubcategoryController::class, 'subcategoryupdate'])->name('subcategoryupdate');
