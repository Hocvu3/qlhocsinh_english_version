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
             <h4 class="box-title">Add User</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method = "post" action = "{{route('user.store')}}">
                    @csrf
                     <div class="row">
                       <div class="col-12">
                        

                        <div class="form-group">
                            <h5>User Role <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="role" id="role" required="" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Operator">Operator</option>
                                </select>
                            </div>
                        </div>
                        <div>					
                           <div class="form-group">
                               <h5>User name <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="text" name="name" class="form-control" required=""></div></div>
                           </div>
                           <div class="form-group">
                               <h5>User Email <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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

@endsection