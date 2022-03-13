<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{

    public function index () {
        $items = Item::latest()->paginate(8);
        // return view('welcome',compact('items'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('welcome',compact('items'));
    }
}
