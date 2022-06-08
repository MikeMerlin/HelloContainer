<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentRequest extends Notification
{
    use Queueable;
    private $paymentData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($paymentData)
    {
        $this->paymentData = $paymentData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('ID: '.$this->paymentData['id'])
                    ->line('BL_Release_date: '.$this->paymentData['bl_release_date'])
                    ->line('BL_Release_User_ID: '.$this->paymentData['bl_release_user_id'])
                    ->line('Freight_Payer_Self: '.$this->paymentData['freight_payer_self'])
                    ->line('Contract_number: '.$this->paymentData['contract_number'])
                    ->line('Bl_Number: '.$this->paymentData['bl_number']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
