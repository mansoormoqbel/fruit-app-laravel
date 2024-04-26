<?php

namespace App\Models;
/*
   use App\Models\Product


*/ 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'image',
        'price',
        'CatId',
        'status',
    ];
   
    public function  scopeSelection($query){

     
    
        return $query -> select('product.*', 'category.name as CatName')->join('category', 'category.id', '=', 'product.Cat_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class,'Cat_id');
    }
    public function getStatus(){
        return   $this -> status == 1 ? 'active'  : 'not active';
    }
    /* public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_items', 'product_id', 'cart_id')
            ->withPivot('quantity', 'created_date');
    } */
    public function CartItems()
    {
        return $this->hasMany(CartItem::class,'product_id');
    }
    
    
}
