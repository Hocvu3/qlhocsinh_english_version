<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\User;
use DB;
class StudentRegController extends Controller
{
    public function StudentRegView(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;

        $data['allData'] = AssignStudent::all();
        return view('backend.student.student_reg.student_view',$data);
    }
    public function StudentRegSearch(Request $request){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year;
        $data['class_id'] = $request->class;

        $data['allData'] = AssignStudent::where('year_id',$request->year)->where('class_id',$request->class)->get();
        return view('backend.student.student_reg.student_view',$data);
    }
    public function StudentRegAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_reg.student_add',$data);
    }

    public function StudentRegStore(Request $request){
        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year)->name;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();

            if($student==null){
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }elseif($studentId<100){
                    $id_no = '00'.$studentId;
                }elseif($studentId<1000){
                    $id_no = '0'.$studentId; 
                }
            }else{
                $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
                $studentId = $student+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }elseif($studentId<100){
                    $id_no = '00'.$studentId;
                }elseif($studentId<1000){
                    $id_no = '0'.$studentId;
                }
            }
            $final_id_number = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_number;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year;
            $assign_student->class_id = $request->class;
            $assign_student->group_id = $request->group;
            $assign_student->shift_id = $request->shift;

            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });
        $notificaation = array(
            'message'=>'Registration inserted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.registration.view')->with($notificaation);
    }
    public function StudentRegEdit($student_id){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('backend.student.student_reg.student_edit',$data);
    }
    public function StudentRegUpdate(Request $request,$student_id){
        DB::transaction(function() use($request,$student_id){
            
            $user =  User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/user_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();

            $assign_student->year_id = $request->year;
            $assign_student->class_id = $request->class;
            $assign_student->group_id = $request->group;
            $assign_student->shift_id = $request->shift;

            $assign_student->save();

            $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();

            $discount_student->discount = $request->discount;
            $discount_student->save();

        });
        $notificaation = array(
            'message'=>'Registration updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.registration.view')->with($notificaation);
    }
    public function StudentRegDelete($student_id){
        $data = User::find($student_id);
        $data->delete();
        $notificaation = array(
            'message'=>'Student deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('student.registration.view')->with($notificaation);
    }
}
