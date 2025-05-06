@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">
  <h1 class="text-2xl font-semibold mb-6 dark:text-gray-100">Cadastrar Contrato</h1>

  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
      <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('contracts.store') }}" method="POST" class="space-y-6">
    @csrf
    <div>
      <label for="customer_id" class="block text-sm font-medium mb-1 dark:text-gray-200">Cliente</label>
      <select
        id="customer_id" name="customer_id" required
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
        <option value="">-- selecione --</option>
        @foreach($customers as $c)
          <option value="{{ $c->id }}" {{ old('customer_id') == $c->id ? 'selected' : '' }}>
            {{ $c->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="amount" class="block text-sm font-medium mb-1 dark:text-gray-200">Valor</label>
      <input
        id="amount" type="number" step="0.01" name="amount" required
        value="{{ old('amount') }}"
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
    </div>

    <div>
      <label for="start_date" class="block text-sm font-medium mb-1 dark:text-gray-200">Data Início</label>
      <input
        id="start_date" type="date" name="start_date" required
        value="{{ old('start_date') }}"
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
    </div>

    <div>
      <label for="end_date" class="block text-sm font-medium mb-1 dark:text-gray-200">Data Fim</label>
      <input
        id="end_date" type="date" name="end_date" required
        value="{{ old('end_date') }}"
        class="block w-full border border-gray-300 dark:border-gray-600 rounded-md px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
    </div>

    <div>
      <label for="status" class="block text-sm font-medium mb-1 dark:text-gray-200">Status</label>
      <input
        id="status" type="text" name="status" required
        value="{{ old('status','ativo') }}"
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
        href="{{ route('contracts.index') }}"
        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"
      >
        Voltar
      </a>
    </div>
  </form>
</div>
@endsection
