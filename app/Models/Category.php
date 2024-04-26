<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name',
        
        

    ];
    public function  scopeSelection($query){

        return $query -> select('id','name');
    }
  
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    
}
