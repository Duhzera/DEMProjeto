{{-- resources/views/customers/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4 space-y-6">
  {{-- Cabeçalho: Título e voltar --}}
  <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
    <div>
      <h5 class="text-xl font-semibold dark:text-gray-100">
        RECEPTIVO – {{ $customer->program ?? 'INSS' }}
        <span class="text-gray-500 dark:text-gray-400 text-sm">
          (****{{ substr($customer->cpf, -4) }})
        </span>
      </h5>
      <p class="text-gray-600 dark:text-gray-400 text-sm">Consulte benefícios e simule empréstimos</p>
    </div>
    <div>
      <a href="{{ route('customers.index') }}"
         class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
        Voltar
      </a>
    </div>
  </div>

  {{-- Card Dados do Cliente com edição inline --}}
  <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 relative" x-data="{ edit: false }">
    <div class="absolute top-4 right-4">
      <button @click="edit = !edit" class="text-gray-500 hover:text-blue-600" title="Editar">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm0 0V21h8" />
        </svg>
      </button>
    </div>
    <h6 class="text-lg font-medium mb-4 dark:text-gray-100">Dados do Cliente</h6>
    <form x-show="edit" action="{{ route('customers.update', $customer) }}" method="POST" class="space-y-4" @click.away="edit = false">
      @csrf
      @method('PUT')
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">Nome:</label>
            <input type="text" name="name" value="{{ $customer->name }}" class="ml-2 border rounded px-2 py-1 dark:bg-gray-900 dark:text-gray-100">
          </div>
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">CPF:</label>
            <input type="text" name="cpf" value="{{ $customer->cpf }}" class="ml-2 border rounded px-2 py-1 dark:bg-gray-900 dark:text-gray-100">
          </div>
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">Email:</label>
            <input type="email" name="email" value="{{ $customer->email }}" class="ml-2 border rounded px-2 py-1 dark:bg-gray-900 dark:text-gray-100">
          </div>
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">Telefone:</label>
            <input type="text" name="phone" value="{{ $customer->phone }}" class="ml-2 border rounded px-2 py-1 dark:bg-gray-900 dark:text-gray-100">
          </div>
        </div>
        <div class="space-y-2">
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">Data Nasc.:</label>
            <span class="dark:text-gray-100">{{ $customer->birth_date ?? '–' }}</span>
          </div>
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">Benefício:</label>
            <span class="dark:text-gray-100">{{ $customer->benefit_type ?? '–' }}</span>
          </div>
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">Banco:</label>
            <span class="dark:text-gray-100">{{ $customer->bank ?? '–' }}</span>
          </div>
          <div class="flex justify-between items-center">
            <label class="font-semibold dark:text-gray-200">Endereço:</label>
            <span class="dark:text-gray-100">{{ $customer->address->logradouro ?? '–' }}</span>
          </div>
        </div>
      </div>
      <div class="flex gap-2 mt-4">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Salvar</button>
        <button type="button" @click="edit = false" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Cancelar</button>
      </div>
    </form>
    <div x-show="!edit">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">Nome:</span>
            <span class="dark:text-gray-100">{{ $customer->name }}</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">CPF:</span>
            <span class="dark:text-gray-100">{{ $customer->cpf }}</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">Email:</span>
            <span class="dark:text-gray-100">{{ $customer->email }}</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">Telefone:</span>
            <span class="dark:text-gray-100">{{ $customer->phone }}</span>
          </div>
        </div>
        <div class="space-y-2">
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">Data Nasc.:</span>
            <span class="dark:text-gray-100">{{ $customer->birth_date ?? '–' }}</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">Benefício:</span>
            <span class="dark:text-gray-100">{{ $customer->benefit_type ?? '–' }}</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">Banco:</span>
            <span class="dark:text-gray-100">{{ $customer->bank ?? '–' }}</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="font-semibold dark:text-gray-200">Endereço:</span>
            <span class="dark:text-gray-100">{{ $customer->address->logradouro ?? '–' }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Cards de Métricas --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
      <p class="text-sm text-gray-500 dark:text-gray-400">MR</p>
      <p class="text-xl font-semibold text-green-600 dark:text-green-400">
        R$ {{ number_format($customer->mr ?? 0, 2, ',', '.') }}
      </p>
    </div>
    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
      <p class="text-sm text-gray-500 dark:text-gray-400">Base de Cálculo</p>
      <p class="text-xl font-semibold text-gray-600 dark:text-gray-300">
        R$ {{ number_format($customer->base_calculation ?? 0, 2, ',', '.') }}
      </p>
    </div>
    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
      <p class="text-sm text-gray-500 dark:text-gray-400">Margem 30%</p>
      <p class="text-xl font-semibold text-blue-500 dark:text-blue-400">
        R$ {{ number_format($customer->margin_30 ?? 0, 2, ',', '.') }}
      </p>
    </div>
    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow text-center">
      <p class="text-sm text-gray-500 dark:text-gray-400">Cartão Benefício</p>
      <p class="text-xl font-semibold text-yellow-500 dark:text-yellow-400">
        R$ {{ number_format($customer->benefit_card ?? 0, 2, ',', '.') }}
      </p>
    </div>
  </div>

  {{-- Empréstimos Bancários --}}
  <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
    <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
      <h6 class="font-medium text-gray-800 dark:text-gray-200">Empréstimos Bancários</h6>
      <button @click="$refs.loans.classList.toggle('hidden')"
              class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
        <i class="bi bi-eye-slash"></i>
      </button>
    </div>
    <div x-ref="loans" class="p-4 space-y-4">
      @forelse($customer->contracts as $contract)
        <div class="bg-white dark:bg-gray-900 p-4 rounded-lg shadow">
          <div class="flex justify-between items-center mb-2">
            <h6 class="font-semibold text-gray-800 dark:text-gray-200">
              Banco {{ $contract->bank_name ?? '–' }}
            </h6>
            <span class="text-sm bg-green-100 dark:bg-green-200 text-green-800 dark:text-green-900 px-2 py-1 rounded">
              Parcela: R$ {{ number_format($contract->installment,2,',','.') }}
            </span>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Saldo Devedor</p>
              <p class="font-medium dark:text-gray-100">
                R$ {{ number_format($contract->outstanding_balance,2,',','.') }}
              </p>
            </div>
            <div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Prazo (meses)</p>
              <p class="font-medium dark:text-gray-100">{{ $contract->term ?? '–' }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Taxa</p>
              <p class="font-medium dark:text-gray-100">
                {{ number_format($contract->rate,2,',','.') }}%
              </p>
            </div>
            <div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Data Averbação</p>
              <p class="font-medium dark:text-gray-100">
                {{ $contract->record_date->format('d/m/Y') }}
              </p>
            </div>
            <div>
              <p class="text-xs text-gray-500 dark:text-gray-400">Contrato Nº</p>
              <p class="font-medium dark:text-gray-100">{{ $contract->id }}</p>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center text-gray-500 dark:text-gray-400">Nenhum empréstimo cadastrado.</p>
      @endforelse
    </div>
  </div>

  {{-- Card Histórico de Modificações --}}
  <div x-data="{ open: true }" class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
      <h6 class="text-lg font-medium dark:text-gray-100">Histórico de Modificações</h6>
      <button type="button" class="focus:outline-none">
        <svg :class="{'transform rotate-180': open}" class="h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
    </div>
    <div x-show="open" class="mt-4 text-sm text-gray-600 dark:text-gray-300 space-y-2">
      {{-- Registro de criação --}}
      @php
        $createdLog = $customer->logs()->with('user')->where('action', 'created')->orderBy('created_at', 'asc')->first();
        $updatedLogs = $customer->logs()->with('user')->where('action', 'updated')->orderBy('created_at', 'desc')->limit(3)->get();
      @endphp
      @if($createdLog)
        <div class="border-b border-gray-200 dark:border-gray-700 pb-2 mb-2">
          <span class="font-medium">Criado</span>
          em {{ $createdLog->created_at->format('d/m/Y H:i') }}<br>
          <span class="block text-xs text-gray-500 dark:text-gray-400">por {{ $createdLog->user->name ?? '—' }}</span>
        </div>
      @endif
      {{-- Registros de alteração --}}
      @forelse($updatedLogs as $log)
        <div class="border-b border-gray-200 dark:border-gray-700 pb-2 mb-2 last:mb-0 last:pb-0 last:border-0">
          <span class="font-medium">Alterado</span>
          em {{ $log->created_at->format('d/m/Y H:i') }}<br>
          <span class="block text-xs text-gray-500 dark:text-gray-400">por {{ $log->user->name ?? '—' }}</span>
        </div>
      @empty
        <div class="text-xs text-gray-400">Nenhuma alteração registrada.</div>
      @endforelse
    </div>
  </div>
</div>
@endsection
