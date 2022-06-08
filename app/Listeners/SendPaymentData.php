<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Events\PaymentMade;
use App\Notifications\PaymentRequest;

class SendPaymentData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PaymentMade $event)
    {
        Notification::route('mail','mikevernieuwd@gmail.com')->notify(new PaymentRequest($event->payData));
    }
}
