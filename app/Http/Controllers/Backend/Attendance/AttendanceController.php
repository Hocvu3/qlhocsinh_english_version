<?php

namespace App\Http\Controllers\Backend\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\User;

class AttendanceController extends Controller
{
    public function AttendanceView(){
        // $data['allData'] = Attendance::orderBy('id','DESC')->get();
        $data['allData'] = Attendance::select('date')->groupBy('date')->orderBy('id','DESC')->get();
        return view('backend.attendance.attendance_view',$data);
    }
    public function AttendanceAdd(){
        $data['students'] = User::where('usertype','Student')->get();
        return view('backend.attendance.attendance_add',$data);
    }
    public function AttendanceStore(Request $request){
        Attendance::where('date',date('Y-m-d'),strtotime(($request->date)))->delete();
        $countStudent = count($request->student_id);
        for($i=0;$i<$countStudent;$i++){
            $attend_status = 'attend_status'.$i;
            $attend = new Attendance();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->student_id = $request->student_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();

        }
        $notificaation = array(
            'message'=>'Attendance added successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('attendance.view')->with($notificaation);
    }
    public function AttendanceEdit($date){
        $data['editData'] = Attendance::where('date',$date)->get();
        $data['students'] = User::where('usertype','Student')->get();
        return view('backend.attendance.attendance_edit',$data);
    }
    public function AttendanceDetail($date){
        $data['details'] = Attendance::where('date',$date)->get();
        return view('backend.attendance.attendance_detail',$data);
    }
}
