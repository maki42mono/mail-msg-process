<?php


namespace Examples;


use MaksimPukh\MailMsgProcess\MailAdminHtmlMsg;
use MaksimPukh\MailMsgProcess\MailMsgConfig;
use Tests\TestModel;

class Examples
{
    public function getSimpleExample()
    {
        $mail_msg_config = MailMsgConfig::getInstance();
        $mail_msg_config->setProperty("admin_footer_attributes", ["timestamp"]);


        $test = new TestModel();
        $test->email = "test@makimono.ru";
        $test->name = "Константин";
        $test->surname = "КОНСТАНТИНОПОЛЬСКИЙ";
        $test->timestamp = date('Y-m-d');

        $html_admin_msg = new MailAdminHtmlMsg($test);
        $html_admin_msg->setAttribute($test->attributeLabels()["surname"], mb_convert_case($test->surname, MB_CASE_TITLE, "UTF-8"));
        print_r($html_admin_msg->getHtmlMsg());
        print_r ("<br>");
        print_r($html_admin_msg->getPlainTextMsg());
    }
}