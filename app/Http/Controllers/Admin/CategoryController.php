<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $cates= Category::Selection()->get();
            return view('admin.category', compact('cates'));
        } catch (\Throwable $th) {
           return $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' =>  '  string |required| max:255 ',
                
            ]); 
            if($validator->passes()) 
            {
                $category=new Category();
                $category->name=$request->name;
                $category->save();
                return response()->json(['status'=>1,'data'=>$category]);
            }
            
                return response()->json(['status'=>0,'error' => $validator->errors()->toArray()]); 
           
        } catch (\Throwable $th) {
           return $th;
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Category1= Category::find($id);
        return response()->json($Category1);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Categ= Category::find($id);
        return response()->json($Categ);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'name' =>  '  string |required| max:255 ',
            
        ]); 
        if($validator->passes()) 
        {
            $user=Category::find($request->id);
            $user->name=$request->name;
            $user->save();
            return response()->json(['status'=>1,$user]);
        }
        return response()->json(['status'=>0,'error' => $validator->errors()->toArray()]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category= Category::find($id);
            $category->delete();
            return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
           return $th;
        }
    }
}
