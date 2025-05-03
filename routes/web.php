<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContractController;

// página inicial redireciona para login ou /customers
Route::get('/', function () {
    return redirect()->route('customers.index');
});

// rotas de autenticação (login/register)
Auth::routes();

// agrupa tudo que precisa de usuário logado
Route::middleware('auth')->group(function() {

    // Dashboard opcional
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
     ->name('home');
    
    // CRUD completo de clientes
    Route::resource('customers', CustomerController::class);

    // CRUD completo de contratos
    Route::resource('contracts', ContractController::class);

});
