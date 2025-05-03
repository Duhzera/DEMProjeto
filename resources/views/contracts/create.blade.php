@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Cadastrar Contrato</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('contracts.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Cliente</label>
      <select name="customer_id" class="form-select" required>
        <option value="">-- selecione --</option>
        @foreach($customers as $c)
          <option value="{{ $c->id }}" {{ old('customer_id') == $c->id ? 'selected' : '' }}>
            {{ $c->name }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Valor</label>
      <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Data Início</label>
      <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Data Fim</label>
      <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Status</label>
      <input type="text" name="status" class="form-control" value="{{ old('status','ativo') }}" required>
    </div>
    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Voltar</a>
  </form>
</div>
@endsection
