<?php

namespace App\Jobs;

use App\Mail\OrderShipped;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ConfirmOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $email;
    private $data;
    private $customer_name;
    public function __construct($email,$data, $customer_name)
    {
        $this->email=$email;
        $this->data=$data;
        $this->customer_name=$customer_name;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to($this->email)->send(new OrderShipped($this->data,$this->customer_name));

    }
}
