<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotingController;
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

Route::get('/', function () {
    return view('votacion.select-voter');
});

Route::get('/eleitorVotar',[VotingController::class, 'createVerific'])->name('create.verific');

Route::controller(CandidateController::class)->prefix('candidato')->middleware(['auth'])->name('candidate.')->group(function () {
    Route::get('/paginacao', function () {
        return view('candidato.pagination');
    })->name('pagination');
    Route::get('/lista', 'index')->name('index');
    Route::get('/all', 'allData')->name('all');
    Route::get('/editarCandidato/{id}', 'edit')->name('edit');
    Route::put('/atualizarCandidato/{id}', 'update')->name('update');
    Route::delete('/excluirCandidato/{id}', 'destroy')->name('delete');
    Route::get('/CadastroCandidato', 'create')->name('create');
    Route::post('/SalvarCandidato', 'store')->name('store');
    Route::any('/checkCandidato/{id}', 'checkedCandidate')->name('checked');
    Route::get('/ListaCandidato', 'indexVote')->name('index.votacion');
    Route::get('/detalhe/{id}', 'show')->name('show');
});

Route::controller(VoterController::class)->prefix('eleitor')->middleware(['auth'])->name('voter.')->group(function () {
    Route::get('/paginacao', function () {
        return view('eleitor.pagination');
    })->name('pagination');
    Route::get('/lista', 'index')->name('index');
    Route::get('/cadastro', 'create')->name('create');
    // Route::get('/eleitorVotar', 'createVerific')->name('create.verific');
    // Route::put('/irVotar', 'verificVoter')->name('store.verific');
    Route::post('/salvar', 'store')->name('store');
    Route::get('/editar/{id}', 'edit')->name('edit');
    Route::put('/atualizar/{id}', 'update')->name('update');
    Route::get('/detalhe/{id}', 'show')->name('show');
    Route::delete('/excluir/{id}', 'destroy')->name('delete');
});

Route::controller(VotingController::class)->prefix('Votar')->name('voting.')->group(function () {
    Route::any('/listacandidatos/{id?}', 'indexi')->name('indexi');
    Route::get('/lista/eleitores', 'index')->name('index');
    Route::post('/votarcandidatos', 'store')->name('store');
    Route::put('/salvarvotos/{ed}/{id}', 'storeVotes')->name('store.votes');
    Route::get('/createcandidatos', 'create')->name('create');
    Route::get('/resultado', 'showResult')->name('show.votes')->middleware('auth');//retirar o middlewar apos a votação
    Route::get('/Detalhe/Eleitor/{id}', 'show')->name('show');
    Route::get('/eleitorVotar', 'createVerific')->name('create.verific');
    Route::any('/irVotar', 'verificVoter')->name('store.verific');
});

Route::controller(UserController::class)->prefix('usuario')->name('user.')->group(function () {
    Route::get('/cadastro', 'create')->name('create');
    Route::get('/edicao/{id}', 'edit')->name('edit')->middleware('auth');;
    Route::post('/salvar', 'store')->name('store');
});

Route::controller(LoginController::class)->prefix('login')->name('login.')->group(function () {
    Route::get('/login', 'create')->name('create');
    Route::post('/logar', 'authenticate')->name('store');
    Route::any('/sair', 'logout')->name('logout');
});
//Route::get('/listaCandidatos/{id}', [VoterController::class, 'index']);