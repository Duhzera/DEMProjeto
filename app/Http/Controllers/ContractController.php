<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with('customer')->get();

        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        // trazer lista de clientes para o select, por exemplo
        $customers = Customer::all();

        return view('contracts.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required|numeric',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'status'      => 'required|string',
        ]);

        Contract::create($data);

        return redirect()
            ->route('contracts.index')
            ->with('success', 'Contrato cadastrado com sucesso.');
    }

    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $customers = Customer::all();

        return view('contracts.edit', compact('contract', 'customers'));
    }

    public function update(Request $request, Contract $contract)
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required|numeric',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'status'      => 'required|string',
        ]);

        $contract->update($data);

        return redirect()
            ->route('contracts.index')
            ->with('success', 'Contrato atualizado com sucesso.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()
            ->route('contracts.index')
            ->with('success', 'Contrato removido com sucesso.');
    }
}
