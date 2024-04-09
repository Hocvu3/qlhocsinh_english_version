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
                <h3 class="box-title">Assign Subject Details</h3>
                <a href="{{route('assign.subject.add')}}" style="float:right;" class = "btn btn-rounded btn-success mb-5">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>
                    Assign Subject : 
                    </strong>
                    {{$detailsData['0']['student_class']['name']}}
                </h4>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Subject</th>
                              <th>Full Mark</th>
                              <th>Pass Mark</th>
                              <th>Subjective Mark</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ( $detailsData as $key=>$detail)
                            

                          <tr>
                              <td>{{$key + 1}}</td>
                              <td>{{$detail['school_subject']['name']}}</td>
                              <td>{{$detail->full_mark}}</td>
                              <td>{{$detail->pass_mark}}</td>
                              <td>{{$detail->subjective_mark}}</td>
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