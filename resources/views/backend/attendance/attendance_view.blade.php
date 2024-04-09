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
                <h3 class="box-title">Student Attendance Report</h3>
                <a href="{{route('student.attendance.add')}}" style="float:right;" class = "btn btn-rounded btn-success mb-5">Make Attendance</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>

                              <th>Date</th>

                              <th>Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ( $allData as $key=>$value)
                            

                          <tr>
                              <td>{{$key + 1}}</td>

                              <td>{{$value->date}}</td>

                              <td>
                                <a href="{{route('student.attendance.edit',$value->date)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('student.attendance.delete',$value->date)}}" class="btn btn-success">Detail</a>
                                </td> 
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>SL</th>

                            <th>Date</th>

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