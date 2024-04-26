<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
           
        
            $pros= Product::Selection()->get();
           /*  return $pros; */
            return view('admin.product.prodcut', compact('pros'));
        } catch (\Throwable $th) {
           return $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate=Category::select('category.*')->get();
        /* return $cate; */
        return  view('admin.product.create',compact('cate'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        /* return $request; */
        try{
            if ($request->has('image')) {
                $image=$request->file('image');
                
                $imageName=time().'.'.$image->extension();
                $image->move(public_path('images'),$imageName);
               
             }
            $Product=new Product();
            $Product->name=$request->name;
            $Product->price=$request->price;
            $Product->quantity=$request->quantity;
            $Product->image=$imageName;
            $Product->Cat_id=$request->CatId;
            $Product->status=1;
            $Product->save();
            return redirect()->route('admin.prodcut')->with('success_added', 'Product record has been inserted');
                return back()->with('success_added','Product record has been inserted'); 
                /*  return response()->json(['status'=>1,'data'=>$user]); */
        }catch(\Throwable $th){
           
           return redirect()->back()->with(['error' => $th]);
        }
       
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         try
        {
            $products = Product::with('category')->where('id',$id)->first();
            $categories = Category::all();
            
            /* return $products->Cat_id; */
            return view('admin.product.edit', compact('products', 'categories'));
        } catch (\Throwable $th) {
            return $th;
        }  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'price' => 'required|Numeric' ,
                'quantity' => 'required|Numeric',
                //'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'CatId' => 'required'
                
            ]); 
            if($validator->passes()) 
            {
                // Find the product by its ID
                $product = Product::find($request->id);

                // Check if the product exists
                if (!$product) {
                    return redirect()->route('admin.prodcut')->with('error', 'Product not found');
                }

                // Update the product's properties with the new values from the request
                $product->name = $request->name;
                $product->price = $request->price;
                $product->quantity = $request->quantity;

                // Check if a new image is being uploaded and update the image field accordingly
                if ($request->hasFile('image')) {
                    $image=$request->file('image');
                    
                    $imageName=time().'.'.$image->extension();
                    $image->move(public_path('images'),$imageName);
                    /* $imageName = $request->file('image')->store('images', 'public'); */
                    $product->image = $imageName;
                }

                // Update the category ID
                $product->Cat_id = $request->CatId;

                // Save the changes to the database
                $product->save();
                return redirect()->route('admin.prodcut')->with('success_update', 'Product record has been updated');
                //return back()->with('success_update','Product record has been inserted'); 
            }
    
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th]);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product= Product::find($id);
            $product->delete();

            return redirect()->route('admin.prodcut')->with('delete', 'User has been delete successfully!');
            //return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
           return $th;
        }
    }
}
