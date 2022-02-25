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
use DB;
use PDF;

class EmployeeSalaryController extends Controller
{
    public function EmployeeSalaryView(){
        $data['allData'] = User::where('usertype','Employee')->get();
        return view('backend.employee.salary.employee_salary_view',$data);
    }

    public function EmployeeSalaryIncrement($id){
        $data['allData'] = User::find($id);
        return view('backend.employee.salary.add_increment_salary',$data);
    }

    public function EmployeeSalaryIncrementStore(Request $request,$id){
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->present_salary = $present_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
        $salaryData->save();

        
        $notification = array(
            'message' => 'Employee Salary Increment Sussessfully',
            'alert-type'=> 'success'
          );
  
        return redirect()->route('employee.salary.view')->with($notification);
    }

    public function EmployeeIncrementDetails($id){
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
        return view('backend.employee.salary.employee_salary_details',$data);
    }
}
