@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      
      <!-- /.content -->
        
      <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Edit</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method = "post" action = "{{route('store.student.attendance')}}">
                    @csrf
                     <div class="row">
                       <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="date" value="{{$editData['0']['date']}}" class="form-control" id = "current_password" data-validation-required-message="This field is required"> <div class="help-block">
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped" style="width: 100%">
                                    <tr>
                                        <th>SL</th>
                                        <th>Student List</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                    @foreach($editData as $key=>$data)
                                    <tr id="div{{$data->id}}" class="text-center">
                                        <input type="hidden" name="student_id[]" value="{{$data->student_id}}">
                                        <th>{{$key+1}}</th>
                                        <th>{{$data['user']['name']}}</th>
                                        <th>
                                            <div class="switch-toggle switch-3 switch-candy">
                                                <input name="attend_status{{$key}}" type="radio" id = "present{{$key}}" value="Present" checked="checked" {{($data->attend_status =='Present')?'checked':''}}>
                                                <label for="present{{$key}}">Có Mặt</label>
                                                <input name="attend_status{{$key}}" type="radio" id = "absent{{$key}}" value="Absent"{{($data->attend_status =='Absent')?'checked':''}}>
                                                <label for="absent{{$key}}">Nghỉ</label>
                                        </th>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value = "Update">
                            </div>
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
    </div>
</div>

@endsection