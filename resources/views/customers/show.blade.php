{{-- resources/views/customers/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

  {{-- Cabeçalho --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h5 class="mb-0">
        RECEPTIVO – {{ $customer->program ?? 'INSS' }} (****{{ substr($customer->cpf, -4) }})
      </h5>
      <small class="text-muted">Consulte benefícios e simule empréstimos</small>
    </div>
    <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary">
      <i class="bi bi-arrow-left"></i> Voltar
    </a>
  </div>

  {{-- Dados do Cliente --}}
  <div class="card mb-4">
    <div class="card-header">
      <strong>Dados Cliente</strong>
    </div>
    <div class="card-body">
      <div class="row">
        {{-- Coluna 1 --}}
        <div class="col-md-6">
          <dl class="row mb-0">
            <dt class="col-sm-4">Nome</dt>
            <dd class="col-sm-8">{{ $customer->name }}</dd>

            <dt class="col-sm-4">CPF</dt>
            <dd class="col-sm-8">{{ $customer->cpf }}</dd>

            <dt class="col-sm-4">Email</dt>
            <dd class="col-sm-8">{{ $customer->email }}</dd>

            <dt class="col-sm-4">Telefone</dt>
            <dd class="col-sm-8">{{ $customer->phone }}</dd>
          </dl>
        </div>
        {{-- Coluna 2 --}}
        <div class="col-md-6">
          <dl class="row mb-0">
            <dt class="col-sm-4">Data Nasc.</dt>
            <dd class="col-sm-8">{{ $customer->birth_date ?? '–' }}</dd>

            <dt class="col-sm-4">Benefício</dt>
            <dd class="col-sm-8">{{ $customer->benefit_type ?? '–' }}</dd>

            <dt class="col-sm-4">Banco</dt>
            <dd class="col-sm-8">{{ $customer->bank ?? '–' }}</dd>

            <dt class="col-sm-4">Endereço</dt>
            <dd class="col-sm-8">{{ $customer->address ?? '–' }}</dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  {{-- Cards de Métricas --}}
  <div class="row mb-4 g-3">
    <div class="col-sm-6 col-md-3">
      <div class="card border-success h-100">
        <div class="card-body text-center">
          <small class="text-muted">MR</small>
          <h5 class="text-success mb-0">R$ {{ number_format($customer->mr ?? 0, 2, ',', '.') }}</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card border-secondary h-100">
        <div class="card-body text-center">
          <small class="text-muted">Base de Cálculo</small>
          <h5 class="text-secondary mb-0">R$ {{ number_format($customer->base_calculation ?? 0, 2, ',', '.') }}</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card border-info h-100">
        <div class="card-body text-center">
          <small class="text-muted">Margem 30%</small>
          <h5 class="text-info mb-0">R$ {{ number_format($customer->margin_30 ?? 0, 2, ',', '.') }}</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card border-warning h-100">
        <div class="card-body text-center">
          <small class="text-muted">Cartão Benefício</small>
          <h5 class="text-warning mb-0">R$ {{ number_format($customer->benefit_card ?? 0, 2, ',', '.') }}</h5>
        </div>
      </div>
    </div>
  </div>

  {{-- Seção de Empréstimos --}}
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span><i class="bi bi-bank me-1"></i> Empréstimos Bancários</span>
      <button class="btn btn-sm btn-outline-primary" type="button"
              data-bs-toggle="collapse" data-bs-target="#loansCollapse" 
              aria-expanded="true" aria-controls="loansCollapse">
        <i class="bi bi-eye-slash me-1"></i> Esconder
      </button>
    </div>
    <div class="collapse show" id="loansCollapse">
      <div class="card-body">

        @foreach($customer->contracts as $contract)
        <div class="card mb-3 shadow-sm">
          <div class="card-header d-flex justify-content-between">
            <strong><i class="bi bi-building me-1"></i> Banco {{ $contract->bank_name ?? '–' }}</strong>
            <span class="badge bg-success">Parcela: R$ {{ number_format($contract->installment,2,',','.') }}</span>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-2">
                <label class="form-label">Saldo Devedor</label>
                <input type="text" readonly class="form-control" 
                       value="R$ {{ number_format($contract->outstanding_balance,2,',','.') }}">
              </div>
              <div class="col-md-2">
                <label class="form-label">Prazo (meses)</label>
                <input type="text" readonly class="form-control" 
                       value="{{ $contract->term ?? '–' }}">
              </div>
              <div class="col-md-2">
                <label class="form-label">Taxa</label>
                <input type="text" readonly class="form-control" 
                       value="{{ number_format($contract->rate,2,',','.') }}%">
              </div>
              <div class="col-md-3">
                <label class="form-label">Data Averbação</label>
                <input type="text" readonly class="form-control" 
                       value="{{ $contract->record_date->format('d/m/Y') }}">
              </div>
              <div class="col-md-3">
                <label class="form-label">Contrato Nº</label>
                <input type="text" readonly class="form-control" 
                       value="{{ $contract->id }}">
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @if($customer->contracts->isEmpty())
          <p class="text-center text-muted mb-0">Nenhum empréstimo cadastrado.</p>
        @endif

      </div>
    </div>
  </div>

</div>
@endsection
