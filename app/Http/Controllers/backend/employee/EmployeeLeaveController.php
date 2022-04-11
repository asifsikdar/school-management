<?php

namespace App\Http\Controllers\backend\employee;

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
use App\Models\ExamType;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use DB;

class EmployeeLeaveController extends Controller
{
    public function EmployeeLeaveView(){
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.employee_leave.employee_leave_view',$data);
    }

    public function EmployeeLeaveAdd(){
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_add',$data);
    }

    public function EmployeeLeaveStore(request $request){
        if($request->leave_purpose_id == '0'){
            $leave = new LeavePurpose();
            $leave->name = $request->name;
            $leave->save();
            $leave_purpose_id = $leave->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employeeleave = new EmployeeLeave();
        $employeeleave->employee_id = $request->employee_id;
        $employeeleave->leave_purpose_id = $leave_purpose_id;
        $employeeleave->start_date = date('Y-m-d',strtotime($request->start_date));
        $employeeleave->end_date = date('Y-m-d',strtotime($request->end_date));
        $employeeleave->save();
        
        $notification = array(
            'message' => 'Student Registration Inserted Sussessfully',
            'alert-type'=> 'success'
          );
  
        return redirect()->route('employee.leave.view')->with($notification);
        
    }


    public function EmployeeLeaveEdit($id){
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_edit',$data);
    }

    public function EmployeeLeaveUpdate(request $request,$id){
        if($request->leave_purpose_id == '0'){
            $leave = new LeavePurpose();
            $leave->name = $request->name;
            $leave->save();
            $leave_purpose_id = $leave->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
        $employeeleave =  EmployeeLeave::find($id);
        $employeeleave->employee_id = $request->employee_id;
        $employeeleave->leave_purpose_id = $leave_purpose_id;
        $employeeleave->start_date = date('Y-m-d',strtotime($request->start_date));
        $employeeleave->end_date = date('Y-m-d',strtotime($request->end_date));
        $employeeleave->save();
        
        $notification = array(
            'message' => 'Student Registration Updated Sussessfully',
            'alert-type'=> 'success'
          );
  
        return redirect()->route('employee.leave.view')->with($notification);
    }



    public function EmployeeLeaveDelete($id){
        $leave = EmployeeLeave::find($id);
        $leave->delete();

        $notification = array(
            'message' => 'Student Registration Deleted Sussessfully',
            'alert-type'=> 'success'
          );
  
        return redirect()->route('employee.leave.view')->with($notification);
    }
}
