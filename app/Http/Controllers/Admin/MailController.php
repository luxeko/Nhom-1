<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
                'subject' => 'abcd',
        ];
        Mail::to('eprojecttestmail@gmail.com')->send(new TestMail($details));
    }
}
