<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ProfileController;

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
   
    // Rotas de Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});
