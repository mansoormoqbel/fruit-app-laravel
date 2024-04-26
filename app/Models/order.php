<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'city',
        'user_id',
        'created_date',
        'address',
        'phone_number',
        'total_price_products',
        'total_amount',
        'number_product',
        'order_status'
    ];
     
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderItems()
    {
        return $this->hasMany(orderItem::class);
    }
   
   
}
