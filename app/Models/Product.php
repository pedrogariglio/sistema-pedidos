<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    //Campos que se pueden rellenar masivamente
    protected $fillable = ['name', 'description', 'price', 'stock', 'image'];

    //Relación con OrderItem (Un producto puede estar en muchos pedidos)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
