<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailCustomerCare extends Mailable
{
    use Queueable, SerializesModels;

    private string $title;
    private string $response;

    public function __construct($data)
    {
        $this->title = $data['title'];
        $this->response = $data['response'];
    }

    public function build(): MailCustomerCare
    {
        return $this
            ->from('napoleon_dai_de@tanthe.com', env('APP_NAME'))
            ->subject($this->title)
            ->view('mail.customer-care', ['response' => $this->response]);
    }
}
