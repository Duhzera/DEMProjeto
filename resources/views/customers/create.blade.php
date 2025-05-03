{{-- resources/views/customers/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Cadastrar Cliente</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">CPF</label>
      <input type="text" name="cpf" class="form-control" value="{{ old('cpf') }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Telefone</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
    </div>
    <button class="btn btn-primary">Salvar</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Voltar</a>
  </form>
</div>
@endsection
