<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'phone',
        'documents',
    ];

    /**
     * Um cliente pode ter vários contratos.
     */
    public function contracts()
    {
        return $this->hasMany(\App\Models\Contract::class);
    }
}
