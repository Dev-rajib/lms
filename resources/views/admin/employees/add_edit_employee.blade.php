@extends('admin.layout.layout')
@section('content')
<div class="main-panel" >
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold" style="padding-left:10px;">Employee Management</h3>
                        
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                	@if(Session::has('error_message'))
	                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
	                        <strong>Error!</strong> {{Session::get('error_message')}}
	                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                            <span aria-hidden="true">&times;</span>
	                        </button>
	                    </div>
                    @endif

                    @if(Session::has('sucess_message'))
	                    <div class="alert alert-success alert-dismissible fade show" role="alert">
	                        <strong>Success!</strong> {{Session::get('sucess_message')}}
	                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                            <span aria-hidden="true">&times;</span>
	                        </button>
	                    </div>
                    @endif

                  

                    
                  <h4 class="card-title">{{$title}}</h4>
                 
                  <form class="forms-sample" @if(empty($employee['id'])) action="{{url('admin/add-edit-employee')}}" @else action="{{url('admin/add-edit-employee/'.$employee['id'])}}" @endif method="post" name="updateEmployeeDetailsForm" id="updateEmployeeDetailsForm" enctype="multipart/form-data">@csrf 

                    
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control"  @if(!empty($employee['name'])) value="{{$employee['name']}}" @else  value="{{ old('name') }}" @endif  id="name" name="name" placeholder="Enter Employee Name">
                      <span class="error">
                            @error('name') {{$message}} @enderror
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control"  @if(!empty($employee['email'])) value="{{$employee['email']}}" @else  value="{{ old('email') }}" @endif  id="email" name="email" placeholder="Enter Employee Email">
                      <span class="error">
                            @error('email') {{$message}} @enderror
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control"  @if(!empty($employee['phone'])) value="{{$employee['phone']}}" @else  value="{{ old('phone') }}" @endif  id="phone" name="phone" minlength="10" maxlength="10" placeholder="Enter Employee Phone Number">
                      <span class="error">
                            @error('phone') {{$message}} @enderror
                        </span>
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control"  @if(!empty($employee['address'])) value="{{$employee['address']}}" @else  value="{{ old('address') }}" @endif  id="address" name="address" placeholder="Enter Employee Address">
                      <span class="error">
                            @error('address') {{$message}} @enderror
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="experience">Experience</label>
                      <input type="text" class="form-control"  @if(!empty($employee['experience'])) value="{{$employee['experience']}}" @else  value="{{ old('experience') }}" @endif  id="experience" name=" experience" placeholder="Enter Employee Experience">
                        <span class="error">
                            @error('experience') {{$message}} @enderror
                        </span>
                    </div>

                    <div class="form-group">
                      <label for="photo">Employee Image (Recomended Size 1000X1000)</label>
                      <input target="_blank" type="file" class="form-control" id="photo" name="photo"  >
                      @if(!empty($employee['photo']))
                        <a href="{{ url('admin/images/photos/'.$employee['photo'])}}">View Image</a>&nbsp; | &nbsp; <a href="javascript:void(0);" module="employee-image" moduleid="{{$employee['id']}}" class="confirmDelete" >Delete Image</a>
                      @endif
                    </div>



                    <div class="form-group">
                      <label for="salary">Salary</label>
                      <input type="text" class="form-control"  @if(!empty($employee['salary'])) value="{{$employee['salary']}}" @else  value="{{ old('salary') }}" @endif  id="salary" name="salary" placeholder="Enter Employee Salary">
                        <span class="error">
                            @error('salary') {{$message}} @enderror
                        </span>
                    </div>



                    <div class="form-group">
                      <label for="vacation">Vacation</label>
                      <input type="text" class="form-control"  @if(!empty($employee['vacation'])) value="{{$employee['vacation']}}" @else  value="{{ old('vacation') }}" @endif  id="vacation" name="vacation" placeholder="Enter Employee Vacation">
                        <span class="error">
                            @error('vacation') {{$message}} @enderror
                        </span>
                    </div>

                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control"  @if(!empty($employee['city'])) value="{{$employee['city']}}" @else  value="{{ old('city') }}" @endif  id="city" name="city" placeholder="Enter Employee City Name">
                        <span class="error">
                            @error('city') {{$message}} @enderror
                        </span>
                    </div>
                    
                     
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          
          
            
          
           
           
            
            
          </div>
       
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection
