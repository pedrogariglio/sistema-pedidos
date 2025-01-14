<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    //Campos que se pueden rellenar masivamente 
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price' ];

    //Relacióm con Order (Un detalle pertenece a un pedido)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    //Relación con Product (Un detalle pertenece a un productos)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
