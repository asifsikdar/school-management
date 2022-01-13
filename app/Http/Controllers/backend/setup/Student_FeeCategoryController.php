<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeCategory;

class Student_FeeCategoryController extends Controller
{
    public function ViewFeeCatStudent(){
        $data['alldata'] = StudentFeeCategory::all();
        return view('backend.setup.fee_category.view_feecategory',$data);
    }

    public function AddFeeCatStudent(){

        return view('backend.setup.fee_category.add_feecategory');
    }
    public function StoreFeeCatStudent(Request $request){
        $validate = $request->validate([
            'name' => 'required|unique:student_fee_categories,name',
        ]);
        $data = new StudentFeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = array(
         'message' => 'Fee Category Add Sussessfully',
         'alert-type'=> 'success'
       );
 
     return redirect()->route('student.fee.cat.view')->with($notification);
     }

     public function EditFeeCatStudent($id){
        $student = StudentFeeCategory::find($id);
        return view('backend.setup.fee_category.edit_feecategory',compact('student'));
    }

    public function UpdateFeeCatStudent(Request $request,$id){
        $validate = $request->validate([
            'name' => 'required|unique:student_fee_categories,name',
        ]);
        $student = StudentFeeCategory::find($id);
        $student->name = $request->name;
        $student->save();
        $notification = array(
         'message' => 'Fee Category Update Sussessfully',
         'alert-type'=> 'info'
       );
 
     return redirect()->route('student.fee.cat.view')->with($notification);
    }

    public function DeleteFeeCatStudent($id){
        $student = StudentFeeCategory::find($id);
        $student->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Sussessfully',
            'alert-type'=> 'warning'
          );
    
        return redirect()->route('student.fee.cat.view')->with($notification);
    }
}
