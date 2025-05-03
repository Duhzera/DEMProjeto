@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="card mb-4">
    <div class="card-body">
      <form action="{{ route('customers.index') }}" method="GET" class="row g-2">

        {{-- Botão refresh --}}
        <div class="col-auto">
          <button type="button" class="btn btn-light" onclick="location.reload()">
            <i class="bi bi-arrow-clockwise"></i>
          </button>
        </div>

        {{-- Programa (ex: INSS) --}}
        <div class="col-auto">
          <select name="program" class="form-select">
            <option value="INSS">INSS</option>
            <option value="OUTRO">Outro</option>
          </select>
        </div>

        {{-- Filtrar por --}}
        <div class="col-auto">
          <select name="filter_by" class="form-select">
            <option value="cpf">CPF</option>
            <option value="name">Nome</option>
          </select>
        </div>

        {{-- Campo de busca --}}
        <div class="col">
          <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Pesquise CPF ou nome"
          >
        </div>

        {{-- Botão Buscar --}}
        <div class="col-auto">
          <button type="submit" class="btn btn-success">Buscar</button>
        </div>

        {{-- Novo Cliente --}}
        <div class="col-auto ms-auto">
          <a href="{{ route('customers.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Novo Cliente
          </a>
        </div>

      </form>
    </div>
  </div>

  {{-- Aqui você pode exibir cards de resumo (MR, margem, etc.) ou 
       deixar uma mensagem inicial até o usuário buscar algo --}}
  <div class="text-center text-muted mt-5">
    <p>Use o formulário acima para localizar um cliente ou criar um novo.</p>
  </div>
</div>
@endsection
