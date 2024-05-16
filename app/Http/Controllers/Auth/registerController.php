<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function store(Request $request){
         $request->validate(
            [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
            //'confirm_password'=>'required|Confirmed'
            ]);
            //$hashedPassword = Hash::make($request->input('password'));
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            // dd($user);
            $user->save();

            Auth::login($user);

            return redirect('/home');
            }

    }

