<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
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

//====================== GUEST ====================================
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/user/json', [\App\Http\Controllers\UserController::class, 'json'])->name('user.json');
// Route::resource('catalog', CatalogController::class)->only('index');

// ======================= ALL ROLE ==================================
Route::resource('dashboard', DashboardController::class)->middleware('can:isAdminOperator');
Route::get('/profil', 'App\Http\Controllers\ProfilController@index')->name('profil.index')->middleware('can:isAdminOperator');
Route::put('/profil/change-password', 'App\Http\Controllers\ProfilController@change_password')->name('profil.change-password')->middleware('can:isAdminOperator');


//========================= SUPER ADMIN ===============================

Route::resource('user', UserController::class)->middleware('can:isSAdmin');
Route::get('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy')->middleware('can:isSAdmin');
Route::get('/user/reset-pass/{id}', 'App\Http\Controllers\UserController@reset_pass')->name('user.reset-pass')->middleware('can:isSAdmin');

Route::resource('organization', OrganizationController::class)->middleware('can:isSAdmin');

Route::get('/organization/disable/{id}', 'App\Http\Controllers\OrganizationController@disable')->middleware('can:isSAdmin');


//========================== ADMIN ====================================
Route::get('/operator', 'App\Http\Controllers\UserController@operator')->name('operator')->middleware('can:isAdmin');
Route::get('/create-operator', 'App\Http\Controllers\UserController@create_operator')->name('create-operator')->middleware('can:isAdmin');
Route::post('/store-operator', 'App\Http\Controllers\UserController@store_operator')->name('store-operator')->middleware('can:isAdmin');
Route::get('/edit-operator/{id}', 'App\Http\Controllers\UserController@edit_operator')->name('edit-operator')->middleware('can:isAdmin');
Route::put('/update-operator', 'App\Http\Controllers\UserController@update_operator')->name('update-operator')->middleware('can:isAdmin');
Route::get('/disable-operator/{id}', 'App\Http\Controllers\UserController@disable_operator')->name('disable-operator')->middleware('can:isAdmin');
Route::get('/user/reset-pass-operator/{id}', 'App\Http\Controllers\UserController@reset_pass_operator')->name('reset-pass-operator')->middleware('can:isAdmin');

Route::put('/activity/approve-activity', 'App\Http\Controllers\ActivityController@approve_activity')->name('activity.approve-activity')->middleware('can:isAdmin');
Route::get('/cancel-activity/{id}', 'App\Http\Controllers\ActivityController@cancel_activity')->name('activity.cancel-activity')->middleware('can:isAdminOperator');
Route::get('/search-activity', 'App\Http\Controllers\ActivityController@search_activity')->name('activity.search')->middleware('can:isAdmin');
Route::post('/get-activity', 'App\Http\Controllers\ActivityController@get_activity')->name('activity.searching')->middleware('can:isAdmin');
Route::get('/full-detail-activity/{id}', 'App\Http\Controllers\ActivityController@detail_master_activity')->name('activity.full-detail-activity')->middleware('can:isAdmin');
Route::get('/savepdf/{id}', 'App\Http\Controllers\ActivityController@savePdf')->name('activity.savepdf')->middleware('can:isAdmin');
Route::get('/report-activity', 'App\Http\Controllers\ActivityController@report_activity')->name('activity.report')->middleware('can:isAdmin');
Route::post('/download-report', 'App\Http\Controllers\ActivityController@downloadReport')->name('activity.download')->middleware('can:isAdmin');
Route::get('/timeline-activity', 'App\Http\Controllers\ActivityController@timelineActivity')->name('activity.timeline')->middleware('can:isAdmin');
Route::post('/download-timeline', 'App\Http\Controllers\ActivityController@downloadTimeline')->name('activity.downloadTimeline')->middleware('can:isAdmin');
Route::resource('activity', ActivityController::class)->middleware('can:isAdmin');




//========================== OPERATOR =================================
Route::get('/activity-detail/{id}', 'App\Http\Controllers\ActivityController@detail_activity')->name('activity.detail')->middleware('can:isOperator');
Route::post('/add-notes-evaluation', 'App\Http\Controllers\ActivityController@store_notes')->name('activity.store-notes')->middleware('can:isOperator');
Route::get('/delete-note/{id}', 'App\Http\Controllers\ActivityController@deleteNote')->name('activity.delete-note')->middleware('can:isOperator');

