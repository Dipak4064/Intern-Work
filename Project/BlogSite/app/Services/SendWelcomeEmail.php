<?php

namespace App\Services;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Services\WelcomeEmailInterface;

class SendWelcomeEmail implements WelcomeEmailInterface
{
    public function sendWelcomeEmail($username, $email, $subject)
    {
        Mail::to($email)->send(new WelcomeEmail($username, $subject));
    }

}
