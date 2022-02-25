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
                @unlink(public_path('upload/student_image/'.$user->image));
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
