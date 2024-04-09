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
             <h4 class="box-title">Update User</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method = "post" action = "{{route('user.update',$editData->id)}}">
                    @csrf
                     <div class="row">
                       <div class="col-12">
                        

                        <div class="form-group">
                            <h5>User Role <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="usertype" id="usertype" required="" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="Admin" {{($editData->role=="Admin"?"selected":"")}}>Admin</option>
                                    <option value="Operator" {{($editData->role=="Operator"?"selected":"")}}>Operator</option>
                                </select>
                            </div>
                        </div>
                        <div>					
                           <div class="form-group">
                               <h5>User name <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="text" name="name" class="form-control" value="{{$editData->name}}"></div></div>
                           </div>
                           <div class="form-group">
                               <h5>User Email <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="email" name="email" class="form-control" value="{{$editData->email}}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                           </div>

                            {{-- <div class="form-group">
                            <h5>Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="password" name="password" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                            </div> --}}
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