@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Fee Category</h3>
                <a href="{{route('student.fee.add')}}" style="float:right;" class = "btn btn-rounded btn-success mb-5">Add Fee Category</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Name</th>
                              <th>Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ( $allData as $key=>$fee_category)
                            

                          <tr>
                              <td>{{$key + 1}}</td>
                              <td>{{$fee_category->name}}</td>
                              <td>
                                <a href="{{route('student.fee.edit',$fee_category->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('student.fee.delete',$fee_category->id)}}" class="btn btn-danger" id ="delete">Delete</a>
                                </td> 
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Action</th> 
                          </tr>
                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
              <!-- /.box-body -->
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>

@endsection