<?php

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\back\HomePageController;
use App\Http\Controllers\back\NewsController;
use App\Http\Controllers\back\TeamController;
use App\Http\Controllers\front\ViewController;
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

Route::middleware('web')->group(function () {
    Route::get('/', [ViewController::class, 'index'])->name('index');
    Route::get('/ekibimiz', [ViewController::class, 'team'])->name('team');
    Route::get('/kurumsal', [ViewController::class, 'company'])->name('company');
    Route::get('/detay', [ViewController::class, 'team_detail'])->name('team.detail');
    Route::get('/atolye', [ViewController::class, 'studio'])->name('studio');
    Route::get('/egitimler', [ViewController::class, 'training'])->name('training');
    Route::get('/haberler', [ViewController::class, 'news'])->name('news');
    Route::get('/haber-detay', [ViewController::class, 'news_detail'])->name('news.detail');
    Route::get('/iletisim', [ViewController::class, 'contact'])->name('contact');
    Route::get('/kampus', [ViewController::class, 'campus'])->name('campus');
    Route::get('/neden-biz', [ViewController::class, 'firm'])->name('firm');
    Route::get('/workshoplar', [ViewController::class, 'workshop'])->name('workshop');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'login_post'])->name('login.post');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/slaytlar/delete/{id}', [HomePageController::class, 'destroy'])->whereNumber('id')->name('slaytlar.delete');
    Route::put('/slaytlar/status',[HomePageController::class,'status'])->name('slaytlar.status');
    Route::resource('slaytlar', HomePageController::class);
    Route::get('/ekibimiz/delete/{id}', [TeamController::class, 'destroy'])->whereNumber('id')->name('ekibimiz.delete');
    Route::put('/ekibimiz/status',[TeamController::class,'status'])->name('ekibimiz.status');
    Route::resource('ekibimiz', TeamController::class);
    Route::resource('haberler',NewsController::class);
});
