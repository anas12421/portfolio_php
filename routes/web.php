<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
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

// Index View
Route::get('/', [FrontendController::class , 'home'])->name('home');

// Route::get('/', function () {
    //     return view('welcome');
    // });



    // Dashboard View
    Route::get('/dashboard', [HomeController::class , 'dashboard'])->middleware(['auth', 'verified'])->name('dash');
    // Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dash');

    // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth', 'verified'])->name('dashboard');

        // Route::middleware('auth')->group(function () {
        //         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        //         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        //         Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        //     });

            require __DIR__.'/auth.php';



// profile
Route::get('/user/profile', [UserController::class , 'user_profile'])->name('user.profile');
Route::post('/user/info/update', [UserController::class , 'user_info_update'])->name('user.info.update');
Route::post('/user/password/update', [UserController::class , 'password_update'])->name('password.update');
Route::post('/user/photo/update', [UserController::class , 'photo_update'])->name('photo.update');
Route::get('/user/list', [UserController::class , 'user_list'])->name('user.list');
Route::get('/user/delete/{id}', [UserController::class , 'user_delete'])->name('user.delete');
Route::get('/user/edit/view/{id}', [UserController::class , 'user_edit_view'])->name('user.edit.view');
Route::post('/user/add', [UserController::class , 'user_add'])->name('user.add');
Route::post('/user/update/{id}', [UserController::class , 'user_update'])->name('user.update');


// Menu
Route::get('/menu/list', [MenuController::class , 'menu'])->name('menu');
Route::post('/menu/store', [MenuController::class , 'menu_store'])->name('menu.store');
Route::get('/menu/delete/{id}', [MenuController::class , 'menu_delete'])->name('menu.delete');
Route::get('/menu/edit/view/{id}', [MenuController::class , 'menu_edit_view'])->name('menu.edit.view');
Route::post('/menu/edit/{id}', [MenuController::class , 'menu_edit'])->name('menu.edit');


// Meter
Route::get('/meter/list', [MeterController::class , 'meter'])->name('meter');
Route::post('/meter/store', [MeterController::class , 'meter_store'])->name('meter.store');


// Logo
Route::get('/logo/list', [LogoController::class , 'logo'])->name('logo');
Route::post('/logo/store', [LogoController::class , 'logo_store'])->name('logo.store');
Route::get('/logo/status/{id}', [LogoController::class , 'logo_status'])->name('logo.status');
Route::get('/logo/delete/{id}', [LogoController::class , 'logo_delete'])->name('logo.delete');



// Banner
Route::get('/banner/list', [BannerController::class , 'banner'])->name('banner');
Route::post('/banner/update/{id}', [BannerController::class , 'banner_update'])->name('banner.update');



// Feature
Route::get('/feature/list', [FeatureController::class , 'feature'])->name('feature');
Route::post('/feature/store', [FeatureController::class , 'feature_store'])->name('feature.store');
Route::get('/feature/delete/{id}', [FeatureController::class , 'feature_delete'])->name('feature.delete');
Route::get('/feature/edit/view/{id}', [FeatureController::class , 'feature_edit_view'])->name('feature.edit.view');
Route::post('/feature/update/{id}', [FeatureController::class , 'feature_update'])->name('feature.update');



// Feature
Route::get('/service/list', [ServiceController::class , 'service'])->name('service');
Route::post('/service/store', [ServiceController::class , 'service_store'])->name('service.store');
Route::get('/service/delete/{id}', [ServiceController::class , 'service_delete'])->name('service.delete');
Route::get('/service/edit/view/{id}', [ServiceController::class , 'service_edit_view'])->name('service.edit.view');
Route::post('/service/update/{id}', [ServiceController::class , 'service_update'])->name('service.update');

// Work
Route::get('/work/list', [WorkController::class , 'work'])->name('work');
Route::post('/work/store', [WorkController::class , 'work_store'])->name('work.store');
Route::get('/work/delete/{id}', [WorkController::class , 'work_delete'])->name('work.delete');
Route::get('/work/edit/view/{id}', [WorkController::class , 'work_edit_view'])->name('work.edit.view');
Route::post('/work/update/{id}', [WorkController::class , 'work_update'])->name('work.update');

// Skill
Route::get('/skill/list', [SkillController::class , 'skill'])->name('skill');
Route::post('/skill/store', [SkillController::class , 'skill_store'])->name('skill.store');
Route::get('/skill/delete/{id}', [SkillController::class , 'skill_delete'])->name('skill.delete');
Route::get('/skill/edit/view/{id}', [SkillController::class , 'skill_edit_view'])->name('skill.edit.view');
Route::post('/skill/update/{id}', [SkillController::class , 'skill_update'])->name('skill.update');

// Contact
Route::get('/contact/card', [ContactController::class , 'contact_card'])->name('contact.card');
Route::post('/contact/card/update/{id}', [ContactController::class , 'contact_card_update'])->name('contact.card.update');
Route::post('/contact/store', [ContactController::class , 'contact_store'])->name('contact.store');

Route::get('/contact/list', [ContactController::class , 'contact_list'])->name('contact.list');






