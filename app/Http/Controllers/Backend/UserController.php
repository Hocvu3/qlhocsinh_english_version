<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function UserView(){
        $data['allData'] = User::whereIn('role',['Admin','Operator'])->get();
        return view('backend.user.view_user',$data);
    }
    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        $validatedData = $request->validate([
            // 'email' => 'required|unique:users',
            // 'name'=>'required',
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
        $notificaation = array(
            'message'=>'User inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('user.view')->with($notificaation);

    }
    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }
    public function UserUpdate(Request $request,$id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        //$data->password = bcrypt($request->password);
        $data->save();
        $notificaation = array(
            'message'=>'User updated successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('user.view')->with($notificaation);
    }
    public function UserDelete($id){
        $user = User::find($id);
        $user->student()->delete();
        $user->delete();

        $notificaation = array(
            'message'=>'User deleted successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('user.view')->with($notificaation);
    }
}
