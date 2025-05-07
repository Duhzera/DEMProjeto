<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $query = Contract::with('customer');

        // Busca por número do contrato ou nome do cliente
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('number', 'like', "%{$search}%")
                  ->orWhereHas('customer', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Ordena por data mais recente
        $contracts = $query->orderBy('date', 'desc')->paginate(10);

        return view('contracts.index', compact('contracts'));
    }

    public function create(Request $request)
    {
        $customer = null;
        if ($request->has('customer')) {
            $customer = Customer::findOrFail($request->customer);
        }
        return view('contracts.create', compact('customer'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|unique:contracts,number',
            'date' => 'required|date',
            'value' => 'required|numeric|min:0',
            'status' => 'required|in:active,pending,cancelled',
            'customer_id' => 'required|exists:customers,id',
        ]);

        Contract::create($data);

        return redirect()
            ->route('customers.show', $data['customer_id'])
            ->with('success', 'Contrato cadastrado com sucesso.');
    }

    public function show(Contract $contract)
    {
        $contract->load('customer');
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        return view('contracts.edit', compact('contract'));
    }

    public function update(Request $request, Contract $contract)
    {
        $data = $request->validate([
            'number' => 'required|unique:contracts,number,'.$contract->id,
            'date' => 'required|date',
            'value' => 'required|numeric|min:0',
            'status' => 'required|in:active,pending,cancelled',
        ]);

        $contract->update($data);

        return redirect()
            ->route('customers.show', $contract->customer_id)
            ->with('success', 'Contrato atualizado com sucesso.');
    }

    public function destroy(Contract $contract)
    {
        $customer_id = $contract->customer_id;
        $contract->delete();

        return redirect()
            ->route('customers.show', $customer_id)
            ->with('success', 'Contrato removido com sucesso.');
    }
}
