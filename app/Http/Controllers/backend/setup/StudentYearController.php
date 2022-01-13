<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYearStudent(){
        $data['alldata'] = StudentYear::all();
        return view('backend.setup.year.view_year',$data);
    }

    public function AddYearStudent(){

        return view('backend.setup.year.add_year');
    }
    public function StoreYearStudent(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        $notification = array(
         'message' => 'Year Add Sussessfully',
         'alert-type'=> 'success'
       );
 
     return redirect()->route('student.year.view')->with($notification);
     }

     public function EditYearStudent($id){
        $student = StudentYear::find($id);
        return view('backend.setup.year.edit_year',compact('student'));
    }

    public function UpdateYearStudent(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);
        $student = StudentYear::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'Year Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('student.year.view')->with($notification);
    }

    public function DeleteYearStudent($id){
        $student = StudentYear::find($id);
        $student->delete();
        $notification = array(
            'message' => 'Year Deleted Sussessfully',
            'alert-type'=> 'warning'
          );
    
        return redirect()->route('student.year.view')->with($notification);
    }
}
