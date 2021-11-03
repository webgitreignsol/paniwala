<?php

namespace App\Http\Controllers\Admin\StockInOut;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\StockInOut;
use App\Product;
use App\Employee;
use DB;
use Hash;
use Auth;


class StockInOutController extends Controller
{
    

    public function index(Request $request)
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	$employees = Employee::orderBy('id', 'desc')->get();
    	$stockInOuts = StockInOut::orderBy('id', 'desc')->get();

    	$fromDate = date('Y-m-d 00:00:00', strtotime($request->from_date));
    	$toDate = date('Y-m-d 23:59:59', strtotime($request->to_date));
    	$logs = StockInOut::whereBetween('date', array($fromDate, $toDate))->get();


    	return view('admin.stockInOut.index', compact('stockInOuts', 'products', 'employees', 'logs'));
    }




    public function search(Request $request)
    {
		$fromDate = date('Y-m-d 00:00:00', strtotime($request->from_date));
    	$toDate = date('Y-m-d 23:59:59', strtotime($request->to_date));
    	$stockInOuts = StockInOut::whereBetween('date', array($fromDate, $toDate))->get();


    	return view('admin.stockInOut.search', compact('stockInOuts'));
    }




    public function create()
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	$employees = Employee::orderBy('id', 'desc')->get();

    	return view('admin.stockInOut.create', compact('products', 'employees'));
    }



    public function store(Request $request)
    {
    	$rules = [
    		'date' => 'required',
    		'product_id' => 'required',
    		'employee_id' => 'required',
    		'qty' => 'required',
    		'stock_status' => 'required'
    	];    	

    	$this->validate($request, $rules);

    	$stockInOut = new StockInOut();
    	$stockInOut->date = $request->date;
    	$stockInOut->product_id = $request->product_id;
    	$stockInOut->employee_id = $request->employee_id;
    	$stockInOut->qty = $request->qty; 
    	$stockInOut->stock_status = $request->stock_status;
    	$stockInOut->remarks = $request->remarks;
    	$stockInOut->save();

    	Toastr::success('Stock Added successfully.', 'Success');
    	return redirect()->route('stockInOuts.index');
    }



    public function edit($id)
    {
    	$products = Product::get();
    	$employees = Employee::get();
    	$stockInOut = StockInOut::find($id);

    	return view('admin.stockInOut.edit', compact('stockInOut', 'employees', 'products'));
    }




    public function update(Request $request, $id)
    {
    	$stockInOut = StockInOut::find($id);

		$rules = [
    		'date' => 'required',
    		'product_id' => 'required',
    		'employee_id' => 'required',
    		'qty' => 'required',
    		'stock_status' => 'required'
    	];    	

    	$this->validate($request, $rules);

    	$input = $request->all();
    	$stockInOut->update($input);

		Toastr::success('Stock Updated successfully.', 'Success');
	    return redirect()->route('stockInOuts.index');    	

    }



    public function destroy($id)
    {
    	StockInOut::find($id)->delete();

    	Toastr::warning('Stock Deleted successfully.', 'Success');
    	return redirect()->route('stockInOuts.index');
    }



}
