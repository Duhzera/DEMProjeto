{{-- resources/views/customers/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4 space-y-6">
  {{-- Cabeçalho: Título, auditoria e voltar --}}
  <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
    {{-- Título --}}
    <div>
      <h5 class="text-xl font-semibold dark:text-gray-100">
        RECEPTIVO – {{ $customer->program ?? 'INSS' }}
        <span class="text-gray-500 dark:text-gray-400 text-sm">
          (****{{ substr($customer->cpf, -4) }})
        </span>
      </h5>
      <p class="text-gray-600 dark:text-gray-400 text-sm">Consulte benefícios e simule empréstimos</p>
    </div>

    {{-- Auditoria --}}
    <div class="text-sm text-gray-500 dark:text-gray-400 text-center">
      <p>
        Criado por
        <strong class="dark:text-gray-100">{{ $customer->creator->name ?? '—' }}</strong>
        em {{ $customer->created_at->format('d/m/Y H:i') }}
      </p>
      @if($customer->updated_by)
      <p>
        Alterado por
        <strong class="dark:text-gray-100">{{ $customer->editor->name ?? '—' }}</strong>
        em {{ $customer->updated_at->format('d/m/Y H:i') }}
      </p>
      @endif
    </div>

    {{-- Voltar --}}
    <div>
      <a href="{{ route('customers.index') }}"
         class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
        <i class="bi bi-arrow-left mr-2"></i> Voltar
      </a>
    </div>
  </div>

  {{-- Dados do Cliente --}}
  <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
    <h6 class="text-lg font-medium mb-4 dark:text-gray-100">Dados do Cliente</h6>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      {{-- Coluna 1 --}}
      <dl class="space-y-2">
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">Nome:</dt>
          <dd class="dark:text-gray-100">{{ $customer->name }}</dd>
        </div>
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">CPF:</dt>
          <dd class="dark:text-gray-100">{{ $customer->cpf }}</dd>
        </div>
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">Email:</dt>
          <dd class="dark:text-gray-100">{{ $customer->email }}</dd>
        </div>
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">Telefone:</dt>
          <dd class="dark:text-gray-100">{{ $customer->phone }}</dd>
        </div>
      </dl>
      {{-- Coluna 2 --}}
      <dl class="space-y-2">
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">Data Nasc.:</dt>
          <dd class="dark:text-gray-100">{{ $customer->birth_date ?? '–' }}</dd>
        </div>
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">Benefício:</dt>
          <dd class="dark:text-gray-100">{{ $customer->benefit_type ?? '–' }}</dd>
        </div>
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">Banco:</dt>
          <dd class="dark:text-gray-100">{{ $customer->bank ?? '–' }}</dd>
        </div>
        <div class="flex justify-between">
          <dt class="font-semibold dark:text-gray-200">Endereço:</dt>
          <dd class="dark:text-gray-100">{{ $customer->address->logradouro ?? '–' }}</dd>
        </div>
      </dl>
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
</div>
@endsection
