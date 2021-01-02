<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $title;
    protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name = 'テスト',$email = 'test@gmail.com', $content = 'これはテストです。お問い合わせテスト内容')
    {
        //
        $this->name = $user_name;
        $this->email = $email;
        $this->title = sprintf('%sさんから問い合わせがありました', $user_name);

        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('ksandevelop@gmail.com')
        ->text('emails.contact_mail')
        ->subject($this->title)
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'content' => $this->content,
        ]);

        // return $this->view('index');
    }
}
