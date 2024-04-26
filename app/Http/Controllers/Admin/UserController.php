<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/* use App\Http\Requests\UserRequest; */
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        try {
            
            $users= User::where('type_user',0)->Selection()->get();
            return view('admin.user', compact('users'));
        } catch (\Throwable $th) {
           return $th;
        }
        
    }
    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),[
            'name' =>  '  string |required| max:255 | min:8',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
            'phone_number' =>'required|numeric|min:9',
        ]); 
        if($validator->passes()) 
        {
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone_number=$request->phone_number;
            $user->password=Hash::make($request->password);
            $user->status=1;
            $user->type_user=0;
            $user->save();
            return response()->json(['status'=>1,'data'=>$user]);
        }
        
            return response()->json(['status'=>0,'error' => $validator->errors()->toArray()]); 
        
       
        
   
    }
    public function edit($id)
    {
        $user1= User::find($id);
        return response()->json($user1);
    }
    public function view($id)
    {
        $user1= User::find($id);
        return response()->json($user1);
    }
    public function update(request $data)
    {
        
        $validator = Validator::make($data->all(),[
            'name' =>  '  string |required| max:255 ',
            'email' => 'required|string|email|max:255',
            'phone_number' =>'required|numeric|min:9',
        ]); 
        if($validator->passes()) 
        {
            $user=User::find($data->id);
            $user->name=$data->name;
            $user->email=$data->email;
            $user->phone_number=$data->phone_number;
           
           
            $user->save();
            return response()->json(['status'=>1,$user]);
        }
        return response()->json(['status'=>0,'error' => $validator->errors()->toArray()]); 
    }
    public function Delete($id){
        try {
            $user= User::find($id);
            $user->delete();
            return response()->json(['success'=>'User has been delete successfully!']);
        } catch (\Throwable $th) {
           return $th;
        }
       
    } 
    public function changeStatus($id)
    {
        try {
            $user = User::find($id);
            
            //return response()->json([ 'status'=>1,'user'=>$user, 'success'=>'User Has Been Change Successfully!']);
            if (!$user)
                return response()->json(['status'=>0,'error'=>'User not find']);
                /* return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود ']); */

           $status =  $user -> status  == 0 ? 1 : 0;
           //return response()->json([ 'status'=>1,'user'=>$status, 'success'=>'User Has Been Change Successfully!']);
            $user->status = $status;
            $user->save();
           //$user -> update(['status' =>$status ]);
            return response()->json([ 'status'=>1,'user'=>$user, 'success'=>'User Has Been Change Successfully!']);

           /*  return redirect()->route('admin.vendors')->with(['success' => ' تم تغيير الحالة بنجاح ']); */

        } catch (\Exception $ex) {
            return response()->json(['status'=>0,'error'=>'Something went wrong, please try again later']);
            
            /* return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']); */
        }
    }
}
