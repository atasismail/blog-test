<?php

use App\Mail\BlogMail;
use Illuminate\Support\Facades\Mail;


function dosyayukle($dosya, $yol)
{
    $dosya_adi = uniqid() . '.' . $dosya->getClientOriginalExtension();
    $dosya->move(public_path($yol), $dosya_adi);
    return $dosya_adi;
}
function sendEmail($email, $data)
{
    Mail::send('admin.components.mail.test-mail', $data, function ($message) use ($email) {
        $message->to($email);
        $message->subject('Yeni Blog Eklendi');
    });
}
