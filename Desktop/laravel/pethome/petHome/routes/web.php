<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\AdresseController;

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

Route::get('/', function () {
    return view('welcome');
});

// Routes pour l'authentification
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes pour les catégories
Route::resource('categories', CategorieController::class);

// Routes pour les animaux
Route::resource('animaux', AnimalController::class);
Route::get('/animaux/categorie/{categorie}', [AnimalController::class, 'getByCategory'])->name('animaux.by.category');
Route::get('/animaux/search', [AnimalController::class, 'search'])->name('animaux.search');

// Routes pour les avis
Route::resource('avis', AvisController::class);
Route::get('/avis/animal/{animal}', [AvisController::class, 'getByAnimal'])->name('avis.by.animal');

// Routes protégées par authentification
Route::middleware('auth')->group(function () {
    // Routes pour les adresses
    Route::resource('adresses', AdresseController::class);

    // Routes pour les commandes
    Route::resource('commandes', CommandeController::class);

    // Routes pour les paiements
    Route::resource('paiements', PaiementController::class);
});
