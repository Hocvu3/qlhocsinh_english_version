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
                <h3 class="box-title">Fee Amount Details</h3>
                <a href="{{route('fee.amount.add')}}" style="float:right;" class = "btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>
                    Fee Category : 
                    </strong>
                    {{$detailsData['0']['fee_category']['name']}}
                </h4>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SL</th>
                              <th>Class Name</th>
                              <th>Amount</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ( $detailsData as $key=>$detail)
                            

                          <tr>
                              <td>{{$key + 1}}</td>
                              <td>{{$detail['student_class']['name']}}</td>
                              <td>{{$detail->amount}}</td>
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