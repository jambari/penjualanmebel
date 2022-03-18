<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }
 
    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->number,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->order->total_price,
                    'quantity' => $this->order->quantity,
                    'name' => $this->order->item_name,
                ],

            ],
            'customer_details' => [
                'first_name' => $this->order->customer_name,
                'email' => $this->order->customer_email,
                'phone' => $this->order->customer_phone,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}