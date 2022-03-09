<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function send(Request $request){
        $message = $request->message;
        $name = $request->name;
        $email_contact = $request->email_contact;
        $subject = $request->subject;
        $err = [];
        if( $message == null){
            $err['message_null'] = 'Vui lòng nhập nội dung';
        }
        if( $name == null){
            $err['name_null'] = 'Vui lòng nhập tên của bạn';
        }
        if( $email_contact == null){
            $err['email_null'] = 'Vui lòng nhập email của bạn';
        }
        if( $subject == null){
            $err['subject_null'] = 'Vui lòng nhập tiêu đề';
        }
        if(count($err) > 0){
            return Redirect::back()->withInput()->with($err);
        } else {
            $mail_data = [
                'recipient' =>  'eprojecttestmail@gmail.com',
                'fromName'  =>  $request->name,
                'fromEmail' =>  $request->email_contact,
                'subject'   =>  $request->subject,
                'body'      =>  $request->message
            ];
            // dd($mail_data);
            Mail::to($mail_data['recipient'])->send(new ContactMail($mail_data));
            // Mail::send('livewire.email-template', $mail_data, function ($message) use ($mail_data) {
            //     $message->to($mail_data['recipient']);
            //     $message->from($mail_data['fromEmail'],$mail_data['fromName']);
            //     $message->subject($mail_data['subject']);
            // });
            return redirect()->back()->with('success', 'Cảm ơn vì đã tương tác. Chúng tôi sẽ phản hồi sớm nhất đến bạn');
        }
    }

}
