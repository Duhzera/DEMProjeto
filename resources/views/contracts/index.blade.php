@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold dark:text-gray-100">Lista de Contratos</h1>
    <a href="{{ route('contracts.create') }}"
       class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
      Novo Contrato
    </a>
  </div>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cliente</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Valor</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Período</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
        </tr>
      </thead>
      <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
        @forelse($contracts as $ct)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $ct->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $ct->customer->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">R$ {{ number_format($ct->amount,2,',','.') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
              {{ \Carbon\Carbon::parse($ct->start_date)->format('d/m/Y') }} → {{ \Carbon\Carbon::parse($ct->end_date)->format('d/m/Y') }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $ct->status }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
              <a href="{{ route('contracts.show', $ct) }}"
                 class="px-2 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded text-xs">
                Ver
              </a>
              <a href="{{ route('contracts.edit', $ct) }}"
                 class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-xs">
                Editar
              </a>
              <form action="{{ route('contracts.destroy', $ct) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit"
                        class="px-2 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs">
                  Excluir
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
              Nenhum contrato cadastrado
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Paginação, se usar --}}
  <div class="mt-4">
    {{ $contracts->links() }}
  </div>
</div>
@endsection
