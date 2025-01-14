<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    //Campos que se pueden rellenar masivamente 
    protected $fillable = ['user_id', 'status', 'total_price'];

    //Relación con OrderItem (Un pedido tiene muchos productos)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    //Relación con User (Un pedido tiene un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
