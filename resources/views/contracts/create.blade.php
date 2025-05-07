<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Contrato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contracts.store') }}" method="POST" class="space-y-6">
                        @csrf

                        @if(!$customer)
                            <div>
                                <x-input-label for="customer_id" :value="__('Cliente')" />
                                <select name="customer_id" id="customer_id" required
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Selecione um cliente</option>
                                    @foreach(\App\Models\Customer::orderBy('name')->get() as $c)
                                        <option value="{{ $c->id }}" {{ old('customer_id') == $c->id ? 'selected' : '' }}>
                                            {{ $c->name }} ({{ $c->cpf }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
                            </div>
                        @else
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                            <div>
                                <x-input-label :value="__('Cliente')" />
                                <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $customer->name }} ({{ $customer->cpf }})</p>
                            </div>
                        @endif

                        <div>
                            <x-input-label for="number" :value="__('Número do Contrato')" />
                            <x-text-input id="number" name="number" type="text" class="mt-1 block w-full" :value="old('number')" required />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="date" :value="__('Data')" />
                            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" :value="old('date')" required />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="value" :value="__('Valor')" />
                            <x-text-input id="value" name="value" type="number" step="0.01" class="mt-1 block w-full" :value="old('value')" required />
                            <x-input-error :messages="$errors->get('value')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status" required
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pendente</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Ativo</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                            <a href="{{ $customer ? route('customers.show', $customer) : route('contracts.index') }}" 
                                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
