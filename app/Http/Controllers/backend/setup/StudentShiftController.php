<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShiftStudent(){
        $data['alldata'] = StudentShift::all();
        return view('backend.setup.shift.view_shift',$data);
    }

    public function AddShiftStudent(){

        return view('backend.setup.shift.add_shift');
    }
    public function StoreShiftStudent(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $notification = array(
         'message' => 'Shift Add Sussessfully',
         'alert-type'=> 'success'
       );
 
     return redirect()->route('student.shift.view')->with($notification);
     }

     public function EditShiftStudent($id){
        $student = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift',compact('student'));
    }

    public function UpdateShiftStudent(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);
        $student = StudentShift::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'Shift Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('student.shift.view')->with($notification);
    }

    public function DeleteShiftStudent($id){
        $student = StudentShift::find($id);
        $student->delete();
        $notification = array(
            'message' => 'Shift Deleted Sussessfully',
            'alert-type'=> 'warning'
          );
    
        return redirect()->route('student.shift.view')->with($notification);
    }
}
