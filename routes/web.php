<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\NiveausController;
use App\Http\Controllers\LivresController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ContactFController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockCommercialController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\ContactsEController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\ResultatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome Route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard Route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoriesController::class);
    Route::resource('niveaux', NiveausController::class);
    Route::resource('fournisseurs', FournisseurController::class);
    Route::resource('livres', LivresController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('contactF', ContactFController::class);
    Route::resource('livraisons', LivraisonController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('users', UserController::class);
    Route::resource('resultats', ResultatController::class);
    Route::resource('stockCommercials', StockCommercialController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('villes', VilleController::class);
    Route::resource('ecoles', EcoleController::class);
    Route::resource('contactes', ContactsEController::class);
    Route::resource('visites', VisiteController::class);

});


// Include Auth Routes
require __DIR__ . '/auth.php';





