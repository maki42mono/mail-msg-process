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

    public function validate()
    {
        if (!isset($this->text)) {
            throw new MailHtmlTextException("Добавьте html-текст письма");
        }
        if (!isset($this->to_email)) {
            throw new MailToEmailException("Добавьте email получателя");
        }
        if (!isset($this->from_name)) {
            throw new MailFromNameException("Добавьте имя отправителя");
        }
        if (!isset($this->from_email)) {
            throw new MailFromEmailException("Добавьте email отправителя");
        }
        if (!isset($this->subject)) {
            throw new MailSubjectException("Добавьте тему письма");
        }

        return true;
    }
}