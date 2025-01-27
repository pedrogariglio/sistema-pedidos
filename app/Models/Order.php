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

    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';

    public function getStatusColorClass()
    {
        return match($this->status) {
            self::STATUS_PENDING => 'text-yellow-600',
            self::STATUS_COMPLETED => 'text-green-600',
            self::STATUS_CANCELLED => 'text-red-600',
            default => 'text-gray-600'
        };
    }
}
