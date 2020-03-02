<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use App\Mail\BookSuccessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBookSuccessMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $book = $this->details;
        $email = new BookSuccessMail($book);
        Log::info('Mengirim tagihan ke ' . $book->email);
        Mail::to($book->email)->send($email);
        Log::info('Tagihan terkirim ke ' . $book->email);
    }
    public function failed($exception)
    {
        return Log::error($exception);
    }
}