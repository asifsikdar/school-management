<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroupStudent(){
        $data['alldata'] = StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    }

    public function AddGroupStudent(){

        return view('backend.setup.group.add_group');
    }
    public function StoreGroupStudent(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
         'message' => 'Group Add Sussessfully',
         'alert-type'=> 'success'
       );
 
     return redirect()->route('student.group.view')->with($notification);
     }

     public function EditGroupStudent($id){
        $student = StudentGroup::find($id);
        return view('backend.setup.group.edit_group',compact('student'));
    }

    public function UpdateGroupStudent(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);
        $student = StudentGroup::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'Group Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('student.group.view')->with($notification);
    }

    public function DeleteGroupStudent($id){
        $student = StudentGroup::find($id);
        $student->delete();
        $notification = array(
            'message' => 'Group Deleted Sussessfully',
            'alert-type'=> 'warning'
          );
    
        return redirect()->route('student.group.view')->with($notification);
    }
}
