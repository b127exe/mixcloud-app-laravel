<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function Login()
    {

        return view('Auth.login');
    }

    public function Register()
    {

        return view('Auth.register');
    }

    public function LoginStore(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('users')->select('users.*')->where('email','=',$request['email'])->where('password','=',md5($request['password']))->get();

        // echo $user[0]->password;

        if($user){

          session()->put(['email'=> $user[0]->email , 'photo' => $user[0]->profile_photo , 'id' => $user[0]->uid , 'role' => $user[0]->role]);

          if(session()->get('role') == 1){
            return redirect('/dashboard');
          }
          else{
            return redirect('/mixcloud');
          }

        }
    }

    public function RegisterStore(Request $request)
    {

        $request->validate([
            'img' => 'required',
            'name' => 'required|max:200',
            'password' => 'required'
        ]);

        $img = $request->file('img');
        $imgName = $img->getClientOriginalName();
        $imgName = Str::random(8) . $imgName;
        $img->move('storage/users-images/', $imgName);

        $users = new User;

        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password = md5($request['password']);
        $users->profile_photo = $imgName;
        $users->save();

        return redirect('/login');
    }

    public function Logout()
    {

        session()->flush();
        return redirect('/login');
    }
}
