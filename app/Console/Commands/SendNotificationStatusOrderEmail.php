<?php

namespace App\Console\Commands;

use App\Mail\OrderStatusEmail;
use App\Order;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNotificationStatusOrderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to customer about order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get all order for today
        $orders=Order::where('order_status',1)->orderBy('shipping_id')->get();
            $data=[];
            foreach($orders as $order){
                $data[$order->shipping_id][]=$order->toArray();
            }
            foreach($data as $shipping_ID =>$order){
                $ship=Shipping::find($shipping_ID)->toArray();
                foreach($order as $value){
                    $this->sendEmailToCustomer($shipping_ID, $ship, $value['order_total'],$value['order_code']);
                }
            }
    }
    public function sendEmailToCustomer($shipping_ID,$ship,$total,$code){
        $customer=Shipping::find($shipping_ID);
        $customer_email=$customer->shipping_email;
        Mail::to($customer_email)->send(new OrderStatusEmail($ship,$total,$code));
    }
}
