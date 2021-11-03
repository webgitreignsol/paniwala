<?php

namespace App\Http\Controllers\Admin\StockBalance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\StockInOut;
use App\Product;
use App\FillingStock;
use App\Employee;
use DB;
use Hash;
use Auth;


class StockBalanceController extends Controller
{


    public function index(Request $request)
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	$fillingStocks = FillingStock::orderBy('id', 'desc')->get();

    	return view('admin.stockBalance.index', compact('products', 'fillingStocks'));
    }


}
