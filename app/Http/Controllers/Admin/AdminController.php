<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
/* use Illuminate\Support\Facades\Auth; */
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.login');
        
    }
    public function save(){
        try {
          $admin=new Admin();
          $admin -> name ="mansoor moqbel";
          $admin -> email ="mansoor@gmail.com";
          $admin -> password = bcrypt("123123123");
          $admin -> status =1;
          $admin -> phone_number ="0788865214";
          $admin -> save();
          return redirect()->back()->with(['message' => 'success']);
        } catch (\Throwable $th) {
          return $th;
          return redirect()->back()->with(['message' => 'error']);
        } 
    }
    public function login(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
           // notify()->success('تم الدخول بنجاح  ');
            return redirect() -> route('admin.dashboard');
        }
       // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'your have error information']);
    }
    public function logout(Request $request)
    {
       /*  return "www"; */
        Auth::logout();
      

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin/ ');
    }
}
