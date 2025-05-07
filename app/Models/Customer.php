<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Models\Contract;
use App\Models\Address;
use App\Models\User;

class Customer extends Model
{
    use HasFactory;

    /**
     * Campos em mass‐assignment.
     * Não é necessário incluir created_by/updated_by,
     * pois eles são preenchidos pelos eventos.
     */
    protected $fillable = [
        'name', 'cpf', 'registration', 'specie', 'birth_date', 'rg', 'rg_issuer', 'civil_status', 'gender', 'bank', 'agency', 'account', 'savings', 'phone', 'reference', 'averting_body', 'unit', 'admission_date', 'in100_date', 'position', 'salary', 'margin', 'notes', 'created_by', 'updated_by'
    ];

    /**
     * Auto‐preenche created_by e updated_by.
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    /**
     * Relação 1→1 com a tabela addresses.
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Relação 1→N com a tabela contracts.
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Usuário que criou (foreign key created_by).
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Usuário que atualizou por último (foreign key updated_by).
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Logs de alterações deste cliente
     */
    public function logs()
    {
        return $this->hasMany(\App\Models\CustomerLog::class)->latest();
    }
}
