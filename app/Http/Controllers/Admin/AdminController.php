<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Validate;
use App\Models\Admin;
use Image;

class AdminController extends Controller
{
    public function dashboard(){
    	return view('admin.dashboard');
    }

    public function login(Request $request){
    	//$password =Hash::make('123456');die;
    	if($request->isMethod('post')){
    		$data = $request->all();
            $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
            ],
            [
            	'email.required' =>	'Please Input a Email ID',
            	'email.email' =>	'Please Input a valid Email ID',
            ]

        );

    		if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
    			return redirect('admin/dashboard')->with('message','Login Successfully');
    		}else{ 
    			return redirect()->back()->with('error','Invalid Email or Password !');
    		}
    	}
    	return view('admin.login');
    }
    public function logout(Request $request){
    	Auth::guard('admin')->logout();
    	return redirect('admin/login')->with('message','logout Successfully');
    }

    public function updateAdminPassword(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>";print_r($data);die;

    		 if(Hash::check($data['cpassword'],Auth::guard('admin')->user()->password)){
    		 	 if($data['password']==$data['repassword']){
                        Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['password'])]);
                        return redirect()->back()->with('message','Password has been update successfully!');
                    }else{
                        return redirect()->back()->with('error','Your  New Password and Confirm Password does not match!');
                    }
    		 }else{
    		 	return redirect()->back()->with('error','Your Current password is incorrect!');
    		 }
    	}

    	$adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
    	return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request){
        $data = $request->all();
        // echo "<pre>";
        // print_r($data);die;
        if(Hash::check($data['cpassword'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

     public function updateAdminDetails(Request $request){
       
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;

            $rules=[
                 'admin_name'     => 'required|regex:/^[\pL\s\-]+$/u',
                 'admin_mobile'    => 'required|numeric',
            ];
            $customMessage = [
            'admin_name.required' =>'Name is Required',
            'admin_name.regex'=> 'Valid Name is Required',
            'admin_mobile.required' =>'Mobile is Required',
            'admin_mobile.numeric' => 'Valid Mobile is Required'
            ];
             $this->validate($request,$rules,$customMessage);
             //upload admin photo
             $large_image_path = 'admin/images/photos/';
             $small_image_path = 'admin/images/photos/small/';

    	// delete product small image if exist in small folder
             if(file_exists($large_image_path.Auth::guard('admin')->user()->image)){
	    		unlink($large_image_path.Auth::guard('admin')->user()->image);
	    	}
	    	if(file_exists($small_image_path.Auth::guard('admin')->user()->image)){
	    		unlink($small_image_path.Auth::guard('admin')->user()->image);
	    	}


             if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    // get Image Extension 
                   $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $largeImagePath = 'admin/images/photos/'.$imageName;
                    $smallImagePath = 'admin/images/photos/small/'.$imageName;
                    //$imagePath = 'admin/images/photos/'.$imageName;
                    Image::make($image_tmp)->resize(500,500)->save($largeImagePath);
                    Image::make($image_tmp)->resize(50, 50)->save($smallImagePath);
                    //Upload the Image
                    Image::make($image_tmp)->save($smallImagePath);
                }
             }else if(!empty($data['current_admin_image'])){
                $imageName=$data['current_admin_image'];
             }else{
                $imageName="";
             }
           

            //update admin details
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=> $imageName ]);
            return redirect()->back()->with('message','Admin Details Update successfully!');
        }
        return view('admin.settings.update_admin_details');
    }
}
