<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'order_id',
        'payment_method ',
        'status',
        'amount',
    ];

    protected $primaryKey = 'id';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
