<?php

namespace MaksimPukh\MailMsgProcess;

abstract class MailSender
{
    public $text;
    public $plain_text;
    public $to_email;
    public $from_name;
    public $from_email;
    public $subject;

    abstract public function sendEmail(): bool;
}