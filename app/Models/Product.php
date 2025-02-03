<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    // Campos que se pueden rellenar masivamente
    protected $fillable = ['name', 'description', 'price', 'stock', 'image'];

    // Relación con OrderItem (Un producto puede estar en muchos pedidos)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getPriceFormattedAttribute()
    {
        return '$' . number_format($this->price, 2, ',', '.');
    }

    public function getStockStatusClass(): string
    {
        return match(true) {
            $this->stock <= 0 => 'text-red-500',
            $this->stock <= 10 => 'text-yellow-500',
            default => 'text-green-500',
        };
    }

    public function getStockStatusText(): string
    {
        return match(true) {
            $this->stock <= 0 => 'Sin stock',
            $this->stock <= 10 => 'Stock bajo (' . $this->stock . ')',
            default => $this->stock . ' disponibles',
        };
    }

    public function getShortDescriptionAttribute()
    {
        return Str::limit($this->description, 100, '...');
    }
}