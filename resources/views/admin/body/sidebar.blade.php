  @php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
  @endphp
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">	

						  <h3>LittleLearners</h3><small>Academy</small>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li>
      <a href="{{route('dashboard')}}">
        <i data-feather="home"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		@if(Auth::user()->role=='Admin')
        <li class="treeview {{($prefix == '/users')?'active':''}}">
          <a href="#">
            <i data-feather="user-check"></i>
            <span>Manager Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('user.view')}}"><i class="ti-more"></i>View Manager</a></li>
            <li><a href="{{route('user.add')}}"><i class="ti-more"></i>Add Manager</a></li>
          </ul>
        </li> 
		  @endif

        <li class="treeview {{($prefix == '/setups')?'active':''}}">
          <a href="#">
            <i data-feather="book-open"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('student.class.view')}}"><i class="ti-more"></i>Student Class</a></li>
            <li><a href="{{route('student.year.view')}}"><i class="ti-more"></i>Student Year</a></li>
            <li><a href="{{route('student.group.view')}}"><i class="ti-more"></i>Student Group</a></li>
            <li><a href="{{route('student.shift.view')}}"><i class="ti-more"></i>Student Shift</a></li>
            <li><a href="{{route('student.fee.view')}}"><i class="ti-more"></i>Student Fee Category</a></li>
            <li><a href="{{route('fee.amount.view')}}"><i class="ti-more"></i>Fee Category Amout</a></li>
            <li><a href="{{route('exam.type.view')}}"><i class="ti-more"></i>Exam Type</a></li>
            <li><a href="{{route('school.subject.view')}}"><i class="ti-more"></i>School Subject</a></li>
            <li><a href="{{route('assign.subject.view')}}"><i class="ti-more"></i>Assign Subject</a></li>
            <li><a href="{{route('designation.view')}}"><i class="ti-more"></i>Designation Manage</a></li>
          </ul>
        </li>
        <li class="treeview {{($prefix == '/students')?'active':''}}">
          <a href="#">
            <i data-feather="users"></i> <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('student.registration.view')}}"><i class="ti-more"></i>Student Registration</a></li>
            <li><a href="{{route('registration.fee.view')}}"><i class="ti-more"></i>Registration Fee</a></li>
            <li><a href="{{route('monthly.fee.view')}}"><i class="ti-more"></i>Monthly Fee</a></li>
            <li><a href="{{route('exam.fee.view')}}"><i class="ti-more"></i>Exam Fee</a></li>
          </ul>
        </li>
        <li class="treeview {{($prefix == '/marks')?'active':''}}">
          <a href="#">
            <i data-feather="check-square"></i></i> <span>Marks Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('mark.entry.add')}}"><i class="ti-more"></i>Mark Entry</a></li>
            <li><a href="{{route('mark.entry.edit')}}"><i class="ti-more"></i>Mark Edit</a></li>
          </ul>
        </li>
        <li class="treeview {{($prefix == '/attendance')?'active':''}}">
          <a href="#">
            <i data-feather="calendar"></i> <span>Attendance Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('attendance.view')}}"><i class="ti-more"></i>View Attendance</a></li>
            <li><a href="{{route('student.attendance.add')}}"><i class="ti-more"></i>Make Attendance</a></li>
            {{-- <li><a href="{{route('attendance.edit')}}"><i class="ti-more"></i>Attendance Edit</a></li> --}}
          </ul>
        </li>
        <li class="header nav-small-cap">Academy Profit</li>
		  
        <li class="treeview {{($prefix == '/reports'||$prefix == '/accounts')?'active':''}}">
          <a href="#">
            <i data-feather="dollar-sign"></i>
            <span>Profit Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('amount.paid.view')}}"><i class="ti-more"></i>Student Paid Amount</a></li>
            <li><a href="{{route('academy.profit.view')}}"><i class="ti-more"></i>Academy Profit Report</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
  </aside>
