<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudent(){
        $data['alldata'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }

    public function AddStudent(){
        return view('backend.setup.student_class.add_class');
    }

    public function StoreStudent(Request $request){
       $validate = $request->validate([
           'name' => 'required|unique:student_classes,name',
       ]);
       $data = new StudentClass();
       $data->name = $request->name;
       $data->save();
       $notification = array(
        'message' => 'Class Add Sussessfully',
        'alert-type'=> 'success'
      );

    return redirect()->route('student.class.view')->with($notification);
    }

    public function EditStudent($id){
        $student = StudentClass::find($id);
        return view('backend.setup.student_class.student_edit',compact('student'));
    }

    public function UpdateStudent(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);
        $student = StudentClass::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'Class Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('student.class.view')->with($notification);
    }

    public function DeleteStudent($id){
        $data = StudentClass::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Class Deleted Sussessfully',
            'alert-type'=> 'warning'
          );

        return redirect()->back()->with($notification);  
    }
       
}
