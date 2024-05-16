<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{//registration form
    public function registrationForm(){
        return view('registration');
    }

    // User registration
    public function registration(Request $req){
     $data = new User();
     $data->name = $req->name;
     $data->email = $req->email;
     $data->account_type = $req->account_type;
     $data->balance = 0;
     $data->password = Hash::make($req->password);
     $result = $data->save();
     if($result){
        return back()->with('success','you are registered successfully');
     }
     else{
        return back()->with('Fail','Something Went Wrong');
     }
    }
    //user Authentication
    public function userCheck(Request $req){
        $req ->validate([
            'email'=>'required|email',
        ]);
        $user = User::where('email','=',$req->email)->first();
        if($user){
            if(Hash::check($req->password,$user->password)){
                $req->session()->put('loggedUser',$user->id);
                return redirect('user-detail');
            }
            else{
                return back()->with('fail','Invalid password');
            }
        }
        else{
            return back()->with('fail','No account for this email');
        }
    }
    //user detail
    public function userDetail(){
        $data = User::where('id',session('loggedUser'))->first();
        $tranDep = Transaction::where('user_id',$data->id)->where('transaction_type','=','deposite')->get();
        $tranWith = Transaction::where('user_id',$data->id)->where('transaction_type','=','withdraw')->get();
        return view('userDetail',['user'=>$data,'deposites'=>$tranDep,'withdrawl'=>$tranWith]);
    }
}
