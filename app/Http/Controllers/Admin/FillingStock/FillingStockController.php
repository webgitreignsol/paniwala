<?php

namespace App\Http\Controllers\Admin\FillingStock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\FillingStock;
use App\Product;
use DB;
use Hash;
use Auth;

class FillingStockController extends Controller
{
    public function index(Request $request)
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	$fillingStocks = FillingStock::orderBy('id', 'desc')->get();

    	return view('admin.fillingStock.index', compact('fillingStocks', 'products'));
    }

    public function create()
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	return view('admin.fillingStock.create', compact('products'));
    }



    public function store(Request $request)
    {
    	$rules = [
    		'date' => 'required',
    		'product_id' => 'required',
    		'filling_stock' => 'required'
    	];    	

    	$this->validate($request, $rules);

    	$fillingStock = new FillingStock();
    	$fillingStock->date = $request->date;
    	$fillingStock->product_id = $request->product_id;
    	$fillingStock->filling_stock = $request->filling_stock; 
    	$fillingStock->empty_stock = ($request->empty_stock) ? $request->empty_stock : 0;
    	$fillingStock->save();

    	Toastr::success('Filling Stock Added successfully.', 'Success');
    	return redirect()->route('fillingStocks.index');
    }



    public function edit($id)
    {
    	$products = Product::get();
    	$fillingStock = FillingStock::find($id);
    	return view('admin.fillingStock.edit', compact('fillingStock', 'products'));
    }


    public function update(Request $request, $id)
    {
    	$fillingStock = FillingStock::find($id);

		$rules = [
    		'date' => 'required',
    		'product_id' => 'required',
    		'filling_stock' => 'required',
    		'empty_stock' => 'required'
    	];    	

    	$this->validate($request, $rules);

    	$input = $request->all();
    	$fillingStock->update($input);

		Toastr::success('Filling Stock Updated successfully.', 'Success');
	    return redirect()->route('fillingStocks.index');    	

    }



    public function destroy($id)
    {
    	FillingStock::find($id)->delete();

    	Toastr::warning('Filling Stock Deleted successfully.', 'Success');
    	return redirect()->route('fillingStocks.index');
    }


}
