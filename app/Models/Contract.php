<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'amount',
        'start_date',
        'end_date',
        'status',
    ];

    // Relação com Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
