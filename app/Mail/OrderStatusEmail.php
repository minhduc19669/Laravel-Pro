<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $ship;
    private $total;
    private $code;
    public function __construct($ship,$total,$code)
    {
        //
        $this->code = $code;
        $this->total=$total;
        $this->ship= $ship;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order',['order'=>$this->ship,
        'total'=>$this->total,'code'=>$this->code]);
    }
}
