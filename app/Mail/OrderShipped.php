<?php

namespace App\Mail;

use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $data;
    private $customer_name;
    public function __construct($data,$customer_name)
    {
        //
        $this->data= $data;
        $this->customer_name=$customer_name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.shipped',['data'=>$this->data,
        'name'=>$this->customer_name
        ]);
    }
}
