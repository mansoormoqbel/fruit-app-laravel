<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()  {
        $user_id=Auth()->id();
        $user = User::find($user_id);
        return view('contact',compact('user'));
    }
    public function create(Request $request) {

        
        $validator = Validator::make($request->all(),[
            'name' =>  '  string |required| max:255 | min:8',
            'email' => 'required|string|email|max:255',
            'message' =>  '  string |required| max:255 ',
            'subject' =>  '  string |required| max:255',
            'phone' =>'required|numeric|min:9',
        ]); if($validator->passes()){
            $Contact=new Contact();
            $Contact->name=$request->name;
            $Contact->email=$request->email;
            $Contact->phone_number=$request->phone;
            $Contact->message=$request->message;;
            $Contact->subject=$request->subject;
            
            $Contact->save();

            return redirect('contact')->with('success', 'Contact Added To Success.');
        }
        return redirect('contact')->withErrors($validator)->withInput();
       

    }

}
