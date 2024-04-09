@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">

     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-xl-2 col-6">
                 <div class="box overflow-hidden pull-up">
                     <div class="box-body">							
                         <div class="icon bg-primary-light rounded w-60 h-60">
                             <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                         </div>
                         <div>
                             <p class="text-mute mt-20 mb-0 font-size-16">Total Students</p>
                             <h3 class="text-white mb-0 font-weight-500">{{$user_count}}</h3>
                         </div>
                     </div>
                 </div>
             </div>
             
             <div class="col-xl-2 col-6">
                 <div class="box overflow-hidden pull-up">
                     <div class="box-body">							
                         <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-school"></i> 
                         </div>
                         <div>
                             <p class="text-mute mt-20 mb-0 font-size-16">ToTal Classes</p>
                             <h3 class="text-white mb-0 font-weight-500">{{$class_count}}</h3>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-2 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-secondary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-book"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">ToTal Subjects</p>
                            <h3 class="text-white mb-0 font-weight-500">{{$subject_count}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">							
                        <div class="icon bg-success-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-pencil"></i> 
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">ToTal Exams</p>
                            <h3 class="text-white mb-0 font-weight-500">{{$exam_count}}</h3>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-xl-2 col-6">
                 <div class="box overflow-hidden pull-up">
                     <div class="box-body">							
                         <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-currency-usd"></i>
                         </div>
                         <div>
                             <p class="text-mute mt-20 mb-0 font-size-16">Total Income</p>
                             <h3 class="text-white mb-0 font-weight-500">${{$amount_sum}}</h3>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xxxl-7 col-xl-6 col-12">
                 <div class="box">
                     <div class="box-header">
                         <h4 class="box-title">Recent Income Stats</h4>
                     </div>
                     <div class="box-body">
                         <div id="recent_trend"></div>
                     </div>
                 </div>
             </div> 
         </div>
     </section>
     <!-- /.content -->
   </div>
</div>
@endsection 