<?php

namespace Zay\Http\Controllers;
   
use Illuminate\Http\Request;
use Zay\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Zay\User;

class ChangePasswordController extends Controller
{
    public function pwview(){
        return view('auth.passwords.cpw');
      }

      
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

   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changepw(Request $request)
    {
        $request->validate([
            'pass' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['required','same:password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
   
        return redirect()->action(
            'AppController@app'
        );
    }
}
