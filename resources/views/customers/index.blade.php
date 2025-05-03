{{-- resources/views/customers/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Lista de Clientes</h1>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Telefone</th>
        <th width="200">Ações</th>
      </tr>
    </thead>
    <tbody>
      @forelse($customers as $c)
      <tr>
        <td>{{ $c->name }}</td>
        <td>{{ $c->cpf }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
        <td>
          <a href="{{ route('customers.show', $c) }}" class="btn btn-sm btn-primary">Ver</a>
          <a href="{{ route('customers.edit', $c) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('customers.destroy', $c) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Excluir</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="5" class="text-center">Nenhum cliente cadastrado</td></tr>
      @endforelse
    </tbody>
  </table>

  <a href="{{ route('customers.create') }}" class="btn btn-success">Novo Cliente</a>
</div>
@endsection
