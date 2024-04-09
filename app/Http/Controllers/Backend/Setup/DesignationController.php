<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
class DesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }
    public function AddDesignation(){
        return view('backend.setup.designation.add_designation');
    }
    public function StoreDesignation(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|unique:designations,name',
        ]);
        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=>'Designation added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
    public function EditDesignation($id){
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editData'));
    }
    public function UpdateDesignation(Request $request,$id){
        $data = Designation::find($id);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=>'Designation updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
    public function DeleteDesignation($id){
        $data = Designation::find($id);
        $data->delete();
        $notification = array(
            'message'=>'Designation deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
}
