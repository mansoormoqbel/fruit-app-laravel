<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'name',
        'user_id',
        'created_date',
        'TotalAmount'
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function CartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
