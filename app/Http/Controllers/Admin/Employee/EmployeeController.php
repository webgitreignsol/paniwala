<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Employee;
use DB;
use Hash;
use Auth;


class EmployeeController extends Controller
{
    

    public function index(Request $request)
    {
    	$employees = Employee::orderBy('id', 'desc')->get();
    	return view('admin.employee.index', compact('employees'));
    }


    public function create()
    {
        return view('admin.employee.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'join_date' => 'required',
            'designation' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['email_verified_at'] = date('Y-m-d H:i:s');
    
        $employee = Employee::create($input);

        Toastr::success('Employee created successfully.', 'Success');
       	return redirect()->route('employees.index');
    }


    public function edit($id)
    {
    	$employee = Employee::find($id);
    	return view('admin.employee.edit', compact('employee'));
    }


    public function update(Request $request, $id)
    {
    	$employee = Employee::find($id);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'join_date' => 'required',
            'designation' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);
    
        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $employee->password;   
        }

        $input['updated_by'] = Auth::user()->id;
    
        $employee->update($input);

        Toastr::success('Employee Updated successfully.', 'Success');
       	return redirect()->route('employees.index');
    }


    public function destroy($id)
    {
    	Employee::find($id)->delete();
    	Toastr::warning('Employee deleted successfully.', 'Success');
    	return redirect()->route('employees.index');
    }




}
