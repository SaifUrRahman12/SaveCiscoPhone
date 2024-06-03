<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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

Route::get('pass', function(){
    return Hash::make(123);
});

/*  ........ First loading login page ...... */
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/* .... Admin middleware and whool admin routes .... */
Route::middleware([isAdmin::class])->group(function(){
    Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('profile/list',[AdminController::class, 'ShowProfile'])->name('show.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    /* .... Cisco Phone table route .... */
    Route::get('cisco',[AdminController::class, 'GetCiscoForm'])->name('Get.Cisco.phone');
    Route::post('cisco/store',[AdminController::class, 'StoreCisco'])->name('store.cisco.phone');
    Route::put('update/cisco/{id}',[AdminController::class, 'UpdateCisco'])->name('update.cisco.phone');
    Route::get('delete/cisco/{id}',[AdminController::class, 'DeleteCisco'])->name('delete.cisco');

    Route::get('province',[AdminController::class, 'ShowProvince'])->name('show.admin.province');
    Route::post('province/store',[AdminController::class, 'StoreProvince'])->name('store.province');
    Route::delete('province/delete/{id}',[AdminController::class, 'DeleteProvince'])->name('delete.province');

    /* .... User table routes .... */
    Route::get('user_manage',[AdminController::class, 'get_usermanage'])->name('user.manage');
    Route::post('store_users', [AdminController::class, 'storeUsers'])->name('store.users');
    Route::get('delete_user/{id}',[AdminController::class, 'DeleteUser'])->name('delete.user');
    Route::put('update/user/{id}', [AdminController::class, 'UpdateUser'])->name('update.user');
});

/* .... if user have agent role this is all routes .... */
Route::prefix('user/')->group(function(){
    Route::get('home', [UserHomeController::class, 'index'])->name('user.home');
    Route::get('logout', [UserHomeController::class, 'UserLogout'])->name('user.logout');
    Route::post('profile/store', [UserHomeController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('user/cisco',[UserHomeController::class, 'GetUserCisco'])->name('Get.Cisco');
    Route::post('user/cisco/store',[UserHomeController::class, 'StoreUserCisco'])->name('store.cisco');
    Route::put('user/update/cisco/{id}',[UserHomeController::class, 'UpdateUserCisco'])->name('update.cisco');

    Route::get('user/province',[UserHomeController::class, 'ShowUserProvince'])->name('show.province');

});



