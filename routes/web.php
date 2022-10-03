<?php

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\back\ArticleController;
use App\Http\Controllers\back\CategorieController;
use App\Http\Controllers\back\HomePageController;
use App\Http\Controllers\back\NewsController;
use App\Http\Controllers\back\SettingController;
use App\Http\Controllers\back\StudioController;
use App\Http\Controllers\back\TeamController;
use App\Http\Controllers\front\ViewController;
use App\Http\Controllers\back\TrainingController;
use App\Models\Training;
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
    Route::get('/sifreyi-degistir', [AdminController::class, 'password'])->name('password');
    Route::put('/sifreyi-degistir', [AdminController::class, 'password_post'])->name('password.post');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/slaytlar/delete/{id}', [HomePageController::class, 'destroy'])->whereNumber('id')->name('slaytlar.delete');
    Route::put('/slaytlar/status', [HomePageController::class, 'status'])->name('slaytlar.status');
    Route::resource('slaytlar', HomePageController::class);
    Route::get('/ekibimiz/delete/{id}', [TeamController::class, 'destroy'])->whereNumber('id')->name('ekibimiz.delete');
    Route::put('/ekibimiz/status', [TeamController::class, 'status'])->name('ekibimiz.status');
    Route::resource('ekibimiz', TeamController::class);
    Route::get('/haberler/delete/{id}', [NewsController::class, 'destroy'])->whereNumber('id')->name('haberler.delete');
    Route::put('/haberler/status', [NewsController::class, 'status'])->name('haberler.status');
    Route::resource('haberler', NewsController::class);
    Route::get('/egitimler/delete/{id}', [TrainingController::class, 'destroy'])->whereNumber('id')->name('egitimler.delete');
    Route::put('/egitimler/status', [TrainingController::class, 'status'])->name('egitimler.status');
    Route::resource('egitimler', TrainingController::class);
    Route::get('/kategoriler/delete/{id}', [CategorieController::class, 'destroy'])->whereNumber('id')->name('kategoriler.delete');
    Route::put('/kategoriler/status', [CategorieController::class, 'status'])->name('kategoriler.status');
    Route::resource('kategoriler', CategorieController::class);
    Route::resource('article', ArticleController::class);
    Route::get('/atolye/delete/{id}', [ArticleController::class, 'destroy'])->whereNumber('id')->name('atolye.delete');
    Route::put('/atolye/status', [ArticleController::class, 'status'])->name('atolye.status');
    Route::resource('atolye', StudioController::class);
    Route::get('/ayarlar',[SettingController::class,'index'])->name('ayarlar.index');
    Route::put('/ayarlar',[SettingController::class,'update'])->name('ayarlar.update');

});
