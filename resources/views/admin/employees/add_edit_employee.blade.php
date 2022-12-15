@extends('admin.layout.layout')
@section('content')
<div class="main-panel" >
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Catalogue Management</h3>
                        
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
                      <input type="text" class="form-control"  @if(!empty($product['name'])) value="{{$product['name']}}" @else  value="{{ old('name') }}" @endif  id="name" name="name" placeholder="Enter Employee Name">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control"  @if(!empty($product['email'])) value="{{$product['email']}}" @else  value="{{ old('email') }}" @endif  id="email" name="email" placeholder="Enter Employee Email">
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control"  @if(!empty($product['phone'])) value="{{$product['phone']}}" @else  value="{{ old('phone') }}" @endif  id="phone" name="phone" placeholder="Enter Employee Phone Number">
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control"  @if(!empty($product['address'])) value="{{$product['address']}}" @else  value="{{ old('address') }}" @endif  id="address" name="address" placeholder="Enter Employee Address">
                    </div>

                    <div class="form-group">
                      <label for="experience">Experience</label>
                      <input type="text" class="form-control"  @if(!empty($product['experience'])) value="{{$product['experience']}}" @else  value="{{ old('experience') }}" @endif  id="experience" name=" experience" placeholder="Enter Employee Experience">
                    </div>

                    <div class="form-group">
                      <label for="photo">Employee Image (Recomended Size 1000X1000)</label>
                      <input target="_blank" type="file" class="form-control" id="image" name="photo"  >
                      @if(!empty($product['product_image']))
                        <a href="{{ url('front/images/product_images/large/'.$product['photo'])}}">View Image</a>&nbsp; | &nbsp; <a href="javascript:void(0);" module="photo" moduleid="{{$product['id']}}" class="confirmDelete" >Delete Image</a>
                      @endif
                    </div>



                    <div class="form-group">
                      <label for="salary">Salary</label>
                      <input type="text" class="form-control"  @if(!empty($product['salary'])) value="{{$product['salary']}}" @else  value="{{ old('salary') }}" @endif  id="salary" name="salary" placeholder="Enter Employee Salary">
                    </div>



                    <div class="form-group">
                      <label for="vacation">Vacation</label>
                      <input type="text" class="form-control"  @if(!empty($product['vacation'])) value="{{$product['vacation']}}" @else  value="{{ old('vacation') }}" @endif  id="vacation" name="vacation" placeholder="Enter Employee Vacation">
                    </div>

                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control"  @if(!empty($product['city'])) value="{{$product['city']}}" @else  value="{{ old('city') }}" @endif  id="city" name="name" placeholder="Enter Employee City Name">
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
