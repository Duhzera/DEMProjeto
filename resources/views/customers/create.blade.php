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
      <h2 class="text-xl font-semibold dark:text-gray-100 mb-2 flex items-center gap-2">
        <span class="inline-block">👤</span> Dados do Cliente
      </h2>
      <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">* Campos obrigatórios</p>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div>
          <label for="name" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Nome <span class="text-red-500">*</span>
          </label>
          <input id="name" type="text" name="name" required value="{{ old('name') }}" placeholder="Nome completo" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="cpf" class="block text-sm font-medium mb-1 dark:text-gray-200">
            CPF <span class="text-red-500">*</span>
          </label>
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
          <label for="birth_date" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Data de Nascimento <span class="text-red-500">*</span>
          </label>
          <input id="birth_date" type="date" name="birth_date" required value="{{ old('birth_date') }}" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
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
          <label for="bank" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Banco <span class="text-red-500">*</span>
          </label>
          <input id="bank" type="text" name="bank" required value="{{ old('bank') }}" placeholder="Banco" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="agency" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Agência <span class="text-red-500">*</span>
          </label>
          <input id="agency" type="text" name="agency" required value="{{ old('agency') }}" placeholder="Agência" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div>
          <label for="account" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Conta Corrente <span class="text-red-500">*</span>
          </label>
          <input id="account" type="text" name="account" required value="{{ old('account') }}" placeholder="Conta Corrente" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
        <div class="flex items-center mt-2">
          <input id="savings" type="checkbox" name="savings" value="1" {{ old('savings') ? 'checked' : '' }} class="mr-2">
          <label for="savings" class="text-sm font-medium dark:text-gray-200">Poupança?</label>
        </div>
        <div>
          <label for="phone" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Telefone <span class="text-red-500">*</span>
          </label>
          <input id="phone" type="text" name="phone" required value="{{ old('phone') }}" placeholder="(99) 99999-9999" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
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
        <div>
          <label for="cep" class="block text-sm font-medium mb-1 dark:text-gray-200">
            CEP <span class="text-red-500">*</span>
          </label>
          <input id="cep" type="text" name="cep" required value="{{ old('cep') }}" placeholder="00000-000" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div class="lg:col-span-2">
          <label for="street" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Logradouro <span class="text-red-500">*</span>
          </label>
          <input id="street" type="text" name="street" required value="{{ old('street') }}" placeholder="Rua, Avenida..." class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="number" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Número <span class="text-red-500">*</span>
          </label>
          <input id="number" type="text" name="number" required value="{{ old('number') }}" placeholder="Número" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="complement" class="block text-sm font-medium mb-1 dark:text-gray-200">Complemento</label>
          <input id="complement" type="text" name="complement" value="{{ old('complement') }}" placeholder="Complemento" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="neighborhood" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Bairro <span class="text-red-500">*</span>
          </label>
          <input id="neighborhood" type="text" name="neighborhood" required value="{{ old('neighborhood') }}" placeholder="Bairro" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="city" class="block text-sm font-medium mb-1 dark:text-gray-200">
            Cidade <span class="text-red-500">*</span>
          </label>
          <input id="city" type="text" name="city" required value="{{ old('city') }}" placeholder="Cidade" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
        </div>
        <div>
          <label for="state" class="block text-sm font-medium mb-1 dark:text-gray-200">
            UF <span class="text-red-500">*</span>
          </label>
          <input id="state" type="text" name="state" required value="{{ old('state') }}" placeholder="UF" class="block w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
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
    // Campos existentes
    const cepInput = document.getElementById('cep');
    const addressFields = {
      street: document.getElementById('street'),
      neighborhood: document.getElementById('neighborhood'),
      city: document.getElementById('city'),
      state: document.getElementById('state')
    };

    // Função para destacar campo preenchido
    function highlightFilledField(field) {
      if (field.value) {
        field.classList.add('bg-green-50', 'dark:bg-green-900/20');
      }
    }

    // Função para adicionar evento de highlight em um campo
    function addHighlightEvent(field) {
      if (!field) return;
      
      field.addEventListener('change', function() {
        if (this.value) {
          this.classList.add('bg-green-50', 'dark:bg-green-900/20');
        } else {
          this.classList.remove('bg-green-50', 'dark:bg-green-900/20');
        }
      });

      // Verifica se já tem valor inicial
      highlightFilledField(field);
    }

    // Adiciona highlight para todos os campos do formulário
    const formFields = [
      'name', 'cpf', 'registration', 'specie', 'birth_date', 'rg', 'rg_issuer',
      'civil_status', 'gender', 'bank', 'agency', 'account', 'phone', 'reference',
      'averting_body', 'unit', 'admission_date', 'in100_date', 'position',
      'salary', 'margin', 'notes'
    ];

    formFields.forEach(fieldId => {
      const field = document.getElementById(fieldId);
      addHighlightEvent(field);
    });

    // Novos campos para validação
    const cpfInput = document.getElementById('cpf');
    const birthDateInput = document.getElementById('birth_date');
    const form = document.querySelector('form');

    // Função para validar CPF
    function validateCPF(cpf) {
      cpf = cpf.replace(/[^\d]/g, '');
      
      if (cpf.length !== 11) return false;
      
      // Verifica CPFs com todos os dígitos iguais
      if (/^(\d)\1{10}$/.test(cpf)) return false;
      
      // Validação do primeiro dígito verificador
      let sum = 0;
      for (let i = 0; i < 9; i++) {
        sum += parseInt(cpf.charAt(i)) * (10 - i);
      }
      let digit = 11 - (sum % 11);
      if (digit >= 10) digit = 0;
      if (digit !== parseInt(cpf.charAt(9))) return false;
      
      // Validação do segundo dígito verificador
      sum = 0;
      for (let i = 0; i < 10; i++) {
        sum += parseInt(cpf.charAt(i)) * (11 - i);
      }
      digit = 11 - (sum % 11);
      if (digit >= 10) digit = 0;
      if (digit !== parseInt(cpf.charAt(10))) return false;
      
      return true;
    }

    // Máscara do CPF
    cpfInput.addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 11) value = value.slice(0, 11);
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
      e.target.value = value;
    });

    // Validação do CPF ao perder o foco
    cpfInput.addEventListener('blur', function() {
      const cpf = this.value.replace(/[^\d]/g, '');
      const errorDiv = document.createElement('div');
      errorDiv.className = 'text-red-500 text-sm mt-1';
      
      // Remove mensagem de erro anterior se existir
      const existingError = this.parentElement.querySelector('.text-red-500');
      if (existingError) existingError.remove();
      
      if (cpf && !validateCPF(cpf)) {
        errorDiv.textContent = 'CPF inválido';
        this.parentElement.appendChild(errorDiv);
        this.classList.add('border-red-500');
      } else {
        this.classList.remove('border-red-500');
      }
    });

    // Validação da data de nascimento
    birthDateInput.addEventListener('change', function() {
      const selectedDate = new Date(this.value);
      const currentDate = new Date();
      const errorDiv = document.createElement('div');
      errorDiv.className = 'text-red-500 text-sm mt-1';
      
      // Remove mensagem de erro anterior se existir
      const existingError = this.parentElement.querySelector('.text-red-500');
      if (existingError) existingError.remove();
      
      if (selectedDate > currentDate) {
        errorDiv.textContent = 'A data de nascimento não pode ser maior que a data atual';
        this.parentElement.appendChild(errorDiv);
        this.classList.add('border-red-500');
      } else {
        this.classList.remove('border-red-500');
      }
    });

    // Validação do formulário antes do envio
    form.addEventListener('submit', function(e) {
      const cpf = cpfInput.value.replace(/[^\d]/g, '');
      const birthDate = new Date(birthDateInput.value);
      const currentDate = new Date();
      let hasError = false;

      // Validação do CPF
      if (!validateCPF(cpf)) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'text-red-500 text-sm mt-1';
        errorDiv.textContent = 'CPF inválido';
        
        const existingError = cpfInput.parentElement.querySelector('.text-red-500');
        if (existingError) existingError.remove();
        
        cpfInput.parentElement.appendChild(errorDiv);
        cpfInput.classList.add('border-red-500');
        hasError = true;
      }

      // Validação da data de nascimento
      if (birthDate > currentDate) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'text-red-500 text-sm mt-1';
        errorDiv.textContent = 'A data de nascimento não pode ser maior que a data atual';
        
        const existingError = birthDateInput.parentElement.querySelector('.text-red-500');
        if (existingError) existingError.remove();
        
        birthDateInput.parentElement.appendChild(errorDiv);
        birthDateInput.classList.add('border-red-500');
        hasError = true;
      }

      if (hasError) {
        e.preventDefault();
      }
    });

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

      cepInput.classList.add('loading');
      toggleAddressFields(true);

      try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        if (data.erro) {
          throw new Error('CEP não encontrado');
        }

        // Preenche os campos com os dados retornados
        Object.entries(addressFields).forEach(([key, field]) => {
          if (!field) return;
          
          switch(key) {
            case 'street':
              field.value = data.logradouro || '';
              break;
            case 'neighborhood':
              field.value = data.bairro || '';
              break;
            case 'city':
              field.value = data.localidade || '';
              break;
            case 'state':
              field.value = data.uf || '';
              break;
          }

          if (field.value) {
            field.classList.add('bg-green-50', 'dark:bg-green-900/20');
          }
        });

      } catch (error) {
        clearAddressFields();
        const errorDiv = document.createElement('div');
        errorDiv.className = 'text-red-500 text-sm mt-1';
        errorDiv.textContent = 'CEP não encontrado ou inválido';
        
        const existingError = cepInput.parentElement.querySelector('.text-red-500');
        if (existingError) existingError.remove();
        
        cepInput.parentElement.appendChild(errorDiv);
      } finally {
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

