<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\VerifyUserMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MailService
{
    public function verifyUser(
        User $user
    ): void {
        Log::info("Sending verification mail to $user->email");
        Mail::to($user->email)->send(new VerifyUserMail($user));
        Log::info("Verification mail sent to $user->email");
    }
}

