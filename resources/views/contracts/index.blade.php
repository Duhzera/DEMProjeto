@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Lista de Contratos</h1>
  {{-- similar a tabela de clientes, iterando $contracts --}}
  <a href="{{ route('contracts.create') }}" class="btn btn-success mb-3">Novo Contrato</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Valor</th>
        <th>Período</th>
        <th>Status</th>
        <th width="200">Ações</th>
      </tr>
    </thead>
    <tbody>
      @forelse($contracts as $ct)
      <tr>
        <td>{{ $ct->id }}</td>
        <td>{{ $ct->customer->name }}</td>
        <td>{{ number_format($ct->amount,2,',','.') }}</td>
        <td>{{ $ct->start_date }} → {{ $ct->end_date }}</td>
        <td>{{ $ct->status }}</td>
        <td>
          <a href="{{ route('contracts.show', $ct) }}" class="btn btn-sm btn-primary">Ver</a>
          <a href="{{ route('contracts.edit', $ct) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('contracts.destroy', $ct) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Excluir</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6" class="text-center">Nenhum contrato cadastrado</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
