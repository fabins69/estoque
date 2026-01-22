<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    Route::get('/produto', [ProdutoController::class, 'index']);
    Route::post('/produto', [ProdutoController::class, 'store']);
    Route::put('/produto', [ProdutoController::class, 'update']);
    Route::delete('/produto/delete/{id}', [ProdutoController::class, 'delete']);