<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact_name',
        'email',
        'phone',
        'address',
        'tax_id',
        'payment_terms'
    ];
    
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class); 
    }
}
