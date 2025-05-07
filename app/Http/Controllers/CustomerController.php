<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerLog;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // GET /customers
    public function index(Request $request)
    {
        $query = Customer::query();

        // Busca por nome ou CPF
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('cpf', 'like', "%{$search}%");
            });
        }

        // Ordena por nome
        $query->orderBy('name');

        // Busca com contratos e paginação
        $customers = $query->with('contracts')->paginate(10);

        return view('customers.index', compact('customers'));
    }

    // GET /customers/create
    public function create()
    {
        return view('customers.create');
    }

    // POST /customers
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'cpf'      => 'required|unique:customers,cpf',
            'email'    => 'nullable|email',
            'phone'    => 'nullable|string',
        ]);

        $customer = Customer::create($data);

        // Log de criação
        CustomerLog::create([
            'customer_id' => $customer->id,
            'user_id' => auth()->id(),
            'action' => 'created',
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Cliente cadastrado com sucesso.');
    }

    // GET /customers/{customer}
    public function show(Customer $customer)
    {
        $customer->load('contracts');
        return view('customers.show', compact('customer'));
    }

    // GET /customers/{customer}/edit
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // PUT/PATCH /customers/{customer}
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'cpf'      => 'required|unique:customers,cpf,'.$customer->id,
            'email'    => 'nullable|email',
            'phone'    => 'nullable|string',
        ]);

        $customer->update($data);

        // Log de alteração
        CustomerLog::create([
            'customer_id' => $customer->id,
            'user_id' => auth()->id(),
            'action' => 'updated',
        ]);

        return redirect()
            ->route('customers.show', $customer)
            ->with('success', 'Cliente atualizado com sucesso.');
    }

    // DELETE /customers/{customer}
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Cliente removido com sucesso.');
    }
}
