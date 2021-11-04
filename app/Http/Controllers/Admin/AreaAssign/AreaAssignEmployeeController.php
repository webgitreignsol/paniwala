<?php

namespace App\Http\Controllers\Admin\AreaAssign;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\AreaAssign;
use DB;
use Hash;
use Auth;


class AreaAssignEmployeeController extends Controller
{
    

	public function index(Request $request)
    {
    	$areaAssignEmployees = AreaAssign::orderBy('id', 'desc')->get();
    	return view('admin.areaAssigns.index', compact('areaAssignEmployees'));
    }

    public function create()
    {
        $employees = Employee::get();
        return view('admin.areaAssigns.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'area' => 'required',
        ]);

         $input = $request->all();
         $record = AreaAssign::create($input);

        Toastr::success('AreaAssign created successfully.', 'Success');
        return redirect()->route('areaAssigns.index');
    }

    public function edit($id)
    {
        $employees = Employee::get();
        $areaAssignEmployee = AreaAssign::find($id);
        return view('admin.areaAssigns.edit', compact('areaAssignEmployee', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $areaAssignEmployee = AreaAssign::find($id);

        $this->validate($request, [
            'employee_id' => 'required',
            'area' => 'required',
        ]);

        $input = $request->all();
        $areaAssignEmployee->update($input);

        Toastr::success('AreaAssign Updated successfully.', 'Success');
        return redirect()->route('areaAssigns.index');
    }


    public function destroy($id)
    {
        AreaAssign::find($id)->delete();
        Toastr::warning('AreaAssign deleted successfully.', 'Success');
        return redirect()->route('areaAssigns.index');
    }

}
