<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CertificatesController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\homeController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ScreenshootController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Front\ContactController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('admin', [dashboardController::class, 'index'])->name('adminName');
//home
    Route::get('home.html', [homeController::class, 'index'])->name('home');
    Route::post('homeStore.html', [homeController::class, 'store'])->name('home_store');
    Route::get('homeList.html', [homeController::class, 'list'])->name('homeList');
    Route::delete('homeDelete.html/{home}', [homeController::class, 'Delete'])->name('homeDelete');
    Route::get('homeEdit.html/{home}', [homeController::class, 'Edit'])->name('homeEdit');
    Route::put('homeUpdate/{home}', [homeController::class, 'update'])->name('homeUpdate');

//about
    Route::get('about.html', [AboutUsController::class, 'index'])->name('about');
    Route::post('aboutStore', [AboutUsController::class, 'store'])->name('about_store');
    Route::get('aboutList.html', [AboutUsController::class, 'list'])->name('aboutList');
    Route::delete('aboutDelete.html/{about}', [AboutUsController::class, 'Delete'])->name('aboutDelete');
    Route::get('aboutEdit.html/{about}', [AboutUsController::class, 'Edit'])->name('aboutEdit');
    Route::put('aboutUpdate/{about}', [AboutUsController::class, 'update'])->name('aboutUpdate');
//settings
    Route::get('settings.html', [SettingsController::class, 'index'])->name('settings');
    Route::post('settingStore', [SettingsController::class, 'store'])->name('settingStore');
    //services
    Route::resource('services', ServicesController::class);
    //Certificates
    Route::resource('certificates', CertificatesController::class);
    //Screenshoot
    Route::resource('screenshoot', ScreenshootController::class);
    //Features
    Route::resource('features', FeaturesController::class);

    //Roles
    Route::resource('roles', RolesController::class);
    //Route
    Route::get('listMessage.html', [ContactController::class, 'List_Messages'])->name('listMessage');
    Route::delete('DeleteMessage.html/{contact}', [ContactController::class, 'Delete_Contact'])->name('DeleteMessage');

});
