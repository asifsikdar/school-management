<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
    //   $data['alldata']=User::all();
      $data['alldata'] = User::where('usertype','Admin')->get();
      return view('backend.user.view_user',$data);
    }

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
      
        $validation = $request->validate([
           'email' => 'required|email|unique:users',
           'name'  => 'required',
        ]);
        $data = new User();
        $code = rand(0000,9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->save();

        $notification = array(
            'message' => 'Inserted Sussessfully',
            'alert-type'=> 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }


    public function UserEdit($id){
        $data = User::find($id);
        return view('backend.user.edit_user',compact('data'));
    }

    public function UserUpdate(Request $request,$id){
       
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'Updated Sussessfully',
            'alert-type'=> 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id){
       $data= User::find($id);
       $data->delete();

       $notification = array(
        'message' => 'Deleted Sussessfully',
        'alert-type'=> 'warning' 
    );

    return redirect()->route('user.view')->with($notification);
    }
}
