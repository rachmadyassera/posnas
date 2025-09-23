<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ConfrenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

// ====================== GUEST ====================================
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
Auth::routes(['register' => false, 'reset' => false, 'confirm' => false, 'verify' => false]);

Route::get('/presence/check-in/{id}', 'App\Http\Controllers\PresenceController@check_in')->name('presence.check-in');
Route::get('/presence/validation/{id}', 'App\Http\Controllers\PresenceController@presence_detail')->name('presence.validation');
Route::post('/presence/store', 'App\Http\Controllers\PresenceController@store')->name('presence.store');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/user/json', [\App\Http\Controllers\UserController::class, 'json'])->name('user.json');
// Route::resource('catalog', CatalogController::class)->only('index');

// ======================= ALL ROLE ===================================
Route::resource('dashboard', DashboardController::class)->middleware('can:isAdminOperator');
Route::get('/profil', 'App\Http\Controllers\ProfilController@index')->name('profil.index')->middleware('can:isAdminOperator');
Route::put('/profil/change-password', 'App\Http\Controllers\ProfilController@change_password')->name('profil.change-password')->middleware('can:isAdminOperator');

// ========================= SUPER ADMIN ==============================

Route::group(['middleware' => ['role:superadmin']], function () {

    // Main Menu
    Route::resource('user', UserController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::get('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
    Route::get('/user/reset-pass/{id}', 'App\Http\Controllers\UserController@reset_pass')->name('user.reset-pass');
    Route::get('/organization/disable/{id}', 'App\Http\Controllers\OrganizationController@disable');
    Route::resource('organization', OrganizationController::class);

    // Agenda
    Route::get('/all-activity', 'App\Http\Controllers\ActivityController@all_activity')->name('all-activity');

    // Presensi
    Route::get('/get-all-location', 'App\Http\Controllers\LocationController@all_location')->name('location.get-all');

});

//  Route::resource('permission', PermissionController::class)->middleware(['role_or_permission:superadmin|permission-list']);

// ========================== ADMIN ====================================
Route::group(['middleware' => ['role:admin']], function () {

    // Main Menu
    Route::get('/operator', 'App\Http\Controllers\UserController@operator')->name('operator');
    Route::get('/operator/create-operator', 'App\Http\Controllers\UserController@create_operator')->name('create-operator');
    Route::post('/store-operator', 'App\Http\Controllers\UserController@store_operator')->name('store-operator');
    Route::get('/operator/edit-operator/{id}', 'App\Http\Controllers\UserController@edit_operator')->name('edit-operator');
    Route::put('/update-operator', 'App\Http\Controllers\UserController@update_operator')->name('update-operator');
    Route::get('/disable-operator/{id}', 'App\Http\Controllers\UserController@disable_operator')->name('disable-operator');
    Route::get('/user/reset-pass-operator/{id}', 'App\Http\Controllers\UserController@reset_pass_operator')->name('reset-pass-operator');

    // Agenda
    Route::get('/activity/search', 'App\Http\Controllers\ActivityController@search_activity')->name('activity.search');
    Route::get('/activity/detail/{id}', 'App\Http\Controllers\ActivityController@detail_master_activity')->name('activity.show-detail');

    // Presensi
    Route::get('/generatepdf-participant/{id}', 'App\Http\Controllers\ConfrenceController@generate_pdf')->name('confrence.generatepdf');
    Route::get('/generatepdf-qrcode/{id}', 'App\Http\Controllers\ConfrenceController@generate_pdf_qrcode')->name('confrence.generatepdf-qrcode');
    Route::get('/get-all-confrence', 'App\Http\Controllers\ConfrenceController@all_confrence')->name('confrence.get-all');
    Route::get('/all-participant-confrence/{id}', 'App\Http\Controllers\ConfrenceController@all_participant_confrence')->name('confrence.all-participant-confrence');
    Route::get('/generate_all_confrence_pdf', 'App\Http\Controllers\ConfrenceController@generate_all_confrence_pdf')->name('confrence.generatepdf-all-confrence');

});

// ================================= OPERATOR =======================================

Route::group(['middleware' => ['role:umum']], function () {});

// ========================== BY PERMISSION MIX ROLE =================================

// AGENDA
Route::get('/activity/cancel/{id}', 'App\Http\Controllers\ActivityController@cancel_activity')->name('activity.cancel-activity')->middleware(['role_or_permission:admin|agenda-cancel']);
Route::get('/activity/savepdf/{id}', 'App\Http\Controllers\ActivityController@savePdf')->name('activity.savepdf')->middleware('role_or_permission:admin|agenda-download');
Route::post('/activity/download-report', 'App\Http\Controllers\ActivityController@downloadReport')->name('activity.download')->middleware('role_or_permission:admin|agenda-download');
Route::post('/activity/download-timeline', 'App\Http\Controllers\ActivityController@downloadTimeline')->name('activity.downloadTimeline')->middleware('role_or_permission:admin|agenda-download');
Route::post('/activity/search-result', 'App\Http\Controllers\ActivityController@get_activity')->name('activity.searching')->middleware('role_or_permission:admin|agenda-search');
Route::get('/activity/approve/{id}', 'App\Http\Controllers\ActivityController@approve_activity')->name('activity.approve')->middleware('role_or_permission:admin|agenda-edit');
Route::get('/activity/my', 'App\Http\Controllers\ActivityController@index')->name('my.activity')->middleware('role_or_permission:admin|agenda-list');
Route::get('/activity/show/{id}', 'App\Http\Controllers\ActivityController@detail_activity')->name('show-activity')->middleware('role_or_permission:admin|agenda-read');
Route::post('/activity/add-notes', 'App\Http\Controllers\ActivityController@store_notes')->name('activity.store-notes')->middleware('role_or_permission:admin|note-create');
Route::get('/activity/delete-note/{id}', 'App\Http\Controllers\ActivityController@deleteNote')->name('activity.delete-note')->middleware('role_or_permission:admin|note-delete');
Route::get('/activity/report', 'App\Http\Controllers\ActivityController@report_activity')->name('activity.report')->middleware('role_or_permission:admin|agenda-download');
Route::get('/activity/export', 'App\Http\Controllers\ActivityController@searchActivity')->name('activity.search')->middleware('role_or_permission:admin|agenda-download');

// PRESENSI
Route::get('/confrence/disable/{id}', 'App\Http\Controllers\ConfrenceController@disable')->middleware('role_or_permission:admin|presensi-delete');
Route::get('/presence/disable/{id}', 'App\Http\Controllers\PresenceController@disable_participant')->middleware('role_or_permission:admin|participant-delete');
Route::get('/location/disable/{id}', 'App\Http\Controllers\LocationController@disable')->middleware(['role_or_permission:admin|location-delete']);


// ========================== BY MIX ROLES =================================

Route::group(['middleware' => ['role:admin|umum']], function () {
    // AGENDA
    Route::resource('activity', ActivityController::class);

    //PRESENSI
    Route::resource('location', LocationController::class);
    Route::resource('confrence', ConfrenceController::class);

});


