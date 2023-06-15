<?php

use App\Http\Controllers\AdminControllers\AboutController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\DefaultConfigController;
use App\Http\Controllers\AdminControllers\FaqController;
use App\Http\Controllers\AdminControllers\ContactController;
use App\Http\Controllers\AdminControllers\GalleryController;
use App\Http\Controllers\AdminControllers\PostController;
use App\Http\Controllers\AdminControllers\ResumeSectionController;
use App\Http\Controllers\AdminControllers\TeamController;
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
    Route::patch('/config_sectionuration-resume-section/{id}/modification', [ResumeSectionController::class, 'update'])->name('config_section.update');

    // FOLDERS
    Route::get('/dossier/{id?}', [FolderController::class, 'index'])->name('folder.index');
    Route::post('/dossier', [FolderController::class, 'store'])->name('folder.store');
    Route::patch('/dossier/{id}/modification', [FolderController::class, 'update'])->name('folder.update');
    Route::delete('/dossier/{id}/destroy', [FolderController::class, 'destroy'])->name('folder.destroy');
    // Route::get('/dossiers-supprimes', [TrashController::class, 'trashFolders'])->name('folder.trash');
    Route::patch('/dossier/{id}/restauration', [FolderController::class, 'restore'])->name('folder.restore');

    // FAQ
    Route::get('/foire-aux-questions/{id?}', [FaqController::class, 'index'])->name('faq.index');
    Route::post('/foire-aux-questions', [FaqController::class, 'store'])->name('faq.store');
    Route::patch('/foire-aux-questions/{id}/modification', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/foire-aux-questions/{id}/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
    Route::get('/foire-aux-questions-supprimes', [FaqController::class, 'trash'])->name('faq.trash');
    Route::patch('/foire-aux-questions/{id}/restauration', [FaqController::class, 'restore'])->name('faq.restore');

    // CONTACT
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::patch('/contact/{id}/modification', [ContactController::class, 'update'])->name('contact.update');

    // ABOUT
    Route::get('a-propos', [AboutController::class, 'index'])->name('about.index');
    Route::post('/a-propos', [AboutController::class, 'store'])->name('about.store');
    Route::patch('/a-propos/{id}/modification', [AboutController::class, 'update'])->name('about.update');

    // POST
    Route::get('poste/{id?}', [PostController::class, 'index'])->name('post.index');
    Route::post('/poste', [PostController::class, 'store'])->name('post.store');
    Route::patch('/poste/{id}/modification', [PostController::class, 'update'])->name('post.update');
    Route::delete('/poste/{id}/suppression', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('postes-supprimes', [PostController::class, 'trash'])->name('post.trash');
    Route::patch('/poste/{id}/restauration', [PostController::class, 'restore'])->name('post.restore');

    // TEAM
    Route::get('equipe/{id?}', [TeamController::class, 'index'])->name('team.index');
    Route::post('/nouveau-membre', [TeamController::class, 'store'])->name('team.store');
    Route::patch('/membre/{id}/modification', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/membre/{id}/suppression', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::get('membres-supprimes', [TeamController::class, 'trash'])->name('team.trash');
    Route::patch('/membres/{id}/restauration', [TeamController::class, 'restore'])->name('faq.restore');

    // GALLERY
    Route::get('gallerie/{id?}', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallerie', [GalleryController::class, 'store'])->name('gallery.store');
    Route::patch('/gallerie/{id}/modification', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallerie/{id}/suppression', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::get('gallerie-photos-supprimees', [GalleryController::class, 'trash'])->name('gallery.trash');
    Route::patch('/gallerie/{id}/restauration', [GalleryController::class, 'restore'])->name('gallery.restore');

    // Route::get('foire-aux-questions', [FaqController::class, 'index'])->name('faq.index');
    // Route::post('/foire-aux-questions', [FaqController::class, 'store'])->name('faq.store');
    // Route::patch('/foire-aux-questions/{id}/modification', [FaqController::class, 'update'])->name('faq.update');
    // Route::delete('/faq/{id}/destroy', [FaqController::class, 'destroy'])->name('faq.destroy');
    // // Route::get('/faqs-supprimes', [TrashController::class, 'trashFaq'])->name('faq.trash');
    // Route::patch('/faq/{id}/restauration', [FaqController::class, 'restore'])->name('faq.restore');
});

Route::redirect('/', '/accueil'); // renvoie sur la page d'accueil
Route::get('/accueil', [ShowController::class, 'index'])->name("show.index"); // renvoie sur la page d'accueil

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
