<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

use App\Mail\ContactMail;

class ContactController extends Controller
{
    //
    public function index() {
        return view('contact.index');
    }

    public function mailSend(ContactRequest $request) {
        $name = $request->get('user_name');
        $email = $request->get('email');
        $content = $request->get('content');
        $to = 'ksandevelop@gmail.com';

        Mail::to($to)->send(new ContactMail($name, $email, $content));
        // Mail::to('ksandevelop@gmail.com')->send(new ContactMail('kamei', 'kk@gmail.com', '問い合わせ'));

        redirect('/home');
    }

}
