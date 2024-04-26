<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()  {
        $user_id=Auth()->id();
        $user = User::find($user_id);

        // Retrieve the user's order items along with their associated products
        $cartitems = $user->cartitem->load('product');
        /* return $cartitems; */
        $totalSubtotal = $user->cartitem->sum('subtotal');
        /* $totalSubtotal = $CartItem->sum('subtotal'); */
        /* return $totalSubtotal; */
        return view('cart',  compact('cartitems','totalSubtotal'));
        
    }
    public function DeleteCartItem($id) 
    {
        try {
            $CartItem= CartItem::find($id);
            $CartItem->delete();

            return redirect()->route('Cart')->with('error', 'product has been delete successfully!');
            //return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
           return $th;
        }
    }
   /*  public function updateSubCount() : Returntype {
        
    } */
    
}
