<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
class  AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
        //$data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        // return view('backend.setup.fee_amount.view_fee_amount',$data);
        return view('backend.setup.assign_subject.view_assign_subject',$data);

    }
    public function AddAssignSubject(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    }
    public function StoreAssignSubject(Request $request){
        $subjectCount = count($request->subject_id);
        if($subjectCount!=null){
            for($i=0;$i<$subjectCount;$i++){
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();

            }
        }
        $notificaation = array(
            'message'=>'Assign subject inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('assign.subject.view')->with($notificaation);
    }
    public function EditAssignSubject($class_id){
        $data['editData'] = AssignSubject::where('class_id',$class_id )->orderBy('subject_id','asc')->get();
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject',$data); 
    }
    public function UpdateAssignSubject(Request $request,$class_id){
        if($request->subject_id==NULL){
            $notificaation = array(
                'message'=>'Sorry you do not select any subject',
                'alert-type'=>'error'
            );
            return redirect()->route('assign.subject.edit',$class_id)->with($notificaation);
        }else{
            $countClass = count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();
                for($i=0;$i<$countClass;$i++){
                    $assign_subject = new AssignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark = $request->subjective_mark[$i];
                    $assign_subject->save(); 
                }
                $notificaation = array(
                    'message'=>'Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('assign.subject.view')->with($notificaation);
        }
        //end method
    }
    public function DetailAssignSubject($class_id){
        $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject',$data);

    }
}
