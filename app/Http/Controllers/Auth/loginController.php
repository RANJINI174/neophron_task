<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;

class loginController extends Controller
{
    public function authendicate(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $email = $request->input('email');
        $password=$request->input('password');

      if(Auth::attempt(['email'=>$email,'password'=>$password])){
        $user = User::where('email',$email)->first();
         Auth::login($user);
         return redirect('/home');

    }else{
        return back()->withErrors(['Invalid credential']);
    }
}
        public function logout(){
            Auth::logout();
            return redirect('/login');
        }

}

