<?php

namespace App\Http\Controllers\Admin\AreaAssign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Customer;
use DB;
use Hash;
use Auth;


class AreaAssignEmployeeController extends Controller
{
    

	public function index(Request $request)
    {
    	$customers = Customer::orderBy('id', 'desc')->get();

    	return view('admin.areaAssignEmployee.index', compact('customers'));
    } 

}
