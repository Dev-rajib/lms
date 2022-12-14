@extends('admin.layout.layout')
@section('content')

<div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Update Password</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="{{url('admin/update-admin-password')}}" name="updateadminPasswordForm" id="updateadminPasswordForm" method="post" role="form" >@csrf 

                                	 @if(Session::has('error'))
					                    <div class="alert alert-danger" role="alert">
					                      <strong>Error: </strong> {{Session::get('error')}}
					                    </div>
					                    @endif
                                	<div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{$adminDetails['name']}}" name="name" id="name" placeholder="Name" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                          <input type="email" class="form-control" value="{{$adminDetails['email']}}" name="email" id="email" placeholder="Email" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">Current Password</label>
                                        <div class="col-sm-9">
                                          <input type="cpassword" class="form-control" name="cpassword" id="cpassword" placeholder=" Current Password">
                                          <span id="check_password"></span>
                                          <span class="error">
					                            @error('cpassword') {{$message}} @enderror
					                       </span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">New Password</label>
                                        <div class="col-sm-9">
                                          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="repassword" class="col-sm-3 control-label">Re Password</label>
                                        <div class="col-sm-9">
                                          <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Retype Password">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-3 col-sm-9">
                                          <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
@endsection