<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Image;

class EmployeeController extends Controller
{
    public function employees(Request $request){

    	$employees = Employee::get()->toArray();
    	//dd($employees);
    	return view('admin.employees.employees')->with(compact('employees'));
    }

    public function addEditEmployee(Request $request,$id=null){
        if($id==""){
            $title = "Add Employee";
            $employee = new Employee;
            $message = "Employee Added Successfully !";
        }else{
            $title = "Edit Employee";
            $employee = Employee::find($id);
            $message = "Employee updated Successfully !";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;

            $request->validate([
	            'name' =>'required',
	            'email'=>'required|email',
	            'phone'=> 'required|numeric',
	            'address'=> 'required',
	            'experience' => 'required',
	            'salary'=> 'required',
	            'vacation'=>'required',
	            'city'=> 'required', 
            ],
            [
            	'name.required'  =>	'Please Input Employee Name',
            	'email.required' =>	'Please Input a Email ID',
            	'email.email'    =>	'Please Input a valid Email ID',
            	'phone.required' => 'Mobile is Required',
                'phone.numeric'  => 'Valid Mobile is Required',
                'address.required'=>'Please Input Employee Address',
                'experience.required' =>'Please Enter Employee Experience',
                'salary.required' => 'Please Enter Employee Salary',
                'vacation.required' => 'Please Enter Employee Vacation',
                'city.required' => 'Please Enter Employee City',

            ]);

            if($request->hasFile('photo')){
                $image_tmp = $request->file('photo');
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
                    $employee->photo = $imageName;
	            }
	         }else if(!empty($data['current_admin_image'])){
	            $imageName=$data['current_admin_image'];
	         }else{
	            $imageName="";
	         } 

	         $employee->name = $data['name']; 
	         $employee->email = $data['email']; 
	         $employee->phone = $data['phone']; 
	         $employee->address = $data['address']; 
	         $employee->experience = $data['experience']; 
	         $employee->salary = $data['salary']; 
	         $employee->vacation = $data['vacation']; 
	         $employee->city = $data['city']; 
	         $employee->status = 1; 

	        // echo "<pre>"; print_r($employee);die;
	         $employee->save();

            return redirect('admin/employees')->with('message',$message);
        }

        return view('admin.employees.add_edit_employee')->with(compact('title','employee'));
    }

     // update Employee status
    public function updateemployeeStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            if($data['status']=="Active"){
                $status=0;
            }else{
                $status=1;
            }
            Employee::where('id',$data['employee_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'employee_id'=>$data['employee_id']]);
        }
    }

     public function deleteEmployee($id){
    	//delete brand
        Employee::where('id',$id)->delete();
        $message = "Employee has been deleted successfully !";
        return redirect()->back()->with('message',$message);
   
    }

    public function deleteEmployeeImage($id){
    	$employeeImage = Employee::select('photo')->where('id',$id)->first();

    	// Get Image product Path
    	$small_image_path = 'admin/images/photos/small/';
    	$large_image_path = 'admin/images/photos/';

    	// delete product small image if exist in small folder
    	if(file_exists($small_image_path.$employeeImage->photo)){
    		unlink($small_image_path.$employeeImage->photo);
    	}
    	
    	// delete product large image if exist in small folder
    	if(file_exists($large_image_path.$employeeImage->photo)){
    		unlink($large_image_path.$employeeImage->photo);
    	}

    	// delete product image from product table
    	Employee::where('id',$id)->update(['photo'=>'']);
    	$message = "Employee Image has been deleted Successfully";
        return redirect()->back()->with('message',$message);
    }

}
