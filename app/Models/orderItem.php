<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $fillable = [
        'quantity',
        'order_id',
        'created_date',
        'product_id',
        'subtotal'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function order()
    {
        return $this->belongsTo(order::class,'order_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }
}
