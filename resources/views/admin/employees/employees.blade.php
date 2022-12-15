@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Employee</h4>
                        <!-- <p class="card-description">Add class <code>.table-bordered</code></p> -->
                        <a class="addButton" href="{{ url('admin/add-edit-employee')}}"><i style="font-size: 25px;" class="fa fa-plus-square"></i></a><br/><br/>
                        @if(Session::has('sucess_message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Success!</strong> {{Session::get('sucess_message')}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                        @endif
                         <div class="table-responsive pt-3">
                            <table id="employees" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Experience</th>
                                        <th>photo</th>
                                        <th>Salary</th>
                                        <th>Vacation</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee['id']}}</td>
                                        <td>{{$employee['name']}}</td>
                                        <td>{{$employee['email']}}</td>
                                        <td>{{$employee['phone'] }}</td>
                                        <td>{{$employee['address']}}</td>
                                        <td>{{$employee['experience']}}</td>
                                        <td>{{$employee['photo']}}</td>
                                        <td>{{$employee['salary']}}</td>
                                        <td>{{$employee['vacation']}}</td>
                                        <td>{{$employee['city']}}</td>
                                        
                                       
                                        <td>
                                         @if($employee['status']==1)
                                         <a class="updateEmployeeStatus" id="employee-{{$employee['id']}}" employee_id="{{$employee['id']}}" href="javascript:void(0)"><i  style="font-size: 25px; color:green;" class="fa fa-toggle-on" status="Active"></i></a>
                                          @else 
                                          <a class="updateEmployeeStatus" id="employee-{{$employee['id']}}" employee_id="{{$employee['id']}}" href="javascript:void(0)"><i style="font-size: 25px;color:red;" class="fa fa-toggle-off" status="Inactive"></i></a>
                                          @endif 
                                        </td>
                                        <td title="action">
                                          
                                          <a href="{{url('admin/add-edit-employee/'.$employee['id'])}}"><i style="font-size: 25px; padding-right: 10px; padding-top:1px;"  class="fa fa-edit"></i></a>

                                          <a href="javascript:void(0);" module="employee" moduleid="{{$employee['id']}}" class="confirmDelete" ><i style="font-size: 25px;"  class="fa fa-trash-o"></i></a>
                                          
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
              <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Premium <a href="#" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                </div>
              </footer>
        </div>
    </div>
</div>

@endsection
