<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.schoolsubject.view_schoolsubject',$data);
    }

    public function AddSchoolSubject(){
        return view('backend.setup.schoolsubject.add_schoolsubject');
    }

    public function StoreSchoolSubject(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|unique:school_subjects,name',
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message'=>'school subject inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view');
    }
    public function EditSchoolSubject($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.schoolsubject.edit_schoolsubject',compact('editData'));
    }

    public function UpdateSchoolSubject(Request $request,$id){
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name'=>'required|unique:school_subjects,name',
        ]);
        $data->name = $request->name;
        $data->save();
        
        $notificaation = array(
            'message'=>'school subject update successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view')->with($notificaation);
    }
    public function DeleteSchoolSubject($id){
        $data = SchoolSubject::find($id);
        $data->delete();
        $notificaation = array(
            'message'=>'school subject deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('school.subject.view')->with($notificaation);
    }
}
