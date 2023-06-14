<?php

use App\Http\Controllers\AdminControllers\AboutController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\DefaultConfigController;
use App\Http\Controllers\AdminControllers\FaqController;
use App\Http\Controllers\AdminControllers\ContactController;
use App\Http\Controllers\AdminControllers\ResumeSectionController;
use App\Http\Controllers\ShowControllers\ShowController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('administration')->group(function () {
    Auth::routes();

    Route::get('tableau-de-bord', [DashboardController::class, 'index'])->name('dash.index');

    // CONFIGURATION PAR DEFAUT
    Route::get('configuration-resume-section', [ResumeSectionController::class, 'index'])->name('config_section.index');
    Route::post('/configuration-resume-section', [ResumeSectionController::class, 'store'])->name('config_section.store');
    Route::patch('/config_sectionuration-resume-section/{id}/update', [ResumeSectionController::class, 'update'])->name('config_section.update');

    // FOLDERS
    Route::get('/dossier/{id?}', [FolderController::class, 'index'])->name('folder.index');
    Route::post('/dossier', [FolderController::class, 'store'])->name('folder.store');
    Route::patch('/dossier/{id}/update', [FolderController::class, 'update'])->name('folder.update');
    Route::delete('/dossier/{id}/destroy', [FolderController::class, 'destroy'])->name('folder.destroy');
    // Route::get('/dossiers-supprimes', [TrashController::class, 'trashFolders'])->name('folder.trash');
    Route::patch('/dossier/{id}/restore', [FolderController::class, 'restore'])->name('folder.restore');

    // FAQ
    Route::get('/foire-aux-questions/{id?}', [FaqController::class, 'index'])->name('faq.index');
    Route::post('/foire-aux-questions', [FaqController::class, 'store'])->name('faq.store');
    Route::patch('/foire-aux-questions/{id}/update', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/foire-aux-questions/{id}/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::get('/foire-aux-questions-supprimes', [FaqController::class, 'trash'])->name('faq.trash');
    Route::patch('/foire-aux-questions/{id}/restore', [FaqController::class, 'restore'])->name('faq.restore');

    // CONTACT
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::patch('/contact/{id}/update', [ContactController::class, 'update'])->name('contact.update');

    // ABOUT
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about', [AboutController::class, 'store'])->name('about.store');
    Route::patch('/about/{id}/update', [AboutController::class, 'update'])->name('about.update');

    // Route::get('foire-aux-questions', [FaqController::class, 'index'])->name('faq.index');
    // Route::post('/foire-aux-questions', [FaqController::class, 'store'])->name('faq.store');
    // Route::patch('/foire-aux-questions/{id}/update', [FaqController::class, 'update'])->name('faq.update');
    // Route::delete('/faq/{id}/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
    // // Route::get('/faqs-supprimes', [TrashController::class, 'trashFaq'])->name('faq.trash');
    // Route::patch('/faq/{id}/restore', [FaqController::class, 'restore'])->name('faq.restore');
});

Route::redirect('/', '/accueil'); // renvoie sur la page d'accueil
Route::get('/accueil', [ShowController::class, 'index'])->name("show.index"); // renvoie sur la page d'accueil

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
