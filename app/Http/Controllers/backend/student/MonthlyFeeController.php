<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentFeeAmount;
use DB;
use PDF;

class MonthlyFeeController extends Controller
{
    public function MonthlyFeeView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        return view('backend.student.monthly_fee.monthly_fee_view',$data);
    }

    public function MonthlyFeeGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount </th>';
        $html['thsource'] .= '<th>Student Fee </th>';
        $html['thsource'] .= '<th>Payment Status </th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($allStudent as $key => $v) {
            $registrationfee = StudentFeeAmount::where('fee_category_id','4')->where('class_id',$v->class_id)->first();
            // dd($registrationfee);
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;
            $paymentstatus = 'Pending';

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>'.$paymentstatus.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">Fee Slip</a>';
            $html[$key]['tdsource'] .='<a class="ml-5 btn btn-sm btn-'.$color.'" title="payment" href="'.route("student.monthly.fee.payment.view").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">Payment</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);
 
   }// end method 


   public function MonthlyFeepayslip(Request $request){
    $class_id = $request->class_id;
    $student_id = $request->student_id;
    $data['month'] = $request->month;
    $data['details'] = AssignStudent::with(['student','discount'])->where('class_id',$class_id)->where('student_id',$student_id)->first();
//   dd($data['payslip']);
    $pdf = PDF::loadView('backend.student.monthly_fee.monthly_fee_pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
}


//    public function MonthlyFeePaymentView(Request $request){
//     $class_id = $request->class_id;
//     $student_id = $request->student_id;
//     $data1['details'] = AssignStudent::with(['student','discount'])
//     ->where('class_id',$class_id)
//     ->where('student_id',$student_id)->first();
//     // dd($data['details']);
//     return view('backend.student.monthly_fee.monthlyfee_payment_view'); 
//    }

}
