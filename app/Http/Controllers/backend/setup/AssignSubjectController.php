<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\SchoolSubject;
use App\Models\AssignSubject;
class AssignSubjectController extends Controller
{
    public function ViewAssignSubjectStudent(){
        // $data['alldata']= AssignSubject::all();
        $data['alldata']= AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',$data);
    }


    public function AddAssignSubjectStudent(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    } 


    
    public function StoreAssignSubjectStudent(Request $request){
        $subjectCount = count($request->subject_id);
        if($subjectCount !=NULL){
            for($i=0; $i<$subjectCount;$i++){
                $assign_sub = new AssignSubject();
                $assign_sub->class_id = $request->class_id;
                $assign_sub->subject_id = $request->subject_id[$i];
                $assign_sub->full_mark = $request->full_mark[$i];
                $assign_sub->pass_mark = $request->pass_mark[$i];
                $assign_sub->subjective_mark = $request->subjective_mark[$i];
                $assign_sub->save();
            }//    end for
        }//    end if 

        $notification = array(
            'message' => 'Subject Assign Add Sussessfully',
            'alert-type'=> 'success'
          );
    
        return redirect()->route('student.assign.subject.view')->with($notification);
    }


    public function EditAssignSubjectStudent($class_id){
        $data['editdata'] = AssignSubject::where('class_id',$class_id)
        ->orderBy('subject_id','asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject',$data);
    }


    public function UpdateAssignSubjectStudent(Request $request,$class_id){
        if($request->subject_id == NULL){
            $notification = array(
                'message' => 'Sorry You Do Not Select Any Subject',
                'alert-type'=> 'error'
              );
        
            return redirect()->route('student.assign.subject.edit',$class_id)->with($notification);
        }else{
           $countSubject = count($request->subject_id);
           AssignSubject::where('class_id',$class_id)->delete();
            for($i=0; $i<$countSubject;$i++){
                $assign_sub = new AssignSubject();
                $assign_sub->class_id = $request->class_id;
                $assign_sub->subject_id = $request->subject_id[$i];
                $assign_sub->full_mark = $request->full_mark[$i];
                $assign_sub->pass_mark = $request->pass_mark[$i];
                $assign_sub->subjective_mark = $request->subjective_mark[$i];
                $assign_sub->save();
            }//    end for
        }
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type'=> 'success'
          );
    
        return redirect()->route('student.assign.subject.view')->with($notification);
    }


    public function DetailsAssignSubjectStudent($class_id){
        $data['detailsdata'] = AssignSubject::where('class_id',$class_id)
        ->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject',$data);
    }
}
