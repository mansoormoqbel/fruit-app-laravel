<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

use App\Models\User;
use App\Models\Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            
            $products= Product::Selection()->paginate(3);
            return view('home', compact('products'));
        } catch (\Throwable $th) {
           return $th;
        }
        
    }
    public function about()
    {
        return view('about');
    }
   
    public function addItem(Request $request ){
        try {
           /*  return $request; */
            $product1=CartItem::where('product_id','=',$request->input('product'))->first();
            
            if($product1){
                return redirect()->route('home')->with('error', 'Product found in Cart.');
            }else{
                    $product = Product::find($request->input('product'));
                    if (!$product) {
                        return redirect()->route('home')->with('error', 'Product not found.');
                    }
                    $Cart = Cart::create([
                        'user_id' => auth()->id(), // Assuming you're using authentication
                        'created_date' => now(),
                        'TotalAmount' => 0, // Initialize the total amount to 0
                    ]);
                    $CartItem = new CartItem([
                        'product_id' => $product->id,
                        'quantity' => $request->quantity1,
                        'created_date' => now(),
                        'subtotal' => $product->price * $request->quantity1,
                    ]);
                    $Cart->CartItems()->save($CartItem);
                    return  redirect()->route('home')->with('success', 'Product Added To Cart.');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        
       

        
    }
}
