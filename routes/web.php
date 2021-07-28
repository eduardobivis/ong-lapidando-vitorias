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

use App\Http\Controllers\AtualizaSituacaoController;
use App\Http\Controllers\PresencasController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\TurmasController;

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
Route::resource('/pagamentos', 'PagamentosController')->middleware('auth')->except(['index', 'create'])->middleware('auth');

//Presenças, Pagamentos - Create ligado ao Aluno
Route::get('/presencas/create/{aluno}', [PresencasController::class, 'create'])->name('presencas.create')->middleware('auth');
Route::get('/pagamentos/create/{aluno}', [PagamentosController::class, 'create'])->name('pagamentos.create')->middleware('auth');

//Turmas -> Edit de todas as Turmas na mesma página
Route::get('/turmas/edit/', [TurmasController::class, 'edit'])->name('turmas.edit')->middleware('auth');

//Relatórios
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index')->middleware('auth');
Route::get('/relatorios/presencas', [RelatorioController::class, 'resultado'])->name('relatorios.presencas')->middleware('auth');
Route::get('/relatorios/situacao', [RelatorioController::class, 'resultado'])->name('relatorios.situacao')->middleware('auth');

//Atualização de Status
Route::get('/atualizasituacao', [AtualizaSituacaoController::class, 'atualizaSituacao'])->name('atualizasituacao')->middleware('auth');
