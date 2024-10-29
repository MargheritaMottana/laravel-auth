<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;

use App\Http\Controllers\Cartella\ProjectController;

//  Model
use App\Models\Project;

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
    // per testare il collegamento con il database, mi salvo i movies
	$projects = Project::all();
    // la funzione “all()” permette di recuperare tutte le righe della tabella
    return view('welcome');
    // e li mostro in pagina
    dd($projects);
});

Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

    Route::get('/dashboard', [AdminMainController::class, 'dashboard'])->name('dashboard');

});

require __DIR__.'/auth.php';
