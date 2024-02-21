<?php
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AjoutController;
use Illuminate\Support\Facades\Route;



//Route::get('/dashboard/dsic',[AjoutController::class,'index'])->name('ajout.index');
Route::get('/dashboard/dsic/ajout',[AjoutController::class,'afficherFormulaire'])->name('inscription.ajout');
Route::post('/dashboard/dsic/ajout',[AjoutController::class,'store']);
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/inscription', [ControllerUser::class,'afficherFormulaire'])->name('inscription.inscrire');
Route::post('/inscription',[ControllerUser::class,'store']);
Route::get('/modifcompte/{id}/edit',[ControllerUser::class,'edit']);
Route::put('/modifcompte/{id}',[ControllerUser::class,'update']);
Route::delete('/modifcompte/{id}',[ControllerUser::class,'destroy']);

Route::get('/connexion',[ConnexionController::class,'afficherFormulaire'])->name('connexion.login');
Route::post('/logout',function(){
    Auth::logout();
    return redirect('/');
})->name('logout');



// Routes pour les tableaux de bord
Route::post('/connexion', [ConnexionController::class,'connexion']);
Route::get('/dashboard/dg', [DashboardController::class, 'dg'])->name('dashboard.dg');
Route::get('/dashboard/sp', [DashboardController::class, 'sp'])->name('dashboard.sp');
Route::get('/dashboard/dsic',[DashboardController::class,'dsic'])->name('dashboard.dsic');

