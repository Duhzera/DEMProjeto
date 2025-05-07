<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'date',
        'value',
        'status',
        'customer_id',
    ];

    protected $casts = [
        'date' => 'date',
        'value' => 'decimal:2',
    ];

    // Relação com Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
