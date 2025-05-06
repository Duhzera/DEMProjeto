<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // GET /customers
    public function index()
    {
        // busca todos os clientes (pode paginar também)
        $customers = Customer::all();

        // retorna a view com a variável
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
        // aqui você faz validação e create
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'cpf'      => 'required|unique:customers,cpf',
            'email'    => 'nullable|email',
            'phone'    => 'nullable|string',
            'documents'=> 'nullable',
        ]);

        Customer::create($data);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Cliente cadastrado com sucesso.');
    }

    // GET /customers/{customer}
    public function show(Customer $customer)
    {
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
            'documents'=> 'nullable',
        ]);

        $customer->update($data);

        return redirect()
            ->route('customers.index')
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
