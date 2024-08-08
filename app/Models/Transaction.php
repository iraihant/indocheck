<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transactions_id',
        'user_id',
        'service_id',
        'payment_method',
        'total_amount',
        'status',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the service associated with the transaction.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
