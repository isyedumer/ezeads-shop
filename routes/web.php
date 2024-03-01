<?php
use App\Http\Controllers\Search\SearchDropdownController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/get-search-location', [SearchDropdownController::class, 'getSearchLocation'])->name('get-search-location');
Route::get('/get-post-ezead', [SearchDropdownController::class, 'getPostEzead'])->name('get-post-ezead');