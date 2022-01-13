<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['alldata'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }

    public function AddDesignation(){
        return view('backend.setup.designation.add_designation');
    }

    public function StoreDesignation(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);
        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $notification = array(
         'message' => 'Designation Add Sussessfully',
         'alert-type'=> 'success'
       );
 
     return redirect()->route('designation.view')->with($notification);
     }


     public function EditDesignation($id){
        $designation = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('designation'));
    }


    public function UpdateDesignation(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);
        $student = Designation::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'Designation  Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('designation.view')->with($notification);
    }


    
    public function DeleteDesignation($id){
        $student = Designation::find($id);
        $student->delete();
        $notification = array(
            'message' => 'Designation Deleted Sussessfully',
            'alert-type'=> 'warning'
          );
    
        return redirect()->route('designation.view')->with($notification);
    }
}
