{{-- resources/views/customers/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
  <div class="flex justify-between items-center mb-8">
    <div>
      <h1 class="text-3xl font-bold dark:text-gray-100 flex items-center gap-2">
        <span class="inline-block">👤</span> Detalhes do Cliente
      </h1>
      <p class="text-gray-600 dark:text-gray-400 mt-1">RECEPTIVO – {{ $customer->program ?? 'INSS' }}</p>
    </div>
    <div class="flex gap-4">
      <a href="{{ route('customers.edit', $customer) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center gap-2">
        ✏️ <span>Editar</span>
      </a>
      <a href="{{ route('customers.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 flex items-center gap-2">
        ↩️ <span>Voltar</span>
      </a>
    </div>
  </div>

  {{-- Dados Pessoais (Sempre visível) --}}
  <div class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8 mb-8">
    <h2 class="text-xl font-semibold dark:text-gray-100 mb-6 flex items-center gap-2">
      <span class="inline-block">👤</span> Dados Pessoais
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nome</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->name }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">CPF</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->cpf }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Data de Nascimento</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->birth_date ? date('d/m/Y', strtotime($customer->birth_date)) : '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">RG</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->rg ?? '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Órgão Emissor</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->rg_issuer ?? '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Estado Civil</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->civil_status ?? '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Sexo</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->gender ?? '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Telefone</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->phone ?? '-' }}</p>
      </div>
    </div>
  </div>

  {{-- Métricas (Sempre visível) --}}
  <div class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8 mb-8">
    <h2 class="text-xl font-semibold dark:text-gray-100 mb-6 flex items-center gap-2">
      <span class="inline-block">📊</span> Métricas
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-xl shadow text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">MR</p>
        <p class="text-2xl font-semibold text-green-600 dark:text-green-400">
          R$ {{ number_format($customer->mr ?? 0, 2, ',', '.') }}
        </p>
      </div>
      <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-xl shadow text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Base de Cálculo</p>
        <p class="text-2xl font-semibold text-gray-600 dark:text-gray-300">
          R$ {{ number_format($customer->base_calculation ?? 0, 2, ',', '.') }}
        </p>
      </div>
      <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-xl shadow text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Margem 30%</p>
        <p class="text-2xl font-semibold text-blue-500 dark:text-blue-400">
          R$ {{ number_format($customer->margin_30 ?? 0, 2, ',', '.') }}
        </p>
      </div>
      <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-xl shadow text-center">
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Cartão Benefício</p>
        <p class="text-2xl font-semibold text-yellow-500 dark:text-yellow-400">
          R$ {{ number_format($customer->benefit_card ?? 0, 2, ',', '.') }}
        </p>
      </div>
    </div>
  </div>

  {{-- Dados Bancários (Sempre visível) --}}
  <div class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8 mb-8">
    <h2 class="text-xl font-semibold dark:text-gray-100 mb-6 flex items-center gap-2">
      <span class="inline-block">🏦</span> Dados Bancários
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Banco</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->bank ?? '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Agência</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->agency ?? '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Conta</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->account ?? '-' }}</p>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Tipo de Conta</label>
        <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->savings ? 'Poupança' : 'Corrente' }}</p>
      </div>
    </div>
  </div>

  {{-- Dados Profissionais --}}
  <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8 mb-8">
    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
      <h2 class="text-xl font-semibold dark:text-gray-100 flex items-center gap-2">
        <span class="inline-block">💼</span> Dados Profissionais
      </h2>
      <button type="button" class="focus:outline-none">
        <svg :class="{'transform rotate-180': open}" class="h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
    </div>
    <div x-show="open" class="mt-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Matrícula</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->registration ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Cargo</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->position ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Unidade</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->unit ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Data de Admissão</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->admission_date ? date('d/m/Y', strtotime($customer->admission_date)) : '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Data IN100</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->in100_date ? date('d/m/Y', strtotime($customer->in100_date)) : '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Salário</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->salary ? 'R$ ' . number_format($customer->salary, 2, ',', '.') : '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Margem</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->margin ? 'R$ ' . number_format($customer->margin, 2, ',', '.') : '-' }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- Endereço --}}
  <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8 mb-8">
    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
      <h2 class="text-xl font-semibold dark:text-gray-100 flex items-center gap-2">
        <span class="inline-block">🏠</span> Endereço
      </h2>
      <button type="button" class="focus:outline-none">
        <svg :class="{'transform rotate-180': open}" class="h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
    </div>
    <div x-show="open" class="mt-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">CEP</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->cep ?? '-' }}</p>
        </div>
        <div class="lg:col-span-2">
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Logradouro</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->street ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Número</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->number ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Complemento</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->complement ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Bairro</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->neighborhood ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Cidade</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->city ?? '-' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">UF</label>
          <p class="mt-1 text-lg dark:text-gray-100">{{ $customer->state ?? '-' }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- Empréstimos Bancários --}}
  <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8 mb-8">
    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
      <h2 class="text-xl font-semibold dark:text-gray-100 flex items-center gap-2">
        <span class="inline-block">💰</span> Empréstimos Bancários
      </h2>
      <button type="button" class="focus:outline-none">
        <svg :class="{'transform rotate-180': open}" class="h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
    </div>
    <div x-show="open" class="mt-6">
      <div class="space-y-4">
        @forelse($customer->contracts as $contract)
          <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-xl shadow">
            <div class="flex justify-between items-center mb-4">
              <h3 class="font-semibold text-gray-800 dark:text-gray-200">
                Banco {{ $contract->bank_name ?? '–' }}
              </h3>
              <span class="text-sm bg-green-100 dark:bg-green-200 text-green-800 dark:text-green-900 px-3 py-1 rounded-full">
                Parcela: R$ {{ number_format($contract->installment,2,',','.') }}
              </span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
              <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Saldo Devedor</p>
                <p class="font-medium text-lg dark:text-gray-100">
                  R$ {{ number_format($contract->outstanding_balance,2,',','.') }}
                </p>
              </div>
              <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Prazo (meses)</p>
                <p class="font-medium text-lg dark:text-gray-100">{{ $contract->term ?? '–' }}</p>
              </div>
              <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Taxa</p>
                <p class="font-medium text-lg dark:text-gray-100">
                  {{ number_format($contract->rate,2,',','.') }}%
                </p>
              </div>
              <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Data Averbação</p>
                <p class="font-medium text-lg dark:text-gray-100">
                  {{ $contract->record_date->format('d/m/Y') }}
                </p>
              </div>
              <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Contrato Nº</p>
                <p class="font-medium text-lg dark:text-gray-100">{{ $contract->id }}</p>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center text-gray-500 dark:text-gray-400 py-4">Nenhum empréstimo cadastrado.</p>
        @endforelse
      </div>
    </div>
  </div>

  {{-- Observações --}}
  @if($customer->notes)
  <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8 mb-8">
    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
      <h2 class="text-xl font-semibold dark:text-gray-100 flex items-center gap-2">
        <span class="inline-block">📝</span> Observações
      </h2>
      <button type="button" class="focus:outline-none">
        <svg :class="{'transform rotate-180': open}" class="h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
    </div>
    <div x-show="open" class="mt-6">
      <div class="prose dark:prose-invert max-w-none">
        <p class="text-gray-700 dark:text-gray-300">{{ $customer->notes }}</p>
      </div>
    </div>
  </div>
  @endif

  {{-- Histórico de Modificações --}}
  <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8">
    <div class="flex items-center justify-between cursor-pointer select-none" @click="open = !open">
      <h2 class="text-xl font-semibold dark:text-gray-100 flex items-center gap-2">
        <span class="inline-block">📋</span> Histórico de Modificações
      </h2>
      <button type="button" class="focus:outline-none">
        <svg :class="{'transform rotate-180': open}" class="h-5 w-5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
    </div>
    <div x-show="open" class="mt-6 text-sm text-gray-600 dark:text-gray-300 space-y-4">
      {{-- Registro de criação --}}
      @php
        $createdLog = $customer->logs()->with('user')->where('action', 'created')->orderBy('created_at', 'asc')->first();
        $updatedLogs = $customer->logs()->with('user')->where('action', 'updated')->orderBy('created_at', 'desc')->limit(3)->get();
      @endphp
      @if($createdLog)
        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
          <span class="font-medium text-gray-800 dark:text-gray-200">Criado</span>
          em {{ $createdLog->created_at->format('d/m/Y H:i') }}<br>
          <span class="block text-xs text-gray-500 dark:text-gray-400">por {{ $createdLog->user->name ?? '—' }}</span>
        </div>
      @endif
      {{-- Registros de alteração --}}
      @forelse($updatedLogs as $log)
        <div class="border-b border-gray-200 dark:border-gray-700 pb-4 last:mb-0 last:pb-0 last:border-0">
          <span class="font-medium text-gray-800 dark:text-gray-200">Alterado</span>
          em {{ $log->created_at->format('d/m/Y H:i') }}<br>
          <span class="block text-xs text-gray-500 dark:text-gray-400">por {{ $log->user->name ?? '—' }}</span>
        </div>
      @empty
        <div class="text-sm text-gray-500 dark:text-gray-400">Nenhuma alteração registrada.</div>
      @endforelse
    </div>
  </div>
</div>
@endsection
