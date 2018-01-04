<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class homeController extends Controller
{
    function getHome(){
        $studs = Student::all();
        return view('home')->with(['stud'=>$studs]);
    }
}
