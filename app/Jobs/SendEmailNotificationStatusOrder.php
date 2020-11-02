<?php

namespace App\Jobs;

use App\Mail\OrderStatusEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailNotificationStatusOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $ship;
    private $total;
    private $code;
    private $email;
    public function __construct($email,$ship,$total,$code)
    {
        $this->email=$email;
        $this->ship=$ship;
        $this->total=$total;
        $this->code=$code;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to($this->email)->send(new OrderStatusEmail($this->ship,$this->total,$this->code));
    }
}
