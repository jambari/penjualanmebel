<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index () {

        $totalorder = Order::all()->count();
        $pending = Order::where('payment_status','=',1)->count();
        $paid = Order::where('payment_status','=',2)->count();
        $expired = Order::where('payment_status','=',3)->count();
        return view('vendor.backpack.base.dashboard', with (
            compact('totalorder', 'pending', 'paid', 'expired')
        )
    );
    }
}
