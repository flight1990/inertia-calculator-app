<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mails\MailErrorMessageRequest;
use App\Http\Requests\Mails\MailRequest;
use App\Mail\SendMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    public function sendMessage(MailErrorMessageRequest $request): RedirectResponse
    {
        $mailData = $request->except(['files']);

        if (!empty($request->get('files'))) {
            foreach ($request->file('files') as $file) {
                $mailData['files'][] = Storage::disk('public')->put('mail', $file);
            }
        }

        Mail::to(env('MAIL_USERNAME'))->send(new SendMessageMail($mailData));

        return back();
    }
}
