<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Customer;
use App\Employee;
use DB;
use Hash;
use Auth;


class CustomerController extends Controller
{
    public function index(Request $request)
    {
    	$customers = Customer::where('vendor_id',Auth::user()->id)->orderBy('id', 'desc')->get();
    	return view('admin.customer.index', compact('customers'));
    }


    public function create()
    {
        $employees = Employee::get();
        return view('admin.customer.create', compact('employees'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
    
        // $input = $request->all();

        $record = new Customer();
        $record->date = $request->date;
        $record->name = $request->name;
        $record->email = $request->email;
        $record->password = Hash::make($request->password);
        $record->address = $request->address;
        $record->phone = $request->phone;
        $record->vendor_id = Auth::user()->id;
        $record->status = $request->status;
    	$record->save();

        Toastr::success('Customer created successfully.', 'Success');
       	return redirect()->route('customers.index');
    }

    public function edit($id)
    {
    	$employees = Employee::get();
    	$customer = Customer::find($id);
    	return view('admin.customer.edit', compact('customer', 'employees'));
    }

    public function update(Request $request, $id)
    {
    	$customer = Customer::find($id);

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
    
         $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input['password'] = $customer->password;
        }

		$customer->update($input);

        Toastr::success('Customer Updated successfully.', 'Success');
       	return redirect()->route('customers.index');
    }


    public function destroy($id)
    {
    	Customer::find($id)->delete();
    	Toastr::warning('Customer deleted successfully.', 'Success');
    	return redirect()->route('customers.index');
    }



}

