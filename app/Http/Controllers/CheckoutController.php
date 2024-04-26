<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\order;
use App\Models\orderItem;
use App\Models\Prodect;


class CheckoutController extends Controller
{
    public function index()  {
        $user_id=Auth()->id();
        $user = User::find($user_id);

        // Retrieve the user's order items along with their associated products
        $cartitems = $user->cartitem->load('product');
        /* return $cartitems; */
        $totalSubtotal = $user->cartitem->sum('subtotal');
        
       # return $user/* .$totalSubtotal.$cartitems */; 
        return view('checkout',  compact('user','cartitems','totalSubtotal'));
    }
    public function create (Request $request)  {
        
       try 
       {
       

            #user request id
                $user_id=$request->id;
            //find user
                $user = User::find($user_id);
            #count number prodect
                $number_prodect= count($user->cartitem->load('product')); 
            // total amount
                $total_amount= floatval($request->totalSubtotal)+ floatval(2) ;
            //total price prodect
                $total_price_prodect=$request->totalSubtotal;
            #user address
                $user_address=$request->address;
            #user phone
                $user_phone=$request->phone;
            #user city    
                $user_city=$request->city;
            # user, cart & cartItem
                $mansoor=$user->cartitem->load('product');
            #save order
           
           
                $order=new order();
                $order->user_id  = $user_id;
                $order->phone_number =$user_phone ;
                $order->number_product =$number_prodect ;
                $order->total_price_products= $request->totalSubtotal;
                $order->created_date =now() ;
                $order->total_amount=$total_amount ;
                $order->city= $user_city ;
                $order->address= $user_address;
                $order->order_status=0 ;
            
            $order->save();
            
            
            foreach ($mansoor as $orderItem) {
                
                $product = $orderItem->product;
                $orderItem1= orderItem::create([
                    'order_id'=>$order->id,	
                    'quantity'=> $orderItem->quantity,
                    'created_date'=>now(),
                    'product_id'=>$product->id,
                    'subtotal'=> $orderItem->subtotal,
                ]) ;
                
                $orderItem1->save();
            }/* user_id */
            Cart::where('user_id', $user_id)->delete();
            return redirect()->route('shop')->with('success', 'products has been ordered successfully!');
            
               
                    
                
                    
                

                    
                
        } catch (\Throwable $th) {
            throw $th;
        }
        
        
    }
    
}

