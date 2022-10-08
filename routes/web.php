<?php

use App\Http\Controllers\back\AdminController;
use App\Http\Controllers\back\ArticleController;
use App\Http\Controllers\back\BlogController;
use App\Http\Controllers\back\CampusController;
use App\Http\Controllers\back\HomePageController;
use App\Http\Controllers\back\NewsController;
use App\Http\Controllers\back\SettingController;
use App\Http\Controllers\back\StudioController;
use App\Http\Controllers\back\TeamController;
use App\Http\Controllers\front\ViewController;
use App\Http\Controllers\back\TrainingController;
use App\Models\Studiocategorie;
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
    Route::get('/ekibimiz/{slug}', [ViewController::class, 'team_detail'])->name('team.detail');
    Route::get('/kurumsal', [ViewController::class, 'company'])->name('company');
    Route::get('/atolye', [ViewController::class, 'studio'])->name('studio');
    Route::get('/egitimler', [ViewController::class, 'training'])->name('training');
    Route::get('/haberler', [ViewController::class, 'news'])->name('news');
    Route::post('haber', [ViewController::class, 'fresh'])->name('fresh');
    Route::get('/haberler/{slug}', [ViewController::class, 'news_detail'])->name('news.detail');
    Route::get('/iletisim', [ViewController::class, 'contact'])->name('contact');
    Route::get('/kampus', [ViewController::class, 'campus'])->name('campus');
    Route::get('/neden-biz', [ViewController::class, 'firm'])->name('firm');
    Route::get('/blog', [ViewController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}',[ViewController::class,'blog_detail'])->name('blog.detail');
    Route::get('/blog/{categorie}/{slug}',[ViewController::class,'blog_article'])->name('article');
    Route::get('/atolye/workshop',[ViewController::class,'workshops'])->name('workshops');
    Route::get('/atolye/workshop/{slug}',[ViewController::class,'workshop_detail'])->name('workshop.detail');
    Route::get('/atolye/{slug}',[ViewController::class,'studio_detail'])->name('studio.detail');
    Route::get('/atolye/{categorie}/{slug}',[ViewController::class,'studio_article'])->name('studio.article');
    Route::post('/email', [ViewController::class, 'email'])->name('email');
    Route::post('/return', [ViewController::class, 'return'])->name('return');
    Route::get('/form',[ViewController::class,'form'])->name('form');
    Route::post('/application',[ViewController::class,'application'])->name('application');
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
    Route::get('/atolye/delete/{id}', [StudioController::class, 'destroy'])->whereNumber('id')->name('atolye.delete');
    Route::put('/atolye/status', [StudioController::class, 'status'])->name('atolye.status');
    Route::resource('atolye', StudioController::class);
    Route::get('/kapus/delete/{id}', [CampusController::class, 'destroy'])->whereNumber('id')->name('kampus.delete');
    Route::post('/kampus/olustur', [CampusController::class, 'store'])->name('kampus.store');
    Route::resource('kampus', CampusController::class);
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->whereNumber('id')->name('blog.delete');
    Route::put('/blog/status', [BlogController::class, 'status'])->name('blog.status');
    Route::get('/blog/kategori', [BlogController::class, 'category'])->name('blog.category');
    Route::post('/blog/kategori/', [BlogController::class, 'category_post'])->name('blog.category.post');
    Route::get('/blog/kategori/delete/{id}', [BlogController::class, 'category_delete'])->name('blog.category.delete');
    Route::resource('blog', BlogController::class);
    Route::get('/ayarlar', [SettingController::class, 'index'])->name('ayarlar.index');
    Route::put('/ayarlar', [SettingController::class, 'update'])->name('ayarlar.update');
});
