<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CritereNotationController;
use App\Http\Controllers\Api\EnseignantController;
use App\Http\Controllers\Api\MatiereController;
use App\Http\Controllers\Api\NiveauController;
use App\Http\Controllers\Api\FiliereController;
use App\Http\Controllers\Api\ClasseController;
use App\Http\Controllers\Api\AnneeAcademiqueController;
use App\Http\Controllers\Api\FormulaireNotationController;
use App\Http\Controllers\Api\NotationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-anonymous', [AuthController::class, 'loginUserAnonymous'])->name('login-anonymous');

// Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/users', [AuthController::class, 'userList'])->name('user.list');
Route::get('/users/getby', [AuthController::class, 'usersGetBy'])->name('user.getby');

Route::group(["middleware" => 'apiAuth'], function () {
    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // ADMIN
    Route::group(["prefix" => ""], function (){


        // users
        Route::group(['prefix' => 'users',], function (){
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::get('info',  [AuthController::class, 'userInfo'])->name('api.uers.info');
                Route::post('generate-credentials',  [AuthController::class, 'generateCredentials'])->name('api.uers.generate-credentials');
                Route::get('/role/{name}', [AuthController::class, 'usersByRole'])->whereAlphaNumeric('name')->name('api.user.byRole');
                Route::get('/etudiants/classe/{classe_id}', [AuthController::class, 'usersEtudiantByClass'])->whereNumber('classe_id')->name('api.users.etudiant.byClass');
                Route::get('',  [AuthController::class, 'userList'])->name('api.users.list');
            });
        });

        // formulaires-notations
        Route::group(['prefix' => 'formulaires-notations',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::get('', [FormulaireNotationController::class, 'index'])->name('api.forumulaires-notations.list');
                Route::post('create', [FormulaireNotationController::class, 'store'])->name('api.forumulaires-notations.create');
                Route::put('{id}/update', [FormulaireNotationController::class, 'update'])->name('api.forumulaires-notations.update');
                Route::delete('{id}/delete', [FormulaireNotationController::class, 'destroy'])->name('api.forumulaires-notations.destroy');

                //notation
                Route::group(['prefix' => '{codeFormulaireNotation}/notations',], function (){
                    Route::get('', [NotationController::class, 'index'])->name('api.notations.reponses.list');
                    Route::get('{notationId}', [NotationController::class, 'showNotation'])->name('api.notations.reponses.show');
                });
            });
            // notation
            Route::group(['prefix' => '{codeFormulaireNotation}/notations',], function (){
                Route::post('create', [NotationController::class, 'store'])->name('api.notations.create');
            });
            Route::get('search-by-code/{code}', [FormulaireNotationController::class, 'getFormulaireByCode'])->name('api.notations.get-formulaire-by-code');
        });

        // critere-notation
        Route::group(['prefix' => 'criteres-notation',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::post('create', [CritereNotationController::class, 'store'])->name('api.criteres-notation.create');
                Route::put('{id}/update', [CritereNotationController::class, 'update'])->name('api.criteres-notation.update');
                Route::delete('{id}/delete', [CritereNotationController::class, 'destroy'])->name('api.criteres-notation.destroy');
            });
            Route::get('', [CritereNotationController::class, 'index'])->name('api.criteres-notation.list');
        });

        // matieres
        Route::group(['prefix' => 'matieres',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::post('create', [MatiereController::class, 'store'])->name('api.matieres.create');
                Route::put('{id}/update', [MatiereController::class, 'update'])->name('api.matieres.update');
                Route::delete('{id}/delete', [MatiereController::class, 'destroy'])->name('api.matieres.destroy');
            });
            Route::get('', [MatiereController::class, 'index'])->name('api.matieres.list');
        });

        // enseignants
        Route::group(['prefix' => 'enseignants',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::post('create', [EnseignantController::class, 'store'])->name('api.enseignants.create');
                Route::put('{id}/update', [EnseignantController::class, 'update'])->name('api.enseignants.update');
                Route::delete('{id}/delete', [EnseignantController::class, 'destroy'])->name('api.enseignants.destroy');
            });
            Route::get('', [EnseignantController::class, 'index'])->name('api.enseignants.list');
        });

        // filieres
        Route::group(['prefix' => 'filieres',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::post('create', [FiliereController::class, 'store'])->name('api.filieres.create');
                Route::put('{id}/update', [FiliereController::class, 'update'])->name('api.filieres.update');
                Route::delete('{id}/delete', [FiliereController::class, 'destroy'])->name('api.filieres.destroy');
            });
            Route::get('', [FiliereController::class, 'index'])->name('api.filieres.list');
        });

        // niveaux
        Route::group(['prefix' => 'niveaux',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::post('create', [NiveauController::class, 'store'])->name('api.niveaux.create');
                Route::put('{id}/update', [NiveauController::class, 'update'])->name('api.niveaux.update');
                Route::delete('{id}/delete', [NiveauController::class, 'destroy'])->name('api.niveaux.destroy');
            });
            Route::get('', [NiveauController::class, 'index'])->name('api.niveaux.list');
            Route::get('{id}', [NiveauController::class, 'show'])->name('api.niveaux.show');
        });

        // classes
        Route::group(['prefix' => 'classes',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::post('create', [ClasseController::class, 'store'])->name('api.classes.create');
                Route::put('{id}/update', [ClasseController::class, 'update'])->name('api.classes.update');
                Route::delete('{id}/delete', [ClasseController::class, 'destroy'])->name('api.classes.destroy');
            });
            Route::get('', [ClasseController::class, 'index'])->name('api.classes.list');
        });

        // annees-academiques
        Route::group(['prefix' => 'annees-academiques',], function (){
            // only admin
            Route::group(['middleware' => 'isAdmin',], function (){
                Route::post('create', [AnneeAcademiqueController::class, 'store'])->name('api.annees-academiques.create');
                Route::put('{id}/update', [AnneeAcademiqueController::class, 'update'])->name('api.annees-academiques.update');
                Route::delete('{id}/delete', [AnneeAcademiqueController::class, 'destroy'])->name('api.annees-academiques.destroy');
            });
            Route::get('', [AnneeAcademiqueController::class, 'index'])->name('api.annees-academiques.list');
        });
    });
});
