<?php

namespace App\Http\Controllers\Admin\Expenditure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Expenditure;
use DB;
use Hash;
use Auth;


class ExpenditureController extends Controller
{
    
    public function index(Request $request)
    {
    	$expenditures = Expenditure::orderBy('id', 'desc')->get();
    	$sum = Expenditure::sum('amount');

    	return view('admin.expenditure.index', compact('expenditures', 'sum'));
    }



    public function create()
    {
    	return view('admin.expenditure.create');
    }


	
	public function store(Request $request)
    {
    	$this->validate($request, [
    		'date' => 'required',
    		'head_name' => 'required',
    		'amount' => 'required'
    	]);

    	$input = $request->all();
    	$expenditure = Expenditure::create($input);

	    Toastr::success('Expenditure created successfully.', 'Success');
	    return redirect()->route('expenditures.index');

    }



    public function edit($id)
    {
    	$expenditure = Expenditure::find($id);
    	return view('admin.expenditure.edit', compact('expenditure'));
    }



    public function update(Request $request, $id)
    {
    	$rules = [
    		'date' => 'required',
    		'head_name' => 'required',
    		'amount' => 'required'
    	];

    	$this->validate($request, $rules);

    	$expenditure = Expenditure::find($id);
    	
    	$input = $request->all();
    	$expenditure->update($input);
    	
	    Toastr::success('Expenditure Updated successfully.', 'Success');
	    return redirect()->route('expenditures.index');
    }


    public function destroy($id)
    {
    	Expenditure::find($id)->delete();

    	Toastr::warning('Expenditure Delete successfully.', 'Success');
    	return redirect()->route('expenditures.index');
    }

}
