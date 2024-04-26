<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_items';
    protected $fillable = [
        'quantity',
        'cart_id',
        'created_date',
        'product_id',
        'subtotal'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function Cart()
    {
        return $this->belongsTo(Cart::class,'cart_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
    
}
