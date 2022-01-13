<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubjectStudent(){
        $data['alldata'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',$data);
    }

    public function AddSchoolSubjectStudent(){
        return view('backend.setup.school_subject.add_school_subject');
    }


    public function StoreSchoolSubjectStudent(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        $notification = array(
         'message' => 'School Subject Add Sussessfully',
         'alert-type'=> 'success'
       );
 
     return redirect()->route('student.school.subject.view')->with($notification);
    }


    public function EditSchoolSubjectStudent($id){
        $student = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('student'));
    }


    public function UpdateSchoolSubjectStudent(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);
        $student = SchoolSubject::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'School Subject Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('student.school.subject.view')->with($notification);
    }


    public function DeleteSchoolSubjectStudent($id){
        $student = SchoolSubject::find($id);
        $student->delete();
        $notification = array(
            'message' => 'School Subject Deleted Sussessfully',
            'alert-type'=> 'warning'
          );
    
        return redirect()->route('student.school.subject.view')->with($notification);
    }
}
