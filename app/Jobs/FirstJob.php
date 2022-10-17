<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FirstJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    // public function setQueue(){
    //     $this->queue = $queue
    // }
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $emailMessage;

    public $tries = 5;

    
    public function __construct($emailMessage)
    {
        $this->emailMessage = $emailMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new \App\Mail\FirstMail($this->emailMessage);
        Mail::send($mail);
    }
}
