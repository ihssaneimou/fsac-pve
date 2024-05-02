<?php

use App\Http\Controllers\etudiantController;
use App\Http\Controllers\examenController;
use App\Http\Controllers\surveillantController;
use App\Http\Controllers\affectationController;
use App\Http\Controllers\departementController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\localController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PVController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\signerController;
use Illuminate\Http\Request;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\associerController;
use App\Http\Controllers\controlercontroller;
use App\Http\Controllers\tabletteController;
use App\Http\Controllers\gererController;
use App\Http\Controllers\passerController;
use App\Http\Controllers\sessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('filiere',[FiliereController::class,'index']);

Route::post('filiere/create',[FiliereController::class,'store']);
Route::put('filiere/edit/{filiere}',[FiliereController::class,'update']);
Route::delete('filiere/{filiere}',[FiliereController::class,'delete']);


Route::get('module',[ModuleController::class,'index']);

Route::post('module/create',[ModuleController::class,'store']);
Route::put('module/edit/{module}',[ModuleController::class,'update']);
Route::delete('module/{module}',[ModuleController::class,'delete']);

Route::get('etudiant',[etudiantController::class,'index']);

Route::post('etudiant/create',[etudiantController::class,'store']);
Route::put('etudiant/edit/{etudiant}',[etudiantController::class,'update']);
Route::delete('etudiant/{etudiant}',[etudiantController::class,'delete']);


Route::get('surveillant',[surveillantController::class,'index']);

Route::post('surveillant/create',[surveillantController::class,'store']);
Route::put('surveillant/edit/{surveillant}',[surveillantController::class,'update']);
Route::delete('surveillant/{surveillant}',[surveillantController::class,'delete']);


Route::post('pv/create',[PVController::class,'store']);
Route::put('pv/edit/{pv}',[PVController::class,'update']);
Route::delete('pv/{pv}',[PVController::class,'delete']);

Route::post('rapport/create',[RapportController::class,'store']);
Route::put('rapport/edit/{rapport}',[RapportController::class,'update']);
Route::delete('rapport/{rapport}',[RapportController::class,'delete']);



Route::get('departement',[departementController::class,'index']);

Route::post('departement/create',[departementController::class,'store']);
Route::put('departement/edit/{departement}',[departementController::class,'update']);
Route::delete('departement/{departement}',[departementController::class,'delete']);
 
Route::get('administrateur',[AdministrateurController::class,'index']);
Route::post('administrateur/create',[AdministrateurController::class,'store']);
Route::put('administateur/edit/{administrateur}',[AdministrateurController::class,'update']);
Route::delete('administrateur/{administrateur}',[AdministrateurController::class,'delete']);

Route::get('tablette',[tabletteController::class,'index']);
Route::post('tablette/create',[tabletteController::class,'store']);
Route::put('tablette/edit/{tablette}',[tabletteController::class,'update']);
Route::delete('tablette/{tablette}',[tabletteController::class,'delete']) ;

Route::get('session',[sessionController::class,'index']);
Route::post('session/create',[sessionController::class,'store']);
Route::put('session/edit/{tablette}',[sessionController::class,'update']);
Route::delete('session/{tablette}',[sessionController::class,'delete']) ;

Route::get('gerer',[gererController::class,'index']);
Route::post('gerer/create',[gererController::class,'store']);
Route::put('gerer/edit/{gerer}',[gererController::class,'update']);
Route::delete('gerer/{gerer}',[gererController::class,'delete']);


Route::get('controler',[controlercontroller::class,'index']);
Route::post('controler/create',[controlerController::class,'store']);
Route::put('controler/edit/{controler}',[controlercontroller::class,'update']);
Route::delete('controler/{controler}',[controlerController::class,'delete']);

Route::get('affectation',[affectationController::class,'index']);

Route::post('affectation/create',[affectationController::class,'store']);
Route::put('affectation/edit/{affectation}',[affectationController::class,'update']);
Route::delete('affectation/{affectation}',[affectationController::class,'delete']);
 
Route::get('local',[localController::class,'index']);

Route::post('local/create',[localController::class,'store']);
Route::put('local/edit/{local}',[localController::class,'update']);
Route::delete('local/{local}',[localController::class,'delete']);

Route::get('examen',[examenController::class,'index']);

Route::post('examen/create',[examenController::class,'store']);
Route::put('examen/edit/{examen}',[examenController::class,'update']);
Route::delete('examen/{examen}',[examenController::class,'delete']);

Route::get('signer',[signerController::class,'index']);

Route::post('signer/create',[signerController::class,'store']);
Route::put('signer/edit/{signer}',[signerController::class,'update']);
Route::delete('signer/{signer}',[signerController::class,'delete']);

Route::get('passer',[passerController::class,'index']);

Route::post('passer/create',[passerController::class,'store']);
Route::put('passer/edit/{passer}',[passerController::class,'update']);
Route::delete('passer/{passer}',[passerController::class,'delete']);


Route::get('associer',[associerController::class,'index']);

Route::post('associer/create',[associerController::class,'store']);
Route::put('associer/edit/{associer}',[associerController::class,'update']);
Route::delete('associer/{associer}',[associerController::class,'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});
