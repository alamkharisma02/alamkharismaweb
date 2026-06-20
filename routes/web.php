<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicProjectController;
use App\Http\Controllers\PublicArticleController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\HeroSlideController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [HomeController::class, 'services'])->name('services');
Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/galeri-video', [HomeController::class, 'videoGallery'])->name('video_gallery');
Route::get('/testimoni', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::post('/kontak', [HomeController::class, 'submitContact'])->name('contact.submit');

Route::get('/portofolio', [PublicProjectController::class, 'index'])->name('projects.index');
Route::get('/portofolio/{slug}', [PublicProjectController::class, 'show'])->name('projects.show');

Route::get('/artikel', [PublicArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{slug}', [PublicArticleController::class, 'show'])->name('articles.show');

// Helper route untuk migrasi database di Hostinger
Route::get('/run-migration', function () {
    if (request('key') !== 'akbadmin123') {
        return 'Akses ditolak. Gunakan URL: /run-migration?key=akbadmin123';
    }

    try {
        if (config('database.default') === 'sqlite') {
            $dbPath = config('database.connections.sqlite.database');
            if (!file_exists($dbPath)) {
                $dir = dirname($dbPath);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
                touch($dbPath);
            }
        }

        \Artisan::call('migrate', [
            '--force' => true
        ]);

        return 'Migrasi dan seeder database berhasil dijalankan di Hostinger!';
    } catch (\Exception $e) {
        return 'Terjadi error: ' . $e->getMessage();
    }
});

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin', [AuthController::class, 'authenticate'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Projects CRUD
    Route::resource('projects', ProjectController::class)->names([
        'index' => 'admin.projects.index',
        'create' => 'admin.projects.create',
        'store' => 'admin.projects.store',
        'edit' => 'admin.projects.edit',
        'update' => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
    ])->except(['show']);

    // Hero Slides CRUD
    Route::resource('hero-slides', HeroSlideController::class)->names([
        'index' => 'admin.hero_slides.index',
        'create' => 'admin.hero_slides.create',
        'store' => 'admin.hero_slides.store',
        'edit' => 'admin.hero_slides.edit',
        'update' => 'admin.hero_slides.update',
        'destroy' => 'admin.hero_slides.destroy',
    ])->except(['show']);

    // Articles CRUD
    Route::resource('articles', AdminArticleController::class)->names([
        'index' => 'admin.articles.index',
        'create' => 'admin.articles.create',
        'store' => 'admin.articles.store',
        'edit' => 'admin.articles.edit',
        'update' => 'admin.articles.update',
        'destroy' => 'admin.articles.destroy',
    ])->except(['show']);



    // Global Settings CRUD
    Route::get('settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('admin.settings.update');

    // Testimonials CRUD
    Route::resource('testimonials', TestimonialController::class)->names([
        'index' => 'admin.testimonials.index',
        'create' => 'admin.testimonials.create',
        'store' => 'admin.testimonials.store',
        'edit' => 'admin.testimonials.edit',
        'update' => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy',
    ])->except(['show']);

    // Videos CRUD
    Route::resource('videos', VideoController::class)->names([
        'index' => 'admin.videos.index',
        'create' => 'admin.videos.create',
        'store' => 'admin.videos.store',
        'edit' => 'admin.videos.edit',
        'update' => 'admin.videos.update',
        'destroy' => 'admin.videos.destroy',
    ])->except(['show']);
});
