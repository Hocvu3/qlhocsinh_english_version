@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      
      <!-- /.content -->
        
      <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Add Student</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method = "post" action = "{{route('store.student.registration')}}" enctype = "multipart/form-data">
                    @csrf
                     <div class="row">
                       <div class="col-12">
                       <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h5>Student Name<span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="name" class="form-control" id = "current_password" required="This field is required"> <div class="help-block">
                                   </div>
                               </div>
                          </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <h5>Student's Father Name<span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="fname" class="form-control" id = "current_password" data-validation-required-message="This field is required"> <div class="help-block">
                                   </div>
                               </div>
                          </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <h5>Student's Mother Name<span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <input type="text" name="mname" class="form-control" id = "current_password" data-validation-required-message="This field is required"> <div class="help-block">
                                   </div>
                               </div>
                          </div>
                          </div>
                       </div>
                       
                       <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h5>Mobile Number<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="mobile" class="form-control" id = "current_password" required="This field is required"> <div class="help-block">
                                 </div>
                             </div>
                        </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <h5>Address<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="address" class="form-control" id = "current_password" data-validation-required-message="This field is required"> <div class="help-block">
                                 </div>
                             </div>
                        </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <h5>Gender<span class="text-danger">*</span></h5>
                            <div class="controls">
                              <select name="gender" id="gender" required="" class="form-control">
                                  <option value="">Select Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                              </select>
                          </div>
                        </div>
                        </div>
                     </div>
                     
                     <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <h5>Religion<span class="text-danger">*</span></h5>
                          <div class="controls">
                            <select name="religion" id="religion" required="" class="form-control">
                                <option value="">Select Religion</option>
                                <option value="Kinh">Kinh</option>
                                <option value="Tay">Tay</option>
                                <option value="Dao">Dao</option>
                                <option value="Thai">Thai</option>
                                <option value="Khac">Dan Toc Khac</option>
                            </select>
                        </div>
                      </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <h5>Date Of Birth<span class="text-danger">*</span></h5>
                          <div class="controls">
                              <input type="date" name="dob" class="form-control" id = "current_password" data-validation-required-message="This field is required"> <div class="help-block">
                               </div>
                           </div>
                      </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <h5>Discount<span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="text" name="discount" class="form-control" id = "current_password" data-validation-required-message="This field is required"> <div class="help-block">
                             </div>
                         </div>
                      </div>
                      </div>
                   </div>

                   <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5>Year<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="year" id="year" required="" class="form-control">
                              <option value="">Select Year</option>
                              @foreach ($years as $year)
                              <option value="{{$year->id}}">{{$year->name}}</option>                         
                              @endforeach
                          </select>
                      </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <h5>Class<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="class" id="class" required="" class="form-control">
                              <option value="">Select Class</option>
                              @foreach ($classes as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>                         
                              @endforeach
                          </select>
                      </div>
                    </div>
                    </div>


                    <div class="col-md-4">
                      <div class="form-group">
                        <h5>Group<span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="group" id="group" required="" class="form-control">
                              <option value="">Select Group</option>
                              @foreach ($groups as $group)
                              <option value="{{$group->id}}">{{$group->name}}</option>                         
                              @endforeach
                          </select>
                      </div>
                    </div>
                    </div>

                 </div>

                 <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <h5>Shift<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="shift" id="shift" required="" class="form-control">
                            <option value="">Select Shift</option>
                            @foreach ($shifts as $shift)
                            <option value="{{$shift->id}}">{{$shift->name}}</option>                         
                            @endforeach
                        </select>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <h5>Profile Image <span class="text-danger">*</span></h5>
                      <div class="controls">
                          <input type="file" name="image" class="form-control" id = "image"> <div class="help-block"></div></div>
                  </div>
                  </div>


                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="controls">
                      <img id ="showImage" src="{{url('upload/no_image.jpg')}}" alt="User Avatar" style ="width: 100px;border:1px solid #0000;">
                 </div>
               </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value = "Submit">
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
<script type="text/javascript">
  $(document).ready(function(){
      $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src', e.target.result);
          }
          reader.readAsDataURL(e.target.files[0]);
      });
  });
</script>
@endsection