{{-- resources/views/customers/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">
  <h1 class="text-3xl font-bold mb-8 dark:text-gray-100 flex items-center gap-2">
    <span class="inline-block">👤</span> Cadastrar Cliente
  </h1>

  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
      <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('customers.store') }}" method="POST" class="space-y-10">
    @csrf
    {{-- Card Dados do Cliente --}}
    <div class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8">
      <h2 class="text-xl font-semibold dark:text-gray-100 mb-6 flex items-center gap-2">
        <span class="inline-block">👤</span> Dados do Cliente
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div>
          <label for="name" class="block text-sm font-medium mb-1 dark:text-gray-200">Nome</label>
          <input id="name" type="text" name="name" required value="{{ old('name') }}" placeholder="Nome completo" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="cpf" class="block text-sm font-medium mb-1 dark:text-gray-200">CPF</label>
          <input id="cpf" type="text" name="cpf" required value="{{ old('cpf') }}" placeholder="000.000.000-00" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="registration" class="block text-sm font-medium mb-1 dark:text-gray-200">Matrícula</label>
          <input id="registration" type="text" name="registration" value="{{ old('registration') }}" placeholder="Matrícula" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="specie" class="block text-sm font-medium mb-1 dark:text-gray-200">Espécie</label>
          <input id="specie" type="text" name="specie" value="{{ old('specie') }}" placeholder="Espécie" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="birth_date" class="block text-sm font-medium mb-1 dark:text-gray-200">Data de Nascimento</label>
          <input id="birth_date" type="date" name="birth_date" value="{{ old('birth_date') }}" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="rg" class="block text-sm font-medium mb-1 dark:text-gray-200">RG</label>
          <input id="rg" type="text" name="rg" value="{{ old('rg') }}" placeholder="RG" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="rg_issuer" class="block text-sm font-medium mb-1 dark:text-gray-200">Órgão Emissor</label>
          <input id="rg_issuer" type="text" name="rg_issuer" value="{{ old('rg_issuer') }}" placeholder="Órgão Emissor" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="civil_status" class="block text-sm font-medium mb-1 dark:text-gray-200">Estado Civil</label>
          <input id="civil_status" type="text" name="civil_status" value="{{ old('civil_status') }}" placeholder="Solteiro, Casado..." class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="gender" class="block text-sm font-medium mb-1 dark:text-gray-200">Sexo</label>
          <input id="gender" type="text" name="gender" value="{{ old('gender') }}" placeholder="M/F" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="bank" class="block text-sm font-medium mb-1 dark:text-gray-200">Banco</label>
          <input id="bank" type="text" name="bank" value="{{ old('bank') }}" placeholder="Banco" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="agency" class="block text-sm font-medium mb-1 dark:text-gray-200">Agência</label>
          <input id="agency" type="text" name="agency" value="{{ old('agency') }}" placeholder="Agência" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="account" class="block text-sm font-medium mb-1 dark:text-gray-200">Conta Corrente</label>
          <input id="account" type="text" name="account" value="{{ old('account') }}" placeholder="Conta Corrente" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div class="flex items-center mt-2">
          <input id="savings" type="checkbox" name="savings" value="1" {{ old('savings') ? 'checked' : '' }} class="mr-2">
          <label for="savings" class="text-sm font-medium dark:text-gray-200">Poupança?</label>
        </div>
        <div>
          <label for="phone" class="block text-sm font-medium mb-1 dark:text-gray-200">Telefone</label>
          <input id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="(99) 99999-9999" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="reference" class="block text-sm font-medium mb-1 dark:text-gray-200">Referência</label>
          <input id="reference" type="text" name="reference" value="{{ old('reference') }}" placeholder="Referência" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="averting_body" class="block text-sm font-medium mb-1 dark:text-gray-200">Órgão Averbador</label>
          <input id="averting_body" type="text" name="averting_body" value="{{ old('averting_body') }}" placeholder="Órgão Averbador" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="unit" class="block text-sm font-medium mb-1 dark:text-gray-200">Unidade</label>
          <input id="unit" type="text" name="unit" value="{{ old('unit') }}" placeholder="Unidade" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="admission_date" class="block text-sm font-medium mb-1 dark:text-gray-200">Data de Admissão</label>
          <input id="admission_date" type="date" name="admission_date" value="{{ old('admission_date') }}" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="in100_date" class="block text-sm font-medium mb-1 dark:text-gray-200">Data IN100</label>
          <input id="in100_date" type="date" name="in100_date" value="{{ old('in100_date') }}" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="position" class="block text-sm font-medium mb-1 dark:text-gray-200">Cargo</label>
          <input id="position" type="text" name="position" value="{{ old('position') }}" placeholder="Cargo" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="salary" class="block text-sm font-medium mb-1 dark:text-gray-200">Salário</label>
          <input id="salary" type="number" step="0.01" name="salary" value="{{ old('salary') }}" placeholder="0,00" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="margin" class="block text-sm font-medium mb-1 dark:text-gray-200">Margem</label>
          <input id="margin" type="number" step="0.01" name="margin" value="{{ old('margin') }}" placeholder="0,00" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div class="md:col-span-3">
          <label for="notes" class="block text-sm font-medium mb-1 dark:text-gray-200">Observações</label>
          <textarea id="notes" name="notes" rows="3" placeholder="Observações do cliente" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">{{ old('notes') }}</textarea>
        </div>
      </div>
    </div>
    {{-- Card Endereço --}}
    <div class="bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-2xl p-8">
      <h2 class="text-xl font-semibold dark:text-gray-100 mb-6 flex items-center gap-2">
        <span class="inline-block">🏠</span> Endereço
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1">
          <label for="cep" class="block text-sm font-medium mb-1 dark:text-gray-200">CEP</label>
          <input id="cep" type="text" name="cep" value="{{ old('cep') }}" placeholder="00000-000" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div class="lg:col-span-2">
          <label for="street" class="block text-sm font-medium mb-1 dark:text-gray-200">Logradouro</label>
          <input id="street" type="text" name="street" value="{{ old('street') }}" placeholder="Rua, Avenida..." class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="number" class="block text-sm font-medium mb-1 dark:text-gray-200">Número</label>
          <input id="number" type="text" name="number" value="{{ old('number') }}" placeholder="Número" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="complement" class="block text-sm font-medium mb-1 dark:text-gray-200">Complemento</label>
          <input id="complement" type="text" name="complement" value="{{ old('complement') }}" placeholder="Complemento" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="neighborhood" class="block text-sm font-medium mb-1 dark:text-gray-200">Bairro</label>
          <input id="neighborhood" type="text" name="neighborhood" value="{{ old('neighborhood') }}" placeholder="Bairro" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="city" class="block text-sm font-medium mb-1 dark:text-gray-200">Cidade</label>
          <input id="city" type="text" name="city" value="{{ old('city') }}" placeholder="Cidade" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="state" class="block text-sm font-medium mb-1 dark:text-gray-200">UF</label>
          <input id="state" type="text" name="state" value="{{ old('state') }}" placeholder="UF" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
      </div>
    </div>
    <div class="flex items-center space-x-4 pt-4">
      <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center gap-2">
        💾 <span>Salvar</span>
      </button>
      <a href="{{ route('customers.index') }}" class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 flex items-center gap-2">
        ↩️ <span>Voltar</span>
      </a>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const cepInput = document.getElementById('cep');
    const addressFields = {
      street: document.getElementById('street'),
      neighborhood: document.getElementById('neighborhood'),
      city: document.getElementById('city'),
      state: document.getElementById('state'),
      complement: document.getElementById('complement')
    };

    // Aplica máscara ao CEP
    cepInput.addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 5) {
        value = value.replace(/^(\d{5})(\d)/, '$1-$2');
      }
      e.target.value = value;
    });

    // Função para limpar campos de endereço
    function clearAddressFields() {
      Object.values(addressFields).forEach(field => {
        if (field) field.value = '';
      });
    }

    // Função para desabilitar/habilitar campos durante o carregamento
    function toggleAddressFields(disabled) {
      Object.values(addressFields).forEach(field => {
        if (field) field.disabled = disabled;
      });
    }

    cepInput.addEventListener('blur', async function() {
      const cep = cepInput.value.replace(/\D/g, '');
      
      if (cep.length !== 8) {
        clearAddressFields();
        return;
      }

      // Adiciona classe de loading ao input CEP
      cepInput.classList.add('loading');
      toggleAddressFields(true);

      try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (data.erro) {
          throw new Error('CEP não encontrado');
        }

        // Preenche os campos com os dados retornados
        if (addressFields.street) addressFields.street.value = data.logradouro || '';
        if (addressFields.neighborhood) addressFields.neighborhood.value = data.bairro || '';
        if (addressFields.city) addressFields.city.value = data.localidade || '';
        if (addressFields.state) addressFields.state.value = data.uf || '';
        if (addressFields.complement) addressFields.complement.value = data.complemento || '';

        // Destaca os campos preenchidos
        Object.values(addressFields).forEach(field => {
          if (field && field.value) {
            field.classList.add('bg-green-50', 'dark:bg-green-900/20');
            setTimeout(() => {
              field.classList.remove('bg-green-50', 'dark:bg-green-900/20');
            }, 2000);
          }
        });

      } catch (error) {
        clearAddressFields();
        // Adiciona mensagem de erro abaixo do campo CEP
        const errorDiv = document.createElement('div');
        errorDiv.className = 'text-red-500 text-sm mt-1';
        errorDiv.textContent = 'CEP não encontrado ou inválido';
        
        // Remove mensagem anterior se existir
        const existingError = cepInput.parentElement.querySelector('.text-red-500');
        if (existingError) existingError.remove();
        
        cepInput.parentElement.appendChild(errorDiv);
      } finally {
        // Remove classe de loading e habilita campos
        cepInput.classList.remove('loading');
        toggleAddressFields(false);
      }
    });
  });
</script>

<style>
  .loading {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M21 12a9 9 0 1 1-6.219-8.56'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.5rem center;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
  }
</style>
@endsection
