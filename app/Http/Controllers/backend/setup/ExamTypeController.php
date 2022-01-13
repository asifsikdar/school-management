<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamTypeStudent(){
        $data['alldata'] = ExamType::all();
        return view('backend.setup.examtype.view_examtype',$data);
    }

    public function AddExamTypeStudent(){
        return view('backend.setup.examtype.add_examtype');
    }

    public function StoreExamTypeStudent(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
         'message' => 'Exam Type Add Sussessfully',
         'alert-type'=> 'success'
       );
 
     return redirect()->route('student.exam.type.view')->with($notification);
    }


    public function EditExamTypeStudent($id){
        $student = ExamType::find($id);
        return view('backend.setup.examtype.edit_examtype',compact('student'));
    }


    public function UpdateExamTypeStudent(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        $student = ExamType::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'Exam Type Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('student.exam.type.view')->with($notification);
    }


    public function DeleteExamTypeStudent($id){
        $student = ExamType::find($id);
        $student->delete();
        $notification = array(
            'message' => 'Exam Type Deleted Sussessfully',
            'alert-type'=> 'warning'
          );
    
        return redirect()->route('student.exam.type.view')->with($notification);
    }
}
