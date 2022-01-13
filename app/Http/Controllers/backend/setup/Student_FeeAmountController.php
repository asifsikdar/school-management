<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use App\Models\StudentFeeAmount;

class Student_FeeAmountController extends Controller
{
    public function ViewFeeAmountStudent(){
        // $data['alldata']= StudentFeeAmount::all();
        $data['alldata']= StudentFeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_feeamount',$data);
    }

    public function AddFeeAmountStudent(){
        $data['fee_categories'] = StudentFeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_feeamount',$data);
    }

    public function StoreFeeAmountStudent(Request $request){
        $countClass = count($request->class_id);
        if($countClass !=NULL){
            for($i=0; $i<$countClass;$i++){
                $fee_amount = new StudentFeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//    end for
        }//    end if 

        $notification = array(
            'message' => 'Fee Amount Add Sussessfully',
            'alert-type'=> 'success'
          );
    
        return redirect()->route('student.fee.amount.view')->with($notification);
    }


    public function EditFeeAmountStudent($fee_category_id){
        $data['editdata'] = StudentFeeAmount::where('fee_category_id',$fee_category_id)
        ->orderBy('class_id','asc')->get();
        $data['fee_categories'] = StudentFeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_feeamount',$data);
    }

    public function UpdateFeeAmountStudent(Request $request,$fee_category_id){
        if($request->class_id == NULL){
            $notification = array(
                'message' => 'Sorry You Do Not Select Any Class',
                'alert-type'=> 'error'
              );
        
            return redirect()->route('student.fee.amount.edit',$fee_category_id)->with($notification);
        }else{
           $countClass = count($request->class_id);
           StudentFeeAmount::where('fee_category_id',$fee_category_id)->delete();
            for($i=0; $i<$countClass;$i++){
                $fee_amount = new StudentFeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//    end for
        }
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type'=> 'success'
          );
    
        return redirect()->route('student.fee.amount.view')->with($notification);
    }

    public function DetailsFeeAmountStudent($fee_category_id){
        $data['detailsdata'] = StudentFeeAmount::where('fee_category_id',$fee_category_id)
        ->orderBy('class_id','asc')->get();
        return view('backend.setup.fee_amount.details_feeamount',$data);
    }
}
