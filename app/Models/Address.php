<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Address extends Model
{
    // campos que podem ser atribuídos em massa
    protected $fillable = [
      'customer_id','cep','logradouro','numero',
      'complemento','bairro','cidade','uf','referencia'
    ];

    /**
     * Cada endereço pertence a um cliente.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
