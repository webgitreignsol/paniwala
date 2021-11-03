<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Product;
use DB;
use Hash;
use Auth;


class ProductController extends Controller
{
    public function index(Request $request)
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	return view('admin.product.index', compact('products') );
    }


    public function create()
    {
    	return view('admin.product.create');
    }



    public function store(Request $request)
    {
    	$this->validate($request, [
    		'product_name' => 'required',
    		'price' => 'required',
    		'type' => 'required'
    	]);

    	$input = $request->all();
    	$product = Product::create($input);

	    Toastr::success('Product created successfully.', 'Success');
	    return redirect()->route('products.index');

    }


    public function edit($id)
    {
    	$product = Product::find($id);
    	return view('admin.product.edit', compact('product'));
    }



    public function update(Request $request, $id)
    {
    	$rules = [
    		'product_name' => 'required',
    		'price' => 'required',
    		'type' => 'required'
    	];

    	$this->validate($request, $rules);

    	$product = Product::find($id);
    	
    	$input = $request->all();
    	$product->update($input);
    	
	    Toastr::success('Product Updated successfully.', 'Success');
	    return redirect()->route('products.index');
    }


    public function destroy($id)
    {
    	Product::find($id)->delete();

    	Toastr::warning('Product Delete successfully.', 'Success');
    	return redirect()->route('products.index');
    }

}
