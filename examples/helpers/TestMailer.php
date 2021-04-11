<?php


namespace Tests;


use MaksimPukh\MailMsgProcess\MailSender;

class TestMailer extends MailSender
{
    public $text;
    public $from_email;
    public $from_name;
    public $plain_text;
    public $subject;
    public $to_email;

    public function sendEmail(): bool
    {
        echo "Ок, письмо отправилось!";
        return true;
    }
}