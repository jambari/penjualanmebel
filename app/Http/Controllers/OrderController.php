<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Custom;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Redirect;
Use App\Http\Requests\OrderStoreRequest;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        
        $requestData = $request->all();

        $keyword = $request->input('type'); //cari jenis mebel yang ingin dikustom
        $prices = Custom::where('name', 'like', '%'.$keyword.'%')->firstOrFail(); //get the type object
        $price = $prices->harga; //convert the price to int
        $length = (int)$request->input('length'); //get length
        $width = (int)$request->input('width'); //get width
        $height = (int)$request->input('height'); //get width
        $quantity = (int)$request->input('quantity');
        $total_price = $length * $width * $price * $quantity;
        $query=$request->input('email');
        $item_price = $length * $width * $price;
        
        $order = new Order;
        $order->number = random_int(10000000,99999999);
        $order->total_price = $total_price;
        $order->payment_status = 1;
        $order->item_name = $keyword;
        $order->item_price = $item_price;
        $order->customer_name = $request->input('name');
        $order->quantity = $request->input('quantity');
        $order->customer_email = $request->input('email');
        $order->customer_phone = $request->input('phone');
        $order->save();
        $id= Order::select('id')->where('customer_email','=',$query)->firstOrFail();
        Session::flash('success', 'Detail pesanan anda'); 
        return redirect()->action('App\Http\Controllers\OrderController@show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
 
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();
 
            $order->snap_token = $snapToken;
            $order->save();
        }
 
        return view('orders.show', compact('order', 'snapToken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $file = $request->file('receipt');
   
      // Mendapatkan Nama File
      	$nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      	$extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      	$ukuran_file = $file->getSize();
   
      // Proses Upload File
     	$destinationPath = 'uploads';
      	$file->move($destinationPath,$file->getClientOriginalName());
        $order->receipt = $file->getClientOriginalName();
        $order->payment_status = 2;
        $order->update();
        Session::flash('success', 'Data berhasil update, silahkan kontak pemilik toko untuk validasi'); 
        return redirect()->action('App\Http\Controllers\OrderController@show', $order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function confirmation ($id)
    {
        $order = Order::find($id);
        return view('orders.confirmation', compact('order'));
    }
}
