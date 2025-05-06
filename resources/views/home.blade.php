{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Cabeçalho com Estatísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Card de Clientes -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total de Clientes</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ \App\Models\Customer::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Card de Contratos -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Contratos Ativos</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ \App\Models\Contract::where('status', 'ativo')->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Card de Valor Total -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Valor Total Contratos</h2>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">R$ {{ number_format(\App\Models\Contract::sum('amount'), 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Barra de Pesquisa -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-8 border border-gray-200 dark:border-gray-700">
        <form action="{{ route('customers.index') }}" method="GET" class="space-y-4 md:space-y-0 md:flex md:items-center md:space-x-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" name="search" placeholder="Pesquisar por nome ou CPF..." 
                           class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Buscar
                </button>
                <a href="{{ route('customers.create') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Novo Cliente
                </a>
            </div>
        </form>
    </div>

    <!-- Ações Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="{{ route('customers.index') }}" class="transform transition-transform hover:-translate-y-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Clientes</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Gerenciar clientes</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('contracts.index') }}" class="transform transition-transform hover:-translate-y-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:border-green-500 dark:hover:border-green-500">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Contratos</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Gerenciar contratos</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('contracts.create') }}" class="transform transition-transform hover:-translate-y-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:border-purple-500 dark:hover:border-purple-500">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Novo Contrato</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Criar novo contrato</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="#" onclick="window.print()" class="transform transition-transform hover:-translate-y-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 hover:border-gray-500 dark:hover:border-gray-500">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Relatórios</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Gerar relatórios</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
