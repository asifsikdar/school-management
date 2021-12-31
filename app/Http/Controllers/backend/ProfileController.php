<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
      public function ProfileView(){
        $id = Auth::User()->id;
        $user = User::find($id);

        return view('backend.profile.view_profile',compact('user'));
      }

      public function ProfileEdit(){
          $id = Auth::User()->id;
          $user = User::find($id);
    
          return view('backend.profile.edit_profile',compact('user')); 
      }

      public function ProfileStore(Request $request){
        $data = User::find(Auth::User()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/user_image/'.$data->image));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/user_image'),$filename);
          $data['image'] = $filename;

        }
        $data->save();
        $notification = array(
          'message' => 'Inserted Sussessfully',
          'alert-type'=> 'success'
        );

      return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordView(){
      return view('backend.profile.edit_password');
    }

    public function PasswordUpdate(Request $request){
        $validation = $request->validate([
          'oldpassword' => 'required',
          'password'  => 'required|confirmed',
      ]);

      $hashpassword = Auth::User()->password;
      if(Hash::check($request->oldpassword, $hashpassword)){
          $user = User::find(Auth::id());
          $user->password = Hash::make($request->password);
          $user->save();
          Auth::logout();
          return redirect()->route('login');
      }else{
        return redirect()->back();
      }
   }
}
