{{-- resources/views/customers/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">
  <h1 class="text-2xl font-semibold mb-6 dark:text-gray-100">Cadastrar Cliente</h1>

  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
      <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('customers.store') }}" method="POST" class="space-y-6">
    @csrf
    <div>
      <label for="name" class="block text-sm font-medium mb-1 dark:text-gray-200">Nome</label>
      <input
        id="name" type="text" name="name" required
        value="{{ old('name') }}"
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
    </div>

    <div>
      <label for="cpf" class="block text-sm font-medium mb-1 dark:text-gray-200">CPF</label>
      <input
        id="cpf" type="text" name="cpf" required
        value="{{ old('cpf') }}"
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
    </div>

    <div>
      <label for="email" class="block text-sm font-medium mb-1 dark:text-gray-200">Email</label>
      <input
        id="email" type="email" name="email"
        value="{{ old('email') }}"
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
    </div>

    <div>
      <label for="phone" class="block text-sm font-medium mb-1 dark:text-gray-200">Telefone</label>
      <input
        id="phone" type="text" name="phone"
        value="{{ old('phone') }}"
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
    </div>

    <div class="flex items-center space-x-4 pt-4">
      <button
        type="submit"
        class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
        Salvar
      </button>
      <a
        href="{{ route('customers.index') }}"
        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"
      >
        Voltar
      </a>
    </div>
  </form>
</div>
@endsection
