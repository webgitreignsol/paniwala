<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Ride;
use Illuminate\Http\Request;
use App\User;
use App\Commission;
use App\Order;
use App\Pets;

class IndexController extends Controller
{
    public function index()
    {
    	$today_date = date('Y-m-d 00:00:00');
    	$tomorrow_date = date('Y-m-d 00:00:00', strtotime("+1 days"));

    	$data['today_orders'] = Ride::where('created_at', '>=', $today_date)->where('created_at', '<', $tomorrow_date)->count();
    	$data['today_sales'] = Ride::where('created_at', '>=', $today_date)->where('created_at', '<', $tomorrow_date)->sum('fare');
    	$data['today_rides'] = Ride::where('created_at', '>=', $today_date)->where('created_at', '<', $tomorrow_date)->count();
        $data['commission'] = Commission::pluck('value')->first();
        $data['revenue'] = $data['today_sales'] * $data['commission'] / 100;

    	return view('admin.dashboard.index', $data);
    }
}
