<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function postNewStudent(Request $request){
        $this->validate($request,[
           'name'=>'required',
            'roll_no'=>'required',
            'class'=>'required',
            'address'=>'required',
        ]);

        $stud = new Student();
        $stud-> name =$request['name'];
        $stud-> roll_no =$request['roll_no'];
        $stud->class=$request['class'];
        $stud-> address = $request['address'];

        $stud->save();

        return redirect()->back()->with('info','Add new student successful.');
    }


    public function editStudent(Request $request){

        $id = $request['id'];
        $stud = Student::find($id);

        $stud-> name =$request['name'];
        $stud-> roll_no =$request['roll_no'];
        $stud->class=$request['class'];
        $stud-> address = $request['address'];

        $stud->update();

        return redirect()->back()->with('info','Update new student successful.');

    }

    public function getDelete($id){
        $stud=Student::find($id);
        $stud->delete();
        return redirect()->back()->with('info','Delete student successful.');

    }
}
