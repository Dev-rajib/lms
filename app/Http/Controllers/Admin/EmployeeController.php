<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

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
            /*echo "<pre>"; print_r($data);die;*/

            $rules=[
                'section_name'     => 'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessage = [
                'section_name.required' =>'Name is Required',
                'section_name.regex'=> 'Valid Section Name is Required',
           ];
             $this->validate($request,$rules,$customMessage);
             $section->name = $data['section_name'];
             $section->status = 1;
             $section->save();
             return redirect('admin/employees')->with('sucess_message',$message);
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

}
