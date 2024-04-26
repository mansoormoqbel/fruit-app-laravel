<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;

class CartController extends Controller
{
    public function index() {
        $customer = User::find(6); // Replace with the actual customer ID
        $purchases = $customer->Carts->Count();
        return $purchases;
       /*  $purchase = Cart::find(1); // Replace with the actual purchase ID
        $customer = $purchase->users;
        return $customer; */
        /* try {
            $customer = User::find(6); // Replace with the actual customer ID

            $purchase = new Cart();
            $purchase->created_date = now();
            $purchase->TotalAmount = 600.00;
    
            $customer->Carts()->save($purchase);
            return "done"." ".$customer;

        } catch (\Throwable $th) {
            return $th;
        } */
       
        
    }
}
