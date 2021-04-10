<?php

namespace MaksimPukh\MailMsgProcess;

abstract class MailMsgProcess
{
    protected $form_data;
    protected $named_form_attributes = [];

    abstract public function getHtmlMsg(): string;

    public function __construct(CActiveRecord $form_data) {
        $this->form_data = $form_data;
        foreach ($form_data->getParseAttributes() as $attribute) {
            $this->named_form_attributes[$form_data->attributeLabels()[$attribute]] = $form_data->$attribute;
        }
    }

    public function send(MailSender $mailer): bool {
        $mailer->text = $this->getHtmlMsg();
        $mailer->plain_text = $this->getPlainTextMsg();
        return $mailer->sendEmail();
    }

    public function getPlainTextMsg(): string {
        $html_msg = $this->getHtmlMsg();
        $plain_text_msg = strip_tags($html_msg, "<br>");
        $pattern = "/<br><br>/i";
        $plain_text_msg = preg_replace($pattern, "\n", $plain_text_msg);
        $plain_text_msg = preg_replace("/<br>/i", "", $plain_text_msg);
        return $plain_text_msg;
    }

//    хз, не безопасно
    public function setAttribute($name, $value): void {
        $this->named_form_attributes[$name] = $value;
    }
}