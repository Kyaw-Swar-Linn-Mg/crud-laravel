<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function getRegister(){
        return view('auth/register');
    }

    public function getLogin(){
        return view('auth/login');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function getDashboard(){
        $stud = Student::all();
        return view('admin/dashboard')->with(['studs'=>$stud]);
    }

    public function postRegister(Request $request){

        $this->validate($request,[
           'name'=>'required|unique:users',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',
        ]);

        $user = new User();
        $user-> name = $request['name'];
        $user-> email = $request['email'];
        $user-> password = bcrypt($request['password']);

        $user->save();
        return redirect()->back()->with('regInfo','You have been created new user');
    }

    public function postLogin(Request $request){

        $this->validate($request,[
            'name'=>'required|exists:users',
            'password'=>'required|min:6',
        ]);

            $name = $request['name'];
            $password = $request['password'];

            if(Auth::attempt(['name'=>$name,'password'=>$password])){
                return redirect()->route('dashboard');
            }else{
                return redirect()->back()->with('err','Login Fail.');
            }

    }
}
