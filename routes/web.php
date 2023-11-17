<?php

use App\Http\Controllers\AssuntoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;


Route::get('/', [LivroController::class, 'index'])->name('index');

Route::group(['prefix' => 'livros', 'as' => 'livros.'], function () {
    Route::get('/', [LivroController::class, 'index'])->name('index');
    Route::get('/{id}', [LivroController::class, 'show'])->name('exibir');
    Route::get('/cadastrar', [LivroController::class, 'create'])->name('cadastrar');
    Route::post('/salvar', [LivroController::class, 'store'])->name('salvar');
    Route::get('/{id}/editar', [LivroController::class, 'edit'])->name('editar');
    Route::put('/{id}/atualizar', [LivroController::class, 'update'])->name('atualizar');
    Route::delete('/{id}', [LivroController::class, 'destroy'])->name('excluir');
});

Route::group(['prefix' => 'autores', 'as' => 'autores.'], function () {
    Route::get('/', [AutorController::class, 'index'])->name('index');
    Route::get('/cadastrar', [AutorController::class, 'create'])->name('cadastrar');
    Route::post('/salvar', [AutorController::class, 'store'])->name('salvar');
    Route::get('/{id}/editar', [AutorController::class, 'edit'])->name('editar');
    Route::put('/{id}/atualizar', [AutorController::class, 'update'])->name('atualizar');
    Route::delete('/{id}', [AutorController::class, 'destroy'])->name('excluir');
});

Route::group(['prefix' => 'assuntos', 'as' => 'assuntos.'], function () {
    Route::get('/', [AssuntoController::class, 'index'])->name('index');
    Route::get('/cadastrar', [AssuntoController::class, 'create'])->name('cadastrar');
    Route::post('/salvar', [AssuntoController::class, 'store'])->name('salvar');
    Route::get('/{id}/editar', [AssuntoController::class, 'edit'])->name('editar');
    Route::put('/{id}/atualizar', [AssuntoController::class, 'update'])->name('atualizar');
    Route::delete('/{id}', [AssuntoController::class, 'destroy'])->name('excluir');
});