<?php

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

use App\Http\Controllers\PresencasController;
use App\Http\Controllers\TurmasController;
use App\Http\Controllers\RelatorioController;

//Login
Route::get('/', function () {
    return view('auth.login');
});

//Autorização
Auth::routes();

//Entidades
Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/alunos', 'AlunosController')->middleware('auth');
Route::resource('/turmas', 'TurmasController')->middleware('auth')->only(['update']);
Route::resource('/presencas', 'PresencasController')->middleware('auth')->except(['index', 'create'])->middleware('auth');

//Presenças - Create ligado ao Aluno
Route::get('/presencas/create/{aluno}', [PresencasController::class, 'create'])->name('presencas.create')->middleware('auth');

//Turmas -> Edit de todas as Turmas na mesma página
Route::get('/turmas/edit/', [TurmasController::class, 'edit'])->name('turmas.edit')->middleware('auth');

//Relatórios
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index')->middleware('auth');
Route::get('/relatorios/presencas', [RelatorioController::class, 'resultado'])->name('relatorios.presencas')->middleware('auth');
Route::get('/relatorios/inadimplentes', [RelatorioController::class, 'resultado'])->name('relatorios.inadimplentes')->middleware('auth');