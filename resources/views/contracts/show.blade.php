<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detalhes do Contrato') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('contracts.edit', $contract) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>
                <form action="{{ route('contracts.destroy', $contract) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Tem certeza que deseja excluir este contrato?')">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Informações do Contrato -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium mb-4">Informações do Contrato</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Número</p>
                                <p class="font-medium">{{ $contract->number }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Data</p>
                                <p class="font-medium">{{ $contract->date->format('d/m/Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Valor</p>
                                <p class="font-medium">R$ {{ number_format($contract->value, 2, ',', '.') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                                <p class="font-medium">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($contract->status === 'active') bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200
                                        @elseif($contract->status === 'pending') bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200
                                        @else bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200
                                        @endif">
                                        {{ ucfirst($contract->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Informações do Cliente -->
                    <div>
                        <h3 class="text-lg font-medium mb-4">Informações do Cliente</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nome</p>
                                <p class="font-medium">{{ $contract->customer->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">CPF</p>
                                <p class="font-medium">{{ $contract->customer->cpf }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                                <p class="font-medium">{{ $contract->customer->email ?? 'Não informado' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Telefone</p>
                                <p class="font-medium">{{ $contract->customer->phone ?? 'Não informado' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('customers.show', $contract->customer) }}" 
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Voltar para o Cliente
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 