<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Address extends Model
{
    use HasFactory;

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
