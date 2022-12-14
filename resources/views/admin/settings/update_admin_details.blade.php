@extends('admin.layout.layout')
@section('content')

<div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Update Password</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="{{url('admin/update-admin-details')}}" name="updateadminPasswordForm" id="updateadminPasswordForm" method="post" role="form"  enctype="multipart/form-data">@csrf 

                                	 
                                	<div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Admin type</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->type}}" name="admin_type" id="Admin_type" placeholder="Admin Type" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                          <input type="email" class="form-control" value="{{Auth::guard('admin')->user()->email}}" name="email" id="email" placeholder="Email" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_name" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                          <input type="admin_name" class="form-control" value="{{Auth::guard('admin')->user()->name}}" name="admin_name" id="admin_name" placeholder=" Name">
                                         
                                           <span class="error">
					                            @error('admin_name') {{$message}} @enderror
					                       </span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile" class="col-sm-3 control-label">Mobile</label>
                                        <div class="col-sm-9">
                                          <input type="admin_mobile" class="form-control" value="{{Auth::guard('admin')->user()->mobile}}" maxlength="10" minlength="10" name="admin_mobile" id="admin_mobile" placeholder="Please enter 10 digit Mobile number">
                                          <span class="error">
                                                @error('admin_mobile') {{$message}} @enderror
                                           </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label for="admin_image" class="col-sm-3 control-label">Admin Photo </label>
                                       <div class="col-sm-9">
                                          <input type="file" class="form-control" id="admin_image" name="admin_image"  >
                                          @if(!empty(Auth::guard('admin')->user()->image))
                                          <a href="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}" target="_blank">View Image</a>
                                          <input type="hidden" name="current_admin_image" value="{{Auth::guard('admin')->user()->image}}">
                                          @endif
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