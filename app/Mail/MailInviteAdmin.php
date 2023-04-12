<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInviteAdmin extends Mailable
{
    use Queueable, SerializesModels;

    private string $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    public function build(): MailInviteAdmin
    {
        return $this
            ->from('napoleon_dai_de@tanthe.com', env('APP_NAME'))
            ->subject('You have been invited to be '.$this->role.' in '.env('APP_NAME').' company')
            ->view('mail.invite_admin', ['role' => $this->role]);
    }
}
