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

class EmployeeRegController extends Controller
{
    public function EmployeeRegView(){
        $data['alldata'] = User::where('usertype','Employee')->get();
        return view('backend.employee.employee_reg_view',$data);
    }

    public function EmployeeRegAdd(){
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_add',$data);
    }

    public function EmployeeRegEdit($id){
        $data['editData'] = User::find($id);
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_edit',$data);
    }

    public function EmployeeRegStore(Request $request){
        DB::transaction(function() use($request){ 
            $checkYear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first();

            if($employee == null){
                $firstReg = 0;
                $employee_id = $firstReg+1;
                if($studentId < 10){
                    $id_no = '000'.$employee_id;
                }elseif($employee_id < 100){
                    $id_no = '00'.$employee_id;
                }elseif($employee_id < 1000){
                    $id_no = '0'.$employee_id;
                }
            }else{
                $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first()->id;
                $employee_id = $employee+1;
                if($employee_id < 10){
                    $id_no = '000'.$employee_id;
                }elseif($employee_id < 100){
                    $id_no = '00'.$employee_id;
                }elseif($employee_id < 1000){
                    $id_no = '0'.$employee_id;
                }
            }

            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/employee_image/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'),$filename);
                $user['image'] = $filename;
              }

              $user->save();

               $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save(); 
            
        });

        $notification = array(
            'message' => 'Student Registration Inserted Sussessfully',
            'alert-type'=> 'success'
          );
  
        return redirect()->route('employee.registration.view')->with($notification);

    }
    public function EmployeeRegUpdate(Request $request,$id){
        $user =  User::find($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/employee_image/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'),$filename);
                $user['image'] = $filename;
              }

              $user->save();


        $notification = array(
            'message' => 'Employee Registration Updated Sussessfully',
            'alert-type'=> 'success'
          );
  
        return redirect()->route('employee.registration.view')->with($notification);
    }


    public function EmployeeRegDetails($id){
        $data['details'] = User::find($id);
        $pdf = PDF::loadView('backend.employee.employee_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
	    return $pdf->stream('document.pdf');
    }
}
