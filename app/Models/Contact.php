<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
       'name',
       'email',
       'phone_number',
       'message',
       'subject'
    ];
    /* 
     $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('message');
            $table->string('subject');
    */
}
