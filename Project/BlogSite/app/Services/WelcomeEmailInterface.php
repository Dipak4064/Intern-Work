<?php

namespace App\Services;

interface WelcomeEmailInterface
{
    public function sendWelcomeEmail($username, $email, $subject);
}
