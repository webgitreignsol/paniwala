<?php

namespace App\Http\Controllers\Admin\Investment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Investment;
use DB;
use Hash;
use Auth;


class InvestmentController extends Controller
{
    public function index(Request $request)
    {
    	$investments = Investment::orderBy('id', 'desc')->get();
    	$sum = Investment::sum('amount');

    	return view('admin.investment.index', compact('investments', 'sum'));
    }



    public function create()
    {
    	return view('admin.investment.create');
    }


	
	public function store(Request $request)
    {
    	$this->validate($request, [
    		'date' => 'required',
    		'name' => 'required',
    		'amount' => 'required'
    	]);

    	$input = $request->all();
    	$investment = Investment::create($input);

	    Toastr::success('Investment created successfully.', 'Success');
	    return redirect()->route('investments.index');

    }



    public function edit($id)
    {
    	$investment = Investment::find($id);
    	return view('admin.investment.edit', compact('investment'));
    }



    public function update(Request $request, $id)
    {
    	$rules = [
    		'date' => 'required',
    		'name' => 'required',
    		'amount' => 'required',
    	];

    	$this->validate($request, $rules);

    	$investment = Investment::find($id);
    	
    	$input = $request->all();
    	$investment->update($input);
    	
	    Toastr::success('Investment Updated successfully.', 'Success');
	    return redirect()->route('investments.index');
    }


    public function destroy($id)
    {
    	Investment::find($id)->delete();

    	Toastr::warning('Investment Delete successfully.', 'Success');
    	return redirect()->route('investments.index');
    }

}
