<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    /** @use HasFactory<\Database\Factories\SellerFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'description',
        'store_name'
    ];

    protected $table = 'seller';

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
